<?php
class Forgot_Controller extends Template_Controller {

	function __construct()
	{
		parent::__construct();
		$this->model = new Forgot_Model;
	}

	function index()
	{
		$this->template->title = "Forgot Username/Password";
		$this->template->heading = "Forgot Username/Password";
		$this->template->content = new View('forgot/index');

                $post = new Validation($_POST);
		
		$post->add_rules('email','required','email');
		$post->add_rules('captcha', 'required', 'Captcha::valid');
		
		if($post->validate())
		{
                       $result = $this->model->getDetails($this->input->post('email'));

                       if(!$result) $post->add_error('email', 'notExists');
                       else{ 
			$body = new View('mails/forgot',$result);
			$this->_email($result['email'],'Login details',$body->render());
			$this->template->content = new View('forgot/mailSent');
                        return;
                           }
		}
		$this->template->content->errors = $post->errors('forgot');
	}
}
?>