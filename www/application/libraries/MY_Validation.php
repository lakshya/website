<?php defined('SYSPATH') OR die('No direct access allowed.');

class Validation extends Validation_Core {

	/**
	 * Rule: username. Generates an error if the field is not in username format.
	 *
	 * @param   string  field value
	 * @return  bool
	 */
	public function username($value)
	{
		if(strlen($value) < 5 || strlen($value) > 24) return FALSE;
		return (preg_match("/^[a-z]+(\.)?([a-z0-9]+(\.)?)*[a-z0-9]+$/", $value) == 0) ? FALSE : TRUE;
	}
	
	public function sgpa($sg)
	{
		$sg = (float)$sg;
		if($sg < 0 || $sg > 10) return FALSE;
		return TRUE;
	}
	
	public function percent($p)
	{
		$p = (float)$p;
		if($p < 0 || $p > 100.00) return FALSE;
		return TRUE;
	}

} // End Validation
?>