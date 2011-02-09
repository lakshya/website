<?
	$lang = array
	(
		'name' => Array
			(
				'required' => 'Name cannot be blank',
                                'default'  => 'Invalid Name'
			),

                'username' => Array
			(
				'required' => 'UserName cannot be blank',
                                'default'  => 'Invalid UserName'
			),
	    	
		'donAmount' => Array
			(
				'required' => 'Donation Amount cannot be blank',
                                'digit' => 'Donation Amount must be a number',
                                'default'  => 'Invalid Donation Amount'
			),

                'donDate' => Array
                       (
                                'required' => 'Donation Date cannot be blank',
                                'default'  => 'Invalid Donation date'
                       ),

                'email' => Array
                       (
                                'required' => 'Email cannot be blank',
                                'email' => 'Invalid Email',
                                'default'  => 'Invalid Email'
                       ),
	    	              
                'cat' => Array
                       (
                                'cat' => 'Category cannot be blank',
                                'default'  => 'Invalid Category'
                       ),			
		'mobile' => Array
			(
				'phone' => 'Invalid Mobile number',
				'default' => 'Invalid Mobile number'
			)
		
	)
?>