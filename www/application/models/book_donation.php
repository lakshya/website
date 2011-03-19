<?php 
class Book_Donation_Model extends ORM {

	protected $belongs_to = array('user', 'book');
	
	public function save()
	{
		// Add added_at field, if its a new row. Override, even if its set.
		if($this->loaded === FALSE)
		{
			$this->added_at = date('Y-m-d H:i:s');
		}
		else
		{
			// Add correct date, if being modified
			$this->modified_at = date('Y-m-d H:i:s');
		}
		parent::save();
	}
}
?>