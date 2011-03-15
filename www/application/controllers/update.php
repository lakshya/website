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
	
	function index()
	{
		if(!$this->_permit('admin')) { $this->_denied(); return; }
		
		// Beta to www
		// Delete 'www_backup'
		// Copy 'www' to 'www_backup'
		// Copy 'beta' to 'www'
		// Copy config/database.php & logs/
		// Set Permissions on logs/ & cache/
		// Run upgrade on it
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
		system('cp public_html/beta/application/config/database.php beta_new/lakshya-website-*/www/application/config/database.php');
		system('cp public_html/beta/application/logs/* beta_new/lakshya-website-*/www/application/logs/');
		
		// Delete the old beta backup & create a new one
		system('rm -rf beta_backup');
		system('mv public_html/beta/ beta_backup/');
		
		// Move 'beta_new' to 'beta'
		system('mv beta_new/lakshya-website-*/www/ public_html/beta/');
		
		// Call upgrade on the beta site
		system('wget http://beta.thelakshyafoundation.org/upgrade/');
		
		// Remove the temp. files
		system('rm lakshya.tar.gz');
		system('rm github.log');
		system('rm -rf beta_new');
	}
}
?>