<?php 
class Confirmation_Model extends ORM {
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('type', 'required', 'length[1,3]')
				->add_rules('email', 'required', 'email', 'length[1,128]')
				->add_rules('hash', 'required', 'length[1,50]')
				->add_rules('expires_at', 'required', 'datetime')
				->add_rules('confirmed_at', 'required', 'datetime');
		return parent::validate($data, $save);
	}
	
	public function save()
	{
		// Add added_at field, if its a new row. Override, even if its set.
		if($this->loaded === FALSE)
		{
			$this->added_at = date('Y-m-d H:i:s');
		}
		parent::save();
	}
}
?>