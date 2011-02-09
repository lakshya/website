<?php defined('SYSPATH') OR die('No direct access allowed.');

class Quicklinks_Controller extends Template_Controller {

	function faqs()
	{
		$this->template->title = 'Frequently Asked Questions';
		$this->template->heading = 'Frequently Asked Questions';
		$this->template->content = new View('quicklinks/faqs');
	}
	
	function genMeet()
	{
		$this->template->title = 'First General Body Meeting';
		$this->template->heading = 'First General Body Meeting';
		$this->template->content = new View('quicklinks/genMeet');
	}
	
	function downloads()
	{
		$this->template->title = 'Downloads';
		$this->template->heading = 'Downloads';
		$this->template->content = new View('quicklinks/downloads');
	}
	
}
?>