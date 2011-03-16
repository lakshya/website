<?php 
class Book_Model extends ORM {
	
	protected $has_and_belongs_to_many = array('authors');
	
	protected $primary_val = 'title';
}
?>