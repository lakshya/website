<?php 
class Book_Donation_Model extends ORM {

	protected $belongs_to = array('user', 'book');
}
?>