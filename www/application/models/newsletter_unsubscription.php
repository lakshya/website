<?php 
class Newsletter_Unsubscription_Model extends ORM {
	
	protected $belongs_to = array('subscription' => 'newsletter_subscription');
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('subscription_id', 'required', 'numeric')
				->add_rules('reason', 'required');
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