<?php 
class Newsletter_Subscription_Model extends ORM {
	
	protected $primary_val = 'email';
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('pass_key', 'required', 'length[1,56]')
				->add_rules('email', 'required', 'email', 'length[1,128]')
				->add_rules('status', 'required', 'length[1,3]')
				->add_rules('last_mail', 'required', 'datetime');
		return parent::validate($data, $save);
	}
	
	public function unique_key($id = NULL)
	{
		if ( !empty($id) AND is_string($id) AND !ctype_digit($id) )
		{
			return 'pass_key';
		}
		return parent::unique_key($id);
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