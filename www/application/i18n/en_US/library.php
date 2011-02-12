<?
$lang = array
(
	'name' => Array(
		'required' => 'Name of the Donor cannot be blank',
		'default'  => 'Invalid Name of Donor'
	),
	
	'email' => Array(
		'required' => 'Email cannot be blank',
		'email' => 'Invalid Email',
		'default'  => 'Invalid Email'
	),
	
	'title' => Array(
		'required' => 'Title of the Book cannot be blank',
		'zero_books' => 'You need to donate atleast one book',
		'default'  => 'Invalid Title of Book'
	),
	
	'typeOfBook' => Array(
		'required' => 'Type of Book cannot be blank',
		'default'  => 'Invalid Type of Book'
	),
	
	'mobile' => Array(
		'required' => 'Mobile Number cannot be blank',
		'phone' => 'Invalid Mobile Number',
		'default'  => 'Invalid Mobile Number'
	),
	
	'donDate' => Array(
		'required' => 'The collction date is required for curriculum books',
		'past_date' => 'You cannot enter a past date for donation'
	)

)
?>