<?php
/**
 * @package     JDeveloper
 * @subpackage  Library
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined("_JEXEC") or die;

jimport("joomla.filesystem.file");
jimport("jcms.template");

use lib_jcms\template\Template as JCMSTemplate;

/**
 * Class for working with template files
 */
class JDeveloperTemplate extends JCMSTemplate
{
	/**
	 * Get all language keys from the template which match the given patterns
	 *
	 * @param array	$patterns The patterns
	 *
	 * @return array The matched elements
	 */
	public function getLanguageKeys($patterns = array()) {
		$langkeys = array ();
	
		foreach ($patterns as $pattern) {
			preg_match_all("/" . $pattern . "/", $this->buffer, $matches);
			$langkeys = array_merge($langkeys, $matches [0]);
		}
	
		return $langkeys;
	}
}