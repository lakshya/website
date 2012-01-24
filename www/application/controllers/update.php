<?php
/**
 * A utility class to update the main & beta sites from the latest code
 * 
 * The code from beta is pulled from GitHub repository, where as main site is updated
 * from the current beta code
 * 
 * @author saich
 */
class Update_Controller extends Template_Controller {
	
	/**
	 * This function upgrades the current beta site to main site.
	 * 
	 * Requires admin privileges to do it
	 * 
	 * @author saich
	 */
	function index()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		
		// Work outside the web root
		chdir('../..');
		
		// delete the old backup & create a new one
		system('rm -rf www_backup');

		system('mv public_html/www www_backup/');
		
		system('cp -r public_html/beta public_html/www');
	
		// delete the logs copied from beta site
		system('rm -f public_html/www/application/logs/*.log.php');
		
		// copy the correct www/ database config file
		system('cp www_backup/application/config/database.php public_html/www/application/config/database.php');
		
		// copy the original files
		system('cp www_backup/application/logs/* public_html/www/application/logs/');
		
		// Call upgrade on the main site
		system('wget http://www.thelakshyafoundation.org/upgrade/');
	}
	
	/**
	 * Function to pull from the GitHub repository to the beta site.
	 * 
	 * Needs admin privileges to do it.
	 * @author saich
	 */
	function pull()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
	
		// Work outside the web root
		chdir('../..');
		
		// download  tar from github
		system('wget --no-check-certificate -O lakshya.tar.gz -o github.log https://github.com/lakshya/website/tarball/master');
		
		// unzip into 'beta_new' folder
		mkdir('beta_new');
		system('tar -xzf lakshya.tar.gz -C beta_new');
		
		// copy database & logs from old ones
		system('cp www/beta/application/config/database.php beta_new/lakshya-website-*/www/application/config/database.php');
		system('cp www/beta/application/logs/* beta_new/lakshya-website-*/www/application/logs/');
		
		// Delete the old beta backup & create a new one
		system('rm -rf beta_backup');
		system('mv www/beta/ beta_backup/');
		
		// Move 'beta_new' to 'beta'
		system('mv beta_new/lakshya-website-*/www/ www/beta/');
		
		// Call upgrade on the beta site
		system('wget http://stage.thelakshyafoundation.org/upgrade/');
		
		// Remove the temp. files
		system('rm lakshya.tar.gz');
		system('rm github.log');
		system('rm -rf beta_new');
	}
}
?>