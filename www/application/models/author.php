<?php 
class Author_Model extends ORM  {
	
	protected $has_and_belongs_to_many = array('books');
	
	protected $primary_val = 'name';
		
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('name', 'required', 'length[1,56]');
		return parent::validate($data, $save);
	}
}
?>