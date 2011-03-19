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
		// All the fields, that are not added automatically by ORM
		// MUST have at least one rule, else they won't be
		// entered into the database.
		
		$data = Validation::factory($data)
				->add_rules('username', 'required', 'username')
				->add_rules('password', 'required', 'length[1,56]')
				->add_rules('email', 'required', 'email', 'length[1,128]')
				->add_rules('status', 'required', 'numeric')
				->add_rules('permissions', 'required', 'numeric')
				->add_rules('lastlogin', 'datetime')
				->add_callbacks('username', array($this, '_unique_field'))
				->add_callbacks('email', array($this, '_unique_field'));
		return parent::validate($data, $save);
	}
	
	public function save()
	{
		// Encrypt the password before saving in the database
		if( isset($this->changed['password']) )
		{
			$this->password = sha1($this->password);
		}
		
		// Add added_at field, if its a new row. Override, even if its set.
		if($this->loaded === FALSE)
		{
			$this->added_at = date('Y-m-d H:i:s');
		}
		
		return parent::save();
	}
}
?>