<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Template_Controller extends Controller {

	public $template;
	public $type;
	public $session;
	public $model;

	// Default to do auto-rendering
	public $auto_render = TRUE;

	/**
	 * Template loading and setup routine.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->session = Session::instance();
		
		$this->type = $this->input->get('output');
		
		switch($this->type)
		{
			case 'print'	: $this->template = 'theme/print_template'; break;
			case 'pdf'		: $this->template = 'theme/pdf_template'; break;
			case 'ajax'		: $this->template = 'theme/ajax_template'; break;
			case 'web'		: $this->template = 'theme/web_template'; break;
			case 'iframe'	: $this->template = 'theme/iframe_template'; break;
			default			: $this->template = 'theme/web_template'; break;
		}
		// Load the template
		$this->template = new View($this->template);

		if ($this->auto_render == TRUE)
		{
			// Render the template immediately after the controller method
			Event::add('system.post_controller', array($this, '_render'));
		}
	}

	/**
	 * Render the loaded template.
	 */
	public function _render()
	{
		if ($this->auto_render == TRUE)
		{
			if($this->type == 'pdf')
				$this->_pdf();
			else
				$this->template->render(TRUE);
		}
	}
	
	public function _email($to, $subject, $message)
	{
		$from = array('info@thelakshyafoundation.org','The Lakshya Foundation');
		$replyto = 'Webteam<webteam@thelakshyafoundation.org>';
		return email::send($to, $from, $subject, $message, $replyto, TRUE);
	}
	
	public function _pdf()
	{
		require_once Kohana::find_file('vendor','dompdf/dompdf_config.inc');
		$dompdf = new DOMPDF();
		$dompdf->load_html($this->template);
		$dompdf->render();
		$dompdf->stream(url::current().".pdf",array('Attachment' => 0));
	}
	
	public function _permit($var = 'guest')
	{
		$acl = array(	'guest'		=> '@',
						'user'		=> '@STD @ADM @CMP',
						'student' 	=> '@STD',
						'recruiter' => '@CMP',
						'admin' 	=> '@ADM',
						'su' 		=> 'admin'
					);
		$usr = $this->session->get('username');
		$type = $this->session->get('type');
		if(!is_array($var)) $var = array($var);
		foreach($var as $a)
		{
			$b = explode(" ", $acl[$a]);
			if(in_array($usr, $b) || in_array('@'.$type, $b))
				return true;
		}
		return false;
	}
	
	public function _denied()
	{
		header('HTTP/1.1 401 Access Forbidden');
		$this->template->title = "Access Forbidden";
		$this->template->content = new View('includes/403');
	}
	
	public function _error404()
	{
		header('HTTP/1.1 404 File Not Found');
		$this->template->title = "Page Not Found";
		$this->template->content = new View('includes/404');
	}
	
	public function __call($method, $args)
	{
		$this->_error404();
	}

}