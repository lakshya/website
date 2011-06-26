<?php
Class Newsletter_Model extends ORM {
	
	protected $table_name = 'newsletter';
	
	protected $primary_key = 'newsletter_id';
	
	protected $primary_val = 'email';
	
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
			->add_rules('email', 'required', 'email','length[3,140]')
			->add_rules('status','required','digit')
			->add_callbacks('email', array($this,'_unique_field'));
		return parent::validate($data, $save);
	}
	
	public function save()
	{
		// Add added_at field, if its a new row. Override, even if its set.
		if($this->loaded === FALSE)
		{
			$this->subscribe_key = $this->get_unique_key('subscribe_key');
			$this->unsubscribe_key = $this->get_unique_key('unsubscribe_key');
			$this->added_at = date('Y-m-d H:i:s');
		}
		return parent::save();
	}
	
	public function unique_key($id = NULL)
	{
		if ( !empty($id) AND is_string($id) AND !ctype_digit($id) )
		{
			return $this->primary_val;
		}
		return parent::unique_key($id);
	}
	
	public function confirm()
	{
		$this->status = 2;
		$this->confirmed_at = date('Y-m-d H:i:s');
		return $this->save();
	}
	
	private function get_unique_key($field)
	{
		$bSuccess = FALSE;
		$text = '';
		while($bSuccess != TRUE)
		{
			$text = text::random('alnum', 12);
			$result = ORM::factory($this->object_name)
				->where($field, $text)
				->count_all();
			if($result == 0)
			{
				$bSuccess = TRUE;
			}
		}
		return $text;
	}
}
?>