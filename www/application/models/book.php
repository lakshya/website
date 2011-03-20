<?php 
class Book_Model extends ORM {
	
	protected $has_and_belongs_to_many = array('authors');
	
	protected $primary_val = 'title';
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('title', 'required', 'length[1,128]')
				->add_rules('category', 'required', 'length[1,3]');
		return parent::validate($data, $save);
	}
}
?>