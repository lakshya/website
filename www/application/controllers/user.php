<?php
class User_Controller extends Template_Controller {

	function index()
	{
		$this->template->title = "Invalid User";
		$this->template->content = new View('user/index');
		$this->template->heading = "Invalid User";
	}

	function login()
	{
		$post = new Validation($this->input->post());

		$post->add_rules('username','required','username');
		$post->add_rules('password', 'required', 'length[5,40]');

		$this->session->set_flash('url',$this->input->post('url'));
		if($post->validate())
		{
			// TODO: The password hashing should be from a wrapper helper function
			$result = ORM::factory('user')
			->where('username', $post['username'])
			->where('password', sha1($post['password']))
			->find();

			if($result->loaded)
			{
				$this->session->set(array('username' => $result->username, 'type' => $result->accType));
				$redirects = array('STD' => 'scholar', 'CMP' => 'donor', 'ADM' => 'admin');
				url::redirect($redirects[$this->session->get('type')]);
			}
			else
			{
				url::redirect('user');
			}
		}
		else
		{
			url::redirect('user');
		}
	}

	/**
	 *
	 * Public Interface for the 'New User'
	 */
	function register()
	{
		$post = new Validation($this->input->post());

		$post->add_rules('username','required','username');
		$post->add_rules('passwd', 'required', 'length[5,40]');
		$post->add_rules('confpasswd', 'required','matches[passwd]');

		$post->add_rules('name','required','length[1,48]','standard_text');
		$post->add_rules('mobile', 'length[5,18]');
		$post->add_rules('email','required','email', 'length[5,100]');
		$post->add_rules('city', 'length[2,56]');
		$post->add_rules('addr', 'length[1,100]');
		$post->add_rules('province', 'length[2,48]');
		$post->add_rules('country', 'length[2,24]');
		$post->add_rules('pincode', 'digit');
		$post->add_rules('captcha', 'required', 'Captcha::valid');
		$post->add_rules('terms', 'required');

		$post->add_callbacks('username',array($this, '_unique_username'));
		$post->add_callbacks('email',array($this, '_unique_email'));

		if($post->validate())
		{
			$user = ORM::factory('user');
			$user->username = $post['username'];
			$user->password = $post['passwd'];
			$user->email = $post['email'];
			$user->accType = 'CMP';
			$user->name = $post['name'];
			$user->addr = $post['addr'];
			$user->city = $post['city'];
			$user->province = $post['province'];
			$user->mobile = $post['mobile'];
			$user->zipcode = $post['pincode'];
			$user->country = $post['country'];
			$user->save();
			if($user->saved)
			{
				$this->template->title = "Registration Completed";
				$this->template->heading = "Registered successfully";
				$this->template->content = new View('user/registered');
			}
			else
			{
				Kohana::log('error', "User Registration: Save failed. username: {$post['username']}, email: {$post['email']} ");
				$this->template->title = 'Database Error';
				$this->template->heading = 'Database Error';
				$this->template->content = new View('includes/db-error');
			}
		}
		else
		{
			$this->template->title = 'Register';
			$this->template->heading = 'Register';
			$this->template->content = new View('user/register');
			$this->template->content->data = $post;
			$this->template->content->errors = $post->errors('user');
		}
	}

	function logout()
	{
		$this->session->destroy();
		url::redirect('');
	}
}
?>