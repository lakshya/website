<?php 
class Money_Donation_Model extends ORM {
	
	protected $belongs_to = array('user');
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('user_id', 'required', 'numeric')
				->add_rules('amount', 'required', 'decimal[10,2]')
				->add_rules('donation_date', 'required', 'date')
				->add_rules('anonymous', 'chars[0,1]')
				->add_rules('payment_mode', 'required', 'length[1,24]')
				->add_rules('details', 'required');
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