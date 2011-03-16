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
}
?>