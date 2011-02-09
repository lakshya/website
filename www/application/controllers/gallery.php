<?php defined('SYSPATH') OR die('No direct access allowed.');

class Gallery_Controller extends Template_Controller {

	function index()
	{
		$this->template->title = "Gallery";
		$this->template->heading = "Gallery";
		$this->template->content = new View('gallery/index');
	}
	
	function gifts()
	{
		$this->template->title = "Gifts to Volunteers";
		$this->template->heading = "Gifts to Volunteers";
		$this->template->content = new View('gallery/gifts');
	}
}
?>