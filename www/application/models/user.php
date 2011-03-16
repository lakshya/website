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
		$data = Validation::factory($data)
				->add_rules('password', 'required');
		return parent::validate($data, $save);
	}
}
?>