<?php 
class Upgrade_Model extends ORM {

	protected $primary_val = 'name';
	
	public function unique_key($id = NULL)
	{
		if ( !empty($id) AND is_string($id) AND !ctype_digit($id) )
		{
			return 'name';
		}
		return parent::unique_key($id);
	}
}
?>