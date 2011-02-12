<?php defined('SYSPATH') OR die('No direct access allowed.');

class Library_Controller extends Template_Controller {

	function __construct()
	{
		parent::__construct();
		$this->model = new Library_Model;
	}

	function index()
	{
		$this->template->title = 'The Library Project';
		$this->template->heading = 'The Library Project';

		$this->template->content = new View('library/index');
		$this->template->content->data = $this->model->recentDonations();
		$this->template->content->stats = $this->model->getStatistics();
	}
	
	/**
	 * 
	 * Lists all the library donations 
	 */
	function donations()
	{
		$this->template->title = 'Library Donations';
		$this->template->heading = 'All Library Donations';

		$this->template->content = new View('library/donations');
		$this->template->content->data = $this->model->donDetails();
	}
	
	/**
	 * 
	 * Lists all the books donated by the specified donor
	 * @param int $id
	 */
	function donor($id = 0)
	{
		$donor = $this->model->getDonorDetails($id);
		// Donor with the given id doesn't exist!
		if(!$donor)
		{
			$this->template->title = 'Invalid Donor';
			$this->template->heading = 'Invalid Donor';
			$this->template->content = "The specified donor doesn't exist in the database";
			return;
		}
		
		$this->template->title = 'Individual Book Donations';
		$this->template->heading = "Book Contributions by $donor->name";
		$this->template->content = new View('library/donor');
		$this->template->content->data = $this->model->getDonationsByDonor($id);
	}

	function donate()
	{
		$this->template->title = 'Donate a Book';
		$this->template->heading = 'Donate a Book';
		$this->template->content = new View('library/donateBook');
		
		$numBooks = 1; // Default number of book forms to show

		$post = new Validation($this->input->post());

		if($this->input->post())
		{
			// Need to manually validate, since Kohana doesn't support
			// arrays in POST validations.
			$numBooks = count($this->input->post('title'));
			if($numBooks == 0)
				$post->add_error('title', 'zero_books');
			for($i=0;$i < $numBooks; $i++)
			{
				if(empty($_POST['title'][$i]))
					$post->add_error('title', 'required');

				if(empty($_POST['typeOfBook'][$i]))
					$post->add_error('typeOfBook', 'required');
				else {
					$typeOfBook = $_POST['typeOfBook'][$i];
					if($typeOfBook == 'cur') {
						// Date is required for curriculum books
						if(empty($_POST['donDate'][$i]) || empty($_POST['donMonth'][$i]) || empty($_POST['donYear'][$i]))
							$post->add_error('donDate', 'required');
						else {
							// Date must not be in the past
							$dateStr = $_POST['donYear'][$i].'-'.$_POST['donMonth'][$i].'-'.$_POST['donDate'][$i];
							if($dateStr < date('Y-m-d'))
								$post->add_error('donDate', 'past_date');
						}
					}
				}
			}
		}
		$post->add_rules('name', 'required');
		$post->add_rules('mobile','required', 'phone[10]');
		$post->add_rules('email', 'email', 'required');

		if($post->validate())
		{
			$res = $this->model->donateBook($this->input->post());

			$body = new View('mails/newBookDonation',$this->input->post());
			$this->_email('harishsvs@gmail.com','Lakshya-Library-New Book Donated',$body->render());

			$this->template->heading = "";
			$this->template->content = new View('library/bookAdded');
			return;
		}
		$this->template->content->data = $this->input->post();
		$this->template->content->count = $numBooks;
		$this->template->content->errors = $post->errors('library');
		if($this->_permit('user'))
		{
			$details = ORM::factory('user')
				->where('username', $this->session->get('username'))
				->find();
			if($details->loaded)
				$this->template->content->details = $details;
			else
				Kohana::log('error', "Couldn't find the details in users table for a logged in user");
		}
	}
	
	function manage()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = 'Book Donors';
		$this->template->heading = 'Book Donors';

		$this->template->content = new View('library/manage');
		$this->template->content->data = $this->model->donDetails();
	}
	
	function edit($id = 0)
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		
		$details = $this->model->getBookDetails($id);
		if(!$details)
		{
			// No book is found with the given id
			$this->template->title = 'Book Not Found';
			$this->template->heading = 'Book Not Found';
			$this->template->content = "No book found with the given id.";
			return;
		}
		
		$post = new Validation($this->input->post());
		
		$post->add_rules('title', 'required');
		$post->add_rules('status','required');
		$post->add_rules('typeOfBook', 'required');
		
		if($post->validate())
		{
			// Change in db
			$this->model->update_book_details($id, $post);
			
			$this->template->title = 'Book Details Edited';
			$this->template->heading = 'Book Details Edited';
			$this->template->content = 'The book details have been successfully edited';
			return;
		}
		
		$this->template->title = 'Edit Book Details';
		$this->template->heading = 'Edit Book Details';

		$this->template->content = new View('library/edit');
		$this->template->content->details = $details;
		$this->template->content->data = $post;
		$this->template->content->errors = $post->errors('library');
	}
}
?>