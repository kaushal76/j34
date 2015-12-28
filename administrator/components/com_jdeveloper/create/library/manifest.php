<?php
/**
 * @package     JDeveloper
 * @subpackage  Create.Library
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JDeveloperLoader::import("library", JDeveloperCREATE);

/**
 * Library Create Class
 *
 * @package     JDeveloper
 * @subpackage  Create.Library
 */
class JDeveloperCreateLibraryManifest extends JDeveloperCreateLibrary
{		
	/**
	 * The template file
	 *
	 * @var	string
	 */
	protected $templateFile = "library.xml";

	protected function initialize()
	{
		$this->template->addPlaceHolders(
			array( 
			"author" 			=> $this->item->get('author'),
			"author_email" 		=> $this->item->get('author_email'),
			"author_url" 		=> $this->item->get('author_url'),
			"copyright" 		=> $this->item->get('copyright'),
			"creationdate" 		=> date("M Y"),
			"licence"	 		=> $this->item->get('licence'),
			"languages"	 		=> $this->lang(),
			"version"	 		=> $this->item->get('version'),
			)
		);
		
		return parent::initialize();
	}

	/**
	 * Get language
	 * 
	 * @return string
	 */
	private function lang()
	{
		$buffer = '';
		$name = $this->item->name;
		
		foreach ($this->item->params['languages'] as $lang)
		{
			$buffer .= "\n\t\t<language tag=\"$lang\">language/$lang.lib_$name.ini</language>";
			$buffer .= "\n\t\t<language tag=\"$lang\">language/$lang.lib_$name.sys.ini</language>";
		}

		return $buffer;
	}
}