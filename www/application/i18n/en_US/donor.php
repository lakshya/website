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
                                'default'  => 'Invalid Email'
                       ),
	    	              
                'oldPasswd' => Array
                       (
                                'required' => 'Old Password cannot be blank',
                                'length' => 'Old Password can be of 3 to 55 chars',
                                'default'  => 'Invalid Old Password'
                       ),			
		'newPasswd' => Array
			(
				'required' => 'New Password cannot be blank',
				'length' => 'New Password can be of 3 to 55 chars',
                                'matches' => 'Passwords are not similar',
                                'default'  => 'Invalid New Password'
			),
                'confirmPasswd' => Array
                       (
                                'required' => 'Confirm Password cannot be blank',
                                'default'  => 'Invalid Confirm Password'
                       )
	)
?>