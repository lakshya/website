<?php 
class Profile_Model extends ORM {
	
	protected $belongs_to = array('user');
	
	public function validate(array& $data, $save = FALSE)
	{
		$data = Validation::factory($data)
				->add_rules('user_id', 'required', 'numeric')
				->add_rules('first_name', 'required', 'length[1,56]')
				->add_rules('last_name', 'required', 'length[1,24]')
				->add_rules('mobile', 'required', 'length[10,15]')
				->add_rules('relation_nitw', 'required', 'length[1,10]')
				->add_rules('updates', 'required', 'chars[0,1]')
				->add_rules('roll_no', 'required', 'length[1,15]')
				->add_rules('branch', 'required', 'length[1,24]')
				->add_rules('pass_year', 'required', 'digit', 'length[4]')
				->add_rules('address', 'required')
				->add_rules('city', 'required', 'length[1,48]')
				->add_rules('province', 'required', 'length[1,48]')
				->add_rules('zip_code', 'required', 'length[1,48]')
				->add_rules('country', 'required', 'length[1,48]')
				->add_rules('other_details', 'required');
		return parent::validate($data, $save);
	}
}
?>