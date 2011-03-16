<?php
class User_Model extends ORM {
	
	protected $has_one = array('profile');
	
	protected $has_many = array('testimonials', 'cloth_donations', 'money_donations', 'book_donations');
	
	protected $primary_val = 'username';
	
	public function unique_key($id = NULL)
	{
		if ( !empty($id) AND is_string($id) AND !ctype_digit($id) )
		{
			return 'username';
		}
		return parent::unique_key($id);
	}
	
	public function validate(array& $data, $save = FALSE)
	{
		// All the fields MUST have at least one rule, else they won't be
		// entered into the database.
		$data = Validation::factory($data)
				->add_rules('username', 'required', 'username')
				->add_rules('password', 'required', 'length[1,56]')
				->add_rules('email', 'required', 'email', 'length[1,128]')
				->add_rules('status', 'required', 'numeric')
				->add_rules('permissions', 'required', 'numeric')
				->add_rules('added_at', 'required', 'standard_text')
				->add_rules('lastlogin', 'standard_text')
				->add_callbacks('username', array($this, '_unique_field'))
				->add_callbacks('email', array($this, '_unique_field'));
		return parent::validate($data, $save);
	}
}
?>