<?
	$lang = array
	(
		'name' => Array
			(
				'required' => 'Name cannot be blank',
                                'length' => 'Name can be of 3 to 55 chars',
                                'default'  => 'Invalid Name'
			),
	    
                'email' => Array
                       (
                                'required' => 'Email cannot be blank',
                                'email' => 'Invalid Email',
                                'default'  => 'Invalid Email'
                       ),
	    	              
                'sub' => Array
                       (
                                'required' => 'Subject cannot be blank',
                                'length' => 'Subject can be of 255 chars',
                                'default'  => 'Invalid Subject'
                       ),
			
		'message' => Array
			(
				'required' => 'Message cannot be blank',
                                'default'  => 'Invalid Message'
			),

                'captcha' => Array
                       (
                                'required' => 'Image Verification is required',
			        'Captcha::valid' => 'Image Verification failed',
			        'default' => 'Invalid Image verification' 
                       )
	)
?>
