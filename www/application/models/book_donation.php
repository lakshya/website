<?php 
class Book_Donation_Model extends ORM {

	protected $belongs_to = array('user', 'book');
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('book_id', 'required', 'numeric')
				->add_rules('user_id', 'required', 'numeric')
				->add_rules('copies', 'required', 'numeric')
				->add_rules('status', 'required', 'numeric')
				->add_rules('donation_date', 'required', 'date')
				->add_rules('email', 'required', 'email', 'length[1,128]')
				->add_rules('contact_number', 'required', 'length[10,15]')
				->add_rules('address', 'required')
				->add_rules('instructions', 'required')
				->add_rules('anonymous', 'required', 'chars[0,1]');
		return parent::validate($data, $save);
	}
	
	public function save()
	{
		// Add added_at field, if its a new row. Override, even if its set.
		if($this->loaded === FALSE)
		{
			$this->added_at = date('Y-m-d H:i:s');
		}
		else
		{
			// Add correct date, if being modified
			$this->modified_at = date('Y-m-d H:i:s');
		}
		parent::save();
	}
}
?>