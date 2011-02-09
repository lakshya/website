<?php
class Admin_Controller extends Template_Controller {

	function __construct()
	{
		parent::__construct();
		$this->model = new Admin_Model;
	}

	function index()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = "Admin Control Center";
		$this->template->heading = "Admin Control Center";
		$this->template->content = new View('admin/index');
	}
	
	function donAdd()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = "Add a Donation";
		$this->template->heading = "Add a Donation";
				
		$this->template->content = new View('admin/donAdd');
		
		$post = new Validation($this->input->post());

                $post->add_rules('name', 'required');
		$post->add_rules('username','required');
		$post->add_rules('donAmount','required','digit');
		$post->add_rules('donDate', 'required');
                $post->add_rules('email', 'email');
                $post->add_rules('mobile','phone[10]');
                $post->add_callbacks('email',array($this, '_unique_email'));
                $post->add_rules('cat','required');
		
		if($post->validate())
		{
			$this->model->donAdd($this->input->post());
			
			$link['name'] = $this->input->post('name');
			$link['amount'] = $this->input->post('donAmount');
			$link['volunteer'] = $this->session->get('username');
			
			$body = new View('mails/newDonation',$link);
			$this->_email('anandr31@gmail.com','New Donation added to Database',$body->render());
			
			$this->template->content = new View('admin/added');
		}
			
		$this->template->content->errors = $post->errors('admin');
	}
	
	function already()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = "Select the donor";
		$this->template->heading = "Select the donor";
		
		$this->template->content = new View('admin/already');
		$this->template->content->data = $this->model->already();
	}
	
	function donAlready($userId = 0)
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		$this->template->title = "Add a donation";
		$this->template->heading = "Add a donation";
		
		$this->template->content = new View('admin/donAdd2');
		$res = $this->model->getDonor($userId);
		$this->template->content->data = $res;
		
		$post = new Validation($this->input->post());
		$post->add_rules('donAmount','required','digit');
		$post->add_rules('donDate', 'required');
		
		if($post->validate())
		{
			$this->model->donAdd2($this->input->post(), $userId);
			
			$link['name'] = $res['name'];
			$link['amount'] = $this->input->post('donAmount');
			$link['volunteer'] = $this->session->get('username');
			
			$body = new View('mails/newDonation',$link);
	                $this->_email('srihari.maneru@gmail.com','New Donation added to DB',$body->render());
			
			$this->template->content = new View('admin/added');
		}
			
		$this->template->content->errors = $post->errors('admin');
		
	}
		
	function editDonor($userId = 0)
	{
		$this->template->title = "Edit Donor";
		$this->template->heading = "Edit Donor";
		
		$this->template->content = new View('admin/editDonor');
		$res = $this->model->getDonDetails($userId);
		$this->template->content->data = $res[0];
		
		$post = new Validation($this->input->post());
		$post->add_rules('name', 'required');
		$post->add_rules('username','required');
		$post->add_rules('email', 'email');
                $post->add_rules('mobile','phone[10]');
                $post->add_rules('cat','required');

		if($post->validate())
		{
			$this->model->editDonor($userId, $this->input->post());
			$this->template->content = new View('admin/donEdited');
		}
		
		$this->template->content->errors = $post->errors('admin');
	}
	
	function delDonor($userId = 0)
	{
		$this->template->title = "Delete Donor";
		$this->template->heading = "Delete Donor";
		
		$this->template->content = new View('admin/delDonor');
		$res = $this->model->getDonDetails($userId);
		$this->template->content->data = $res[0];
		
		if($this->input->post('remove')) 
		{
			$this->model->delDonor($userId);
			$this->template->content = new View('admin/donDeleted');
		}
	}

        function _unique_email(Validation $array, $field)
	{
		$result = $this->model->emailExists($array[$field]);
		if($result) $array->add_error($field, 'email_exists');
	}
}
?>