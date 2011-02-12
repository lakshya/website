<?
	$lang = array
	(
		'email' => Array
			(
				'required' => 'Email cannot be blank',
                                'email' => 'Invalid Email',
                                'notExists' => "Email doesn't exist in our records",
                                'default'  => 'Invalid Email'
			),
	    
                'captcha' => Array
                       (
                                'required' => 'Image Verification is required',
			        'Captcha::valid' => 'Image Verification failed',
			        'default' => 'Invalid Image verification' 
                       )
	  )
?>