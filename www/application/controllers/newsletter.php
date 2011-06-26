<?php defined('SYSPATH') OR die('No direct access allowed.');

class Newsletter_Controller extends Template_Controller
{
	public function subscribe() 
	{
		$this->template->title = "Subscribe to Newsletter";
		$this->template->heading = $this->template->title;
		$this->template->content = new View('newsletter/subscribe');

		if($this->input->post())
		{
			$raw_data = array(
				'email' => $this->input->post('email'),
				'status' => 1
			);
			$data = new Newsletter_Model();
			if($data->validate($raw_data, TRUE) === TRUE)
			{
				if($data->saved === TRUE)
				{
					// send a confirmation mail
					$mail_content = new View('mails/newsletterConfirm', array('key' => $data->subscribe_key));
					$this->_email($data->email, "Lakshya Foundation: Confirm your subscription",$mail_content);
					$this->template->content->message = 'A confirmation mail has ben sent to your email address.';
				}
				else 
				{
					$this->template->content->errors = array('database' => 'Error in database. Please try again later');
				}
			}
			else 
			{
				// Invalid data
				$this->template->content->errors = $raw_data->errors('newsletter');
			}
		}
	}
	
	public function unsubscribe()
	{
		$this->template->title = 'Lakshya Newsletter';
		$this->template->heading = 'Unsubscribe from Newsletter';
		$this->template->content = new View('newsletter/unsubscribe');
		if($this->input->post())
		{
			$data = new Newsletter_Model();
			
			$data = $data->where('email', $this->input->post('email'))->find();
			if($data->loaded)
			{
				// send a confirmation mail
				$mail_content = new View('mails/newsletter_unsubscribe', array('key' => $data->unsubscribe_key));
				$this->_email($data->email, "Lakshya Foundation: Confirm your unsubscription",$mail_content);
				$this->template->content->message = 'A confirmation mail has ben sent to your email address.';
			}
			else {
				$this->template->content->message = 'You are not subscribed to our Newsletter. You might have recently unsubscribed!';
			}
		}
	}
	
	function confirm($type = '', $key = '')
	{
		$this->template->title = 'Lakshya Newsletter';
		if($type == 'subscription')
		{
			$this->template->heading = 'Confirm Newsletter subscription';
			$this->template->content = new View('newsletter/confirmed');
			$data = ORM::factory('newsletter')->where('subscribe_key', $key)->find();
			if($data->loaded)
			{
				if($data->status == 2)
				{
					$this->template->content->message = 'You are already subscribed to the Newsletter';
				}
				else 
				{
					$data->confirm();
					if($data->saved)
					{
						$this->template->content->message = 'Email confirmed.You are successfully subscribed to Lakshya Newsletter';
					}
					else {
						$this->template->content->message = 'Database Error: Unable to complete the request. Please try again later';
					}
				}
			}
			else 
			{
				// Error - Invalid link
				$this->template->content->message = 'Invalid or expired link';
			}
		}
		elseif($type == 'unsubscription')
		{
			$this->template->heading = 'Confirm Newsletter unsubscription';
			$this->template->content = new View('newsletter/confirmed');
			$data = ORM::factory('newsletter')->where('unsubscribe_key', $key)->find();
			if($data->loaded)
			{
				$data->delete();
				if($data->loaded === FALSE)
				{
					$this->template->content->message = 'Email confirmed.You are successfully unsubscribed from Lakshya Newsletter';
				}
				else {
					$this->template->content->message = 'Database Error: Unable to complete the request. Please try again later';
				}
			}
			else 
			{
				// Error - Invalid link
				$this->template->content->message = 'You are not subscribed to Lakshya Foundation';
			}
		}
		else
		{
			$this->template->heading = 'Lakshya Newsletter';
			$this->template->content = new View('newsletter/confirmed');
			$this->template->content->message = 'Invalid Link';
		}
	}
	
	public function send()
	{
		// TODO: 'Send Newsletter' feature
	}
}
?>