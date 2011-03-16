<?php 
class Author_Model extends ORM  {
	
	protected $has_and_belongs_to_many = array('books');
	
	protected $primary_val = 'name';
}
?>