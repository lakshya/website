<?php
class Donor_Controller extends Template_Controller {

	function __construct()
	{
		parent::__construct();
		$this->model = new Donor_Model;
	}

	function index()
	{
                if(!($this->session->get('type') == 'CMP')) { $this->_denied(); return; }
		$this->template->title = "Welcome Donor";
		$this->template->heading = "Welcome Donor";
		$this->template->content = new View('donor/index');
		$this->template->content->data = $this->model->getDonations($this->session->get('username'));
	}
	
	function editProfile()
	{
                if(!($this->session->get('type') == 'CMP')) { $this->_denied(); return; }
                $this->template->title = "Edit Profile";
                $this->template->heading = "Edit Profile";

                $this->template->content = new View('donor/editProfile',$this->model->getDonDetails($this->session->get('username')));

                $post = new Validation($_POST);
		$post->add_rules('name','required','length[3,55]');
		$post->add_rules('email','required','email');
                //$post->add_callbacks('email',array($this, '_unique_email'));
			
		if($post->validate())
		{
			$this->model->editProfile($this->session->get('username'), $this->input->post());
			$this->template->content = new View('donor/profileEdited');
		}
		
		$this->template->content->data = $this->input->post();
		$this->template->content->errors = $post->errors('donor');
	}
	
	function viewProfile()
	{
                if(!($this->session->get('type') == 'CMP')) { $this->_denied(); return; }
                $this->template->title = "View Profile";
                $this->template->heading = "View Profile";

                $this->template->content = new View('donor/viewProfile',$this->model->getDonDetails($this->session->get('username')));
	}

        function editPassword()
        {
                if(!($this->session->get('type') == 'CMP')) { $this->_denied(); return; }
                $this->template->title = "Edit Password";
                $this->template->heading = "Edit Password";

                $this->template->content = new View('donor/changePasswd');

                $post = new Validation($_POST);
		$post->add_rules('oldPasswd','required','length[3,55]');
		$post->add_rules('newPasswd','required','length[3,55]');
                $post->add_rules('confirmPasswd','required');               
			
		if($post->validate())
		{
                        $res = $this->model->getPasswd($this->session->get('username'));

                        if($this->input->post('oldPasswd') != $res['password']) $post->add_error('oldPasswd', 'notCrct');
                        else if($this->input->post('newPasswd') != $this->input->post('confirmPasswd')) $post->add_error('newPasswd','matches');
                        else{
			$this->model->changePasswd($this->session->get('username'), $this->input->post());
			$this->template->content = new View('donor/passwdChanged');
                            }
		}
		
		$this->template->content->errors = $post->errors('donor');
        }
     
        function _unique_email(Validation $array, $field)
	{
		$result = $this->model->emailExists($array[$field]);
		if($result) $array->add_error($field, 'email_exists');
	}


  }
?>