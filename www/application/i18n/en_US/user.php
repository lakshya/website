<?php
$lang = array(
	'username' => array(
		'required'	=> 'Username is required',
		'username_exists' => 'Username already taken. Choose other',
		'username' => 'Username contains invalid characters',
		'default'	=> 'Invalid username'
	),
	'passwd' => array(
		'required'	=> 'Password cannot be left blank',
		'length' => 'Password length must be 5-40 charcters',
		'default'	=> 'Invalid password'
	),
	'confpasswd' => array(
		'required' => 'Confirm Password cannot be left blank',
		'default'  => 'Invalid Confirm Password'
	),
	'name' => array(
		'required' => 'Name cannot be blank',
		'length' => 'Name length must be 1-48 charcters',
		'default'  => 'Invalid Name'
	),
	'email' => array(
		'required' => 'Email cannot be blank',
		'length' => 'Email length must be 5-100 charcters',
		'email' => 'Invalid Email Address',
		'email_exists' => 'Email address already registered.',
		'default'  => 'Invalid Email address'
	),
	'mobile' => array(
		'required' => 'Mobile cannot be blank',
		'default'  => 'Invalid Mobile Number'
	),
	'addr' => array(
		'required' => 'Address cannot be blank',
		'length' => 'Address must be 1-100 charcters',
		'default'  => 'Invalid Address'
	),
	'city' => array(
		'required' => 'City cannot be blank',
		'length' => 'City must be 2-56 charcters',
		'default'  => 'Invalid City'
	),
	'province' => array(
		'required' => 'State cannot be blank',
		'length' => 'Province must be 2-48 charcters',
		'default'  => 'Invalid State'
	),
	'country' => array(
		'required' => 'Country cannot be blank',
		'length' => 'Country must be 2-24 charcters',
		'default'  => 'Invalid Country'
	),
	'pincode' => array(
		'required' => 'Pincode cannot be blank',
		'digit' => 'Pincode should be a number',
		'default'  => 'Invalid Pincode'
	),
	'terms' => array(
		'default'  => 'You must agree to the Terms & Conditions to register'
	),
	'captcha' => array(
		'required' => 'Captcha verification is mandatory',
		'Captcha::valid' => 'Invalid image verification. Try again!',
		'default'  => 'Captcha verfication is required'
	),
);