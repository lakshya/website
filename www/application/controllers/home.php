<?php defined('SYSPATH') OR die('No direct access allowed.');

class Home_Controller extends Template_Controller {

	function __construct()
	{
		parent::__construct();
		$this->model = new Home_Model;
	}
	
	function index()
	{	
		$this->template->title = 'Welcome';
		$this->template->scripts = array("jquery", "jquery.innerfade");
		$this->template->content = new View('home/index');
	}
	
	function donate()
	{
		$this->template->title = 'Donate Now';
	        $this->template->heading = 'Donate to Lakshya';
		$this->template->content = new View('home/donate');
		
		$post = new Validation($_POST);
		$post->add_rules('Amount','required','digit');
		
		if($post->validate())
		{
                   $id = $this->model->addAvenue($this->input->post());
                   $data = array('name' => '', 'addr' => '', 'email' => '', 'city' => '', 'province' => '', 'country' => '', 'zipcode' => '', 'mobile' => '');

                   $username = $this->session->get('username');
                   $type = $this->session->get('type');
                   if($username && ($type == 'CMP'))
                   {
                     $donor_model = new Donor_Model;
                     $data = $donor_model->getDonDetails($username);
                   }

                   $this->template->heading = "";
		   $this->template->content = new View('home/checkout', $data);
		   $this->template->content->id = $id;
                   $this->template->content->Amount = $this->input->post('Amount');     			

                   		}
		$this->template->content->errors = $post->errors('donate');
	}
	function history()
	{
		$this->template->title = 'History';
		$this->template->heading = 'History';
		$this->template->content = new View('home/history');
	}
	
	function aboutUs()
	{
		$this->template->title = 'About Lakshya';
		$this->template->heading = 'About Lakshya';
		$this->template->content = new View('home/aboutUs');
	}
	
	function team()
	{
		$this->template->title = 'Lakshya Team';
		$this->template->heading = 'Lakshya Team';
		$this->template->content = new View('home/team');
	}
	
	function contactUs()
	{
		$this->template->title = 'Contact Us';
		$this->template->heading = 'Contact Us';
		$this->template->content = new View('home/contactUs');
		
		$post = new Validation($_POST);
		$post->add_rules('name','required','length[3,55]');
		$post->add_rules('email','required','email','length[1,127]');
		$post->add_rules('sub','required','length[1,255]');
		$post->add_rules('message','required');
		$post->add_rules('captcha', 'required', 'Captcha::valid');
		
		if($post->validate())
		{
			$body = new View('mails/contact',$this->input->post());
			$this->_email('webteam@thelakshyafoundation.org','Guest Book',$body->render());
			$this->template->content = new View('home/mailSent');
			return;
		}
		
		$this->template->content->data = $this->input->post();
		$this->template->content->errors = $post->errors('contact');
	}
	
	function scholarships()
	{
		$this->template->title = 'Lakshya Scholarships';
		$this->template->heading = 'Lakshya Scholarships';
		$this->template->scripts = array('collapse');

		$this->template->content = new View('home/scholarships');
	}

        function asthra()
	{
		$this->template->title = 'Ashtra';
		$this->template->heading = 'Asthra';
		$this->template->content = new View('home/asthra');
	}

        function innovation()
	{
		$this->template->title = 'The Innovation Project';
		$this->template->heading = 'The Innovation Project';
		$this->template->content = new View('home/innovation');
	}

        function transparency()
	{
		$this->template->title = 'Transparency';
		$this->template->heading = 'Transparency';
		$this->template->content = new View('accounts/transparency');
	}
        function innpics()
	{
		$this->template->title = 'The Innovation Project';
		$this->template->heading = 'The Innovation Project';
		$this->template->content = new View('home/innpics');
	}
  
        function ekjodikapda()
	{
		$this->template->title = 'Ek Jodi Kapda';
		$this->template->heading = 'Ek Jodi Kapda';
		$this->template->content = new View('home/ekjodikapda');
	}
        function volunteers()
	{
		$this->template->title = 'Verification';
		$this->template->heading = 'Verification';
		$this->template->content = new View('home/volunteers');
	}
	
	function sitemap()
	{
		$this->template->title = 'Sitemap';
		$this->template->heading = 'Sitemap';
		$this->template->content = new View('home/sitemap');
	}
	
	function gallery()
	{
		$this->template->title = 'Gallery';
		$this->template->heading = 'Gallery';
		$this->template->content = new View('home/gallery');
	}

    function lakshyaLive()
	{
		$this->template->title = 'Lakshya LIVE';
		$this->template->heading = 'Lakshya LIVE!';
		$this->template->content = new View('home/lakshyaLive');
	}

	function fees()
	{
		$this->template->title = 'Fee Structure of NIT, Warangal';
		$this->template->heading = 'Fee Structure of NIT, Warangal';
		$this->template->content = new View('home/fee_structure');
	}

}
?>
