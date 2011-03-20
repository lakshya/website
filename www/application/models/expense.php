<?php 
class Expense_Model extends ORM {
	
	protected $primary_val = 'title';
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('amount', 'required', 'numeric')
				->add_rules('title', 'required', 'length[1,128]')
				->add_rules('expense_date', 'required', 'date')
				->add_rules('details', 'required')
				->add_rules('document', 'required', 'length[1,128]');
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