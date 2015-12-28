<?php
/**
 * @package     JCMS
 * @subpackage  language
 * 
 * @author		Tilo-Lars Flasche
 * @copyright	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */
namespace lib_jcms\language;

defined("_JEXEC") or die();

use Joomla\Registry as JRegistry;

/**
 * Language
 */
class Language
{
	/**
	 * Constructor
	 * 
	 * @param array $config		Configuration values
	 */
	public function __construct($config = array()) {
		if (is_array($config)) {
			$this->_config = $config;
		}
	}
	
	/**
	 * The configuration values
	 *
	 * @var array
	 */
	protected $_config = array();
	
	/**
	 * The language keys
	 *
	 * @var array
	 */
	protected $_keys = array();

	/**
	 * Compares this language instance to another language instance
	 *
	 * @param	Language	$language	Another language instance
	 * @param	boolean			$addKeys	Add keys that don`t exist in this instance
	 * @param	boolean			$override	Translate keys without translations by the given language instance
	 *
	 * @return	Language	This
	 */
	public function compareTo(Language $language, $addKeys = true, $override = false)
	{
		$keys = $language->toArray();
		
		// add keys
		if ($addKeys)
		{
			foreach ($keys as $key => $value)
			{
				if (!$this->exists($key))
				{
					$this->set($key, "");
				}
			}
		}
		
		// override keys
		if ($override)
		{
			foreach ($keys as $key => $value)
			{
				if ($value != "")
				{
					$this->set($key, $value);
				}
			}
		}
		
		return $this;
	}

	/**
	 * Count the language keys
	 *
	 * @return	int		The number of language keys
	 */
	public function count()
	{
		return count($this->_keys);
	}

	/**
	 * Count the language keys which are translated
	 *
	 * @return	int		The number of translated language keys
	 */
	public function countTranslated()
	{
		$count = 0;
		
		foreach ($this->_keys as $row)
		{
			if ($row != "") {
				$count += 1;
			}
		}
		
		return $count;
	}
	
	/**
	 * Delete key
	 * 
	 * @param	string	$key	language key
	 * 
	 * @return	boolean		true on success, false otherwise
	 */
	public function delete($key)
	{
		if (!$this->exists($key)) {
			return false;
		}
		
		unset($this->_keys[$key]);
		
		return true;
	}

	/**
	 * Checks if a language key exists
	 *
	 * @param	string	$key	The language key
	 *
	 * @return	boolean	True if key exists, false otherwise
	 */
	public function exists($key)
	{
		return array_key_exists($key, $this->_keys);
	}

	/**
	 * Get the translation of a language key
	 *
	 * @param	string	$key		The language key
	 * @param	string	$default	Return this value if key does not exist
	 *
	 * @return	string	The key`s translation
	 */
	public function get($key, $default = "")
	{
		if (array_key_exists($key, $this->_keys))
		{
			return $this->_keys[$key];
		}
		
		return $default;
	}
	
	/**
	 * Get language key by value
	 * 
	 * @param	string	$value	translation
	 * 
	 * @return	mixed	language key on success, false if value doesn't exist
	 */
	public function getKeyByValue($value)
	{
		return array_search($value, $this->_keys);
	}

	/**
	 * Does the language key exists and does it have a non empty value
	 *
	 * @param	string	$key		The language key
	 *
	 * @return	boolean
	 */
	public function isTranslated($key)
	{
		if ($this->exists($key) && $this->get($key) != "")
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Load language keys and translations from INI string
	 * 
	 * @param string	$string		ini language string
	 * @param boolean	$override	true if translated keys should be overwritten, false if not
	 * 
	 * @return	Language	This
	 */
	public function loadKeysFromArray($keys, $override = false)
	{
		// add keys and translations
		foreach ($keys as $key => $translation) {
			if ($override) {
				$this->set($key, $translation);
			} elseif (!$this->isTranslated($key)) {
				$this->set($key, $translation);
			}
		}
		
		return $this;
	}
	
	/**
	 * Load language keys and translations from INI string
	 * 
	 * @param string	$string		ini language string
	 * @param boolean	$override	true if translated keys should be overwritten, false if not
	 * 
	 * @return	Language	This
	 */
	public function loadKeysFromINI($string, $override = false)
	{
		// convert language file content to array
		$registry = new JRegistry();
		$registry->loadString($string, "INI");
		$keys = $registry->toArray();
		
		// add keys and translations
		foreach ($keys as $key => $translation) {
			if ($override) {
				$this->set($key, $translation);
			} elseif (!$this->isTranslated($key)) {
				$this->set($key, $translation);
			}
		}
		
		return $this;
	}
	
	/**
	 * Load language keys and translations from PHP string
	 * 
	 * @param string	$string		php string
	 * @param boolean	$override	true if translated keys should be overwritten, false if not
	 * 
	 * @return	Language	This
	 */
	public function loadKeysFromPHP($string, $override = false)
	{
		$regex = "/JText::(_|alt|plural|printf|script|sprintf)\([\"']([A-Za-z0-9_]*)[\"']/";
		preg_match_all($regex, $string, $matches);
			
		foreach ($matches[2] as $key)
		{
			if ($override) {
				$this->set($key, "");
			} elseif (!$this->isTranslated($key)) {
				$this->set($key, "");
			}
		}

		return $this;
	}
	
	/**
	 * Load language keys and translations from XML string
	 * 
	 * @param string	$string		xml string
	 * @param boolean	$override	true if translated keys should be overwritten, false if not
	 * 
	 * @return	Language	This
	 */
	public function loadKeysFromXML($string, $override = false)
	{
		// get field language keys
		preg_match_all("/(label|description)=[\"']([A-Za-z0-9_]*)[\"']/", $string, $matches);
			
		foreach ($matches[2] as $key)
		{
			if ($override) {
				$this->set($key, "");
			} elseif (!$this->isTranslated($key)) {
				$this->set($key, "");
			}
		}
			
		// get option language keys
		preg_match_all("/<option value=[\"'][^\"']*[\"']>([A-Za-z0-9_]*)<\/option>/", $string, $matches);
		
		foreach ($matches[1] as $key)
		{
			if ($override) {
				$this->set($key, "");
			} elseif (!$this->isTranslated($key)) {
				$this->set($key, "");
			}
		}
		
		return $this;
	}

	/**
	 * Add a language key`s value if it exists
	 *
	 * @param	string	$key			The language key
	 * @param	string	$translation	The language key translation
	 */
	public function set($key, $translation)
	{
		$this->_keys[$key] = $translation;
	}

	/**
	 * Get the language keys as array
	 *
	 * @return	Language	This
	 */
	public function sort()
	{
		ksort($this->_keys);
		
		return $this;
	}

	/**
	 * Get the language keys as array
	 *
	 * @return	array
	 */
	public function toArray()
	{
		return $this->_keys;
	}

	/**
	 * Get the language keys as array
	 *
	 * @return	array
	 */
	public function toINI()
	{
		$ini = "";
		
		foreach ($this->_keys as $key => $translation) {
			$ini .= $key . "=\"" . $translation . "\"\n";
		}
		
		return $ini;
	}

	/**
	 * Set a language key`s value if it exists
	 *
	 * @param	string	$key			The language key
	 * @param	string	$translation	The language key translation
	 *
	 * @return	mixed	The key translation if exists, false otherwise
	 */
	public function translate($key, $translation)
	{
		if ($this->exists($key))
		{
			return $this->set($key, $translation);
		}
		
		return false;
	}
}