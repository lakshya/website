<?php 
class Newsletter_Subscription_Model extends ORM {
	
	protected $primary_val = 'email';
	
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