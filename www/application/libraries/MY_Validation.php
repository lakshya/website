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
	
	/**
	*
	* Date Time Rule to validate MySQL datetime formatting (yyyy-mm-dd H:i:s)
	* @param string $value
	* @return bool
	*/
	function datetime($value)
	{
		if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $value, $matches)) {
			if (checkdate($matches[2], $matches[3], $matches[1])) {
				return true;
			}
		}
		return false;
	}

} // End Validation
?>