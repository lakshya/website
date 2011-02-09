<?php
class News_Controller extends Template_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function scroller()
	{
		$this->template->content = new View('news/scroller');
	}
	
	function __call($method, $args)
	{
		$this->view($method);
	}
	
	function scholForm()
	{
		$this->template->title = 'Apply for Scholarship';
		$this->template->heading = 'Apply for Scholarship';
		$this->template->content = new View('news/scholForm');
	}
	
	function newsLetterII()
	{
		$this->template->title = 'News Letter Vol-II';
		$this->template->heading = 'Download News Letter Vol-II';
		$this->template->content = new View('news/newsLetterII');
	}
	
	function decl()
	{
		$this->template->title = 'Scholarships finalized';
		$this->template->heading = 'Announcement of Scholarships';
		$this->template->content = new View('news/decl');
	}
}
?>