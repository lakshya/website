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
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('name', 'required', 'length[2,48]')
				->add_callbacks('name', array($this, '_unique_field'));
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