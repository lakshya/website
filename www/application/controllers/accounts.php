<?php defined('SYSPATH') OR die('No direct access allowed.');

class Accounts_Controller extends Template_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Accounts_Model;
	}
	
	function allExpenses()
	{
		$this->template->title = 'All Expenses';
		$this->template->heading = 'All Expenses';
		$this->template->content = new View('accounts/allExpenses');
	}
	
	function allDonations()
	{
		$this->template->title = 'All Donations';
		$this->template->heading = 'All Donations';
		$this->template->content = new View('accounts/allDonations');
		$this->template->content->data = $this->model->allDonations();
	}
	
	function curMonth()
	{
		$this->template->title = 'Recent Donations';
		$this->template->heading = 'Recent Donations';
		$this->template->content = new View('accounts/curDonations');
	}
        function transparency()
	{
		$this->template->title = 'Transparency';
		$this->template->heading = 'Transparency';
		$this->template->content = new View('accounts/transparency');
	}	
}
?>