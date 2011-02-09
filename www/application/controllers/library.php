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
			// Need to manually validate, since Kohana doesnt support
			// arrays in POST validations.
			$numBooks = count($this->input->post('title'));
			for($i=0;$i < $numBooks; $i++)
			{
				if(empty($_POST['title'][$i]))
					$post->add_error('title', 'required');

				if(empty($_POST['typeOfBook'][$i]))
					$post->add_error('typeOfBook', 'required');
			}
		}
		$post->add_rules('name', 'required');
		$post->add_rules('mobile','required', 'phone[10]');
		$post->add_rules('email', 'email', 'required');

		if($post->validate())
		{
			$res = $this->model->donateBook($this->input->post());

			$link['name'] = $this->input->post('name');
			$link['title'] = $this->input->post('title');
			$body = new View('mails/newBookDonation',$link);
			$this->_email('harishsvs@gmail.com','Lakshya-Library-New Book Donated',$body->render());

			$this->template->heading = "";
			$this->template->content = new View('library/bookAdded');
			return;
		}
		$this->template->content->data = $this->input->post();
		$this->template->content->count = $numBooks;
		$this->template->content->errors = $post->errors('library');
	}

	function bookDonors()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = 'Book Donors';
		$this->template->heading = 'Book Donors';

		$this->template->content = new View('library/bookDonors');
		$this->template->content->data = $this->model->donDetails();
	}
}
?>