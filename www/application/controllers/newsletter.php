<?php defined('SYSPATH') OR die('No direct access allowed.');

class Newsletter_Controller extends Template_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->model = new Newsletter_Model;
	}
	
	function index()
	{
		$post = new Validation($_POST);
		$post->add_rules('email','required','email');
		$post->add_callbacks('email',array($this, '_unique_email'));
		
		if($post->validate())
		{
			$key = sha1($this->input->post('email'));

			//add to db key, email
			$this->model->add($this->input->post('email'),$key);

			$link['email'] = $this->input->post('email');
			$link['key'] = $key;
			
			$body = new View('mails/newsletterConfirm',$link);
			$this->_email($this->input->post('email'),'Confirm your Email Subscription',$body->render());
			$this->template->content = new View('newsletter/mailSent');
			return;
		}
		
		$this->template->content = new View('newsletter/error');
	}
	
	function _unique_email(Validation $array, $field)
	{
		$result = $this->model->getEmail($array[$field]);
		if($result > 0) 
			$array->add_error($field, 'email_exists');
	}
	
	function confirm($email = '', $key = '')
	{
		if(!$this->model->confirm($email, $key))
		{
			$this->template->content = new View('newsletter/error');
			return;
		}
		
		$this->template->content = new View('newsletter/confirmed');
	}
}
?>