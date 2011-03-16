<?php defined('SYSPATH') OR die('No direct access allowed.');

class ORM extends ORM_Core {

	/**
	 * Rule: A callback function for the Validation object
	 * on unique fields.
	 *
	 * @param  Validation  Complete Validation object
	 * @param  String	Name of the field
	 */
	public function _unique_field(Validation $array, $field)
	{
		$result = ORM::factory($this->object_name)
			->where($field, $array[$field])
			->count_all();
		if($result > 0) 
			$array->add_error($field, 'duplicate');
	}
}
?>