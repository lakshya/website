<?php 
class Expense_Model extends ORM {
	
	protected $primary_val = 'title';
	
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