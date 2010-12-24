<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Blog extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Blog',
			),
			'description' => array(
				'en' => 'Blog',
			),
			'frontend' => TRUE,
			'backend' => TRUE,
			'menu' => 'content'
		);
	}

	public function install() {
		return TRUE;
	}

	public function uninstall()	{		
			return FALSE;
	}

	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.";
	}
}

/* End of file details.php */
