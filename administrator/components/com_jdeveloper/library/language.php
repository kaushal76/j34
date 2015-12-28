<?php
/**
 * @package     JDeveloper
 * @subpackage  Library
 * 
 * @author		Tilo-Lars Flasche
 * @copyright	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */
defined("_JEXEC") or die();

jimport("jcms.language");

use lib_jcms\language\Language as JCMSLanguage;

/**
 * JDeveloper Language class
 */
class JDeveloperLanguage extends JCMSLanguage
{
	/**
	 * Language object container
	 *
	 * @var array<JDeveloperLanguage>
	 */
	private static $instances = array();
	
	/**
	 * Add language keys
	 *
	 * @param	array	$array			The language keys
	 * @param	string	$subprefix		An optional prefix
	 * @param	boolean	$addPrefix		Should the standart prefix be added?
	 *
	 * @return	void
	 */
	public function addKeys($array, $subprefix = "", $addPrefix = true)
	{
		foreach ($array as $key => $value)
		{
			$parts = array();
			
			if ($addPrefix && isset($this->_config["prefix"]) && !empty($this->_config["prefix"]))
			{
				$parts[] = $this->_config["prefix"];
			}
				
			if (!empty($subprefix)) {
				$parts[] = $subprefix;
			}
			
			if (!empty($key)) {
				$parts[] = $key;
			}
			
			$this->set(strtoupper(implode("_", $parts)), $value);
		}
	}
	
	/**
	 * Get lannguage keys as INI string
	 *
	 * @return	JDeveloperLanguage
	 */
	public static function &getInstance($name, $config = array()) {
		if (!isset(self::$instances[$name]))
		{
			self::$instances[$name] = new JDeveloperLanguage($config);
		}
	
		return self::$instances[$name];
	}
}