<?php
/**
 * 
 * A Utility class to make one-time changes on db upgradation.
 * 
 * One-time changes mainly consist of Database Schema changes & corresponding
 * data upgrades.
 * 
 * This class must adhere to following rules:
 * 	- No function except index must be accessible.
 * 	- Must be accessible only when called from the same server (use wget)
 *  - Each of the one-time function must return boolean (true indicating success)
 *  - The one-time functions are never to be deleted from the code
 *  - Functions to be called must be updated in $functions_to_call array.
 *  - Due to its complexity, please comment every function in detail.
 *  - The upgraded function list is stored in the database
 *  
 * @author saich
 */
class Upgrade_Controller extends Template_Controller {

	/**
	 * 
	 * Gives the list of all the names of upgrade functions.
	 * 
	 * The functions must be member functions of this class.
	 * Each function must return true / false, true representing 
	 * that one-time call is success, and will not be called
	 * in the next upgrade.
	 * 
	 * @var array of strings
	 */
	private $functions_to_call = array();
	
	/**
	 * 
	 * Name of the table, containing completed upgrades' information
	 * @var string
	 */
	private $table_name = 'upgrades';
	
	function index()
	{
		if($this->input->server('SERVER_ADDR') !== $this->input->server('REMOTE_ADDR'))
		{
			$this->_denied();
			return;
		}		
		
		$db = new Database();
		if (!$db->table_exists($this->table_name)) 
		{
			// Create the 'upgrades' table here!
			$create_table = <<<EOT
			create table {$db->table_prefix()}{$this->table_name}(
				id			int unsigned auto_increment, /* unique id for each tracking status */
				name		varchar(48), /* Represents the unique name of the upgrade */
				added_at	datetime, /* Time of upgradation */
				primary key(id),
				unique key(name)
			);
EOT;
			$db->query($create_table);			
		}
		
		foreach ($this->functions_to_call as $fn)
		{
			if(method_exists($this, $fn))
			{
				// Check from ORM if this $fn is already called!
				$already_called = ORM::factory('upgrade')->where('name', $fn)->count_all();
				if(!$already_called)
				{
					Kohana::log('debug', "Calling the Upgrade function: $fn");
					$bSuccess = $this->$fn();
					if ($bSuccess)
					{
						// Add this entry to the file
						$update = ORM::factory('upgrade');
						$update->name = $fn;
						$update->added_at = date('Y-m-d H:i:s');
						$update->save();
						if(!$update->saved) {
							Kohana::log('error', "DB Save failed for upgrade function: $fn");
						}
					}
					else {
						Kohana::log('error', "Upgrade - $fn failed!");
					}
				}
				else {
					Kohana::log('debug', "Upgrade Function: $fn already called!");
				}
			}
			else
			{
				Kohana::log('debug', "Upgrade: Not calling the function $fn");
			}
		}
	}
}
?>