<?php
/**
 * @package     JDeveloper
 * @subpackage  Models
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * JDeveloper Xtd Model
 *
 * @package     JDeveloper
 * @subpackage  Models
 */
class JDeveloperModelXTD extends JModelLegacy
{
	/**
	 * Get all extension manifests
	 * 
	 * @param	string	$type	extension type
	 * 
	 * @return array	The extensions' manifests
	 */
	public function getManifests($type = "") {
		$files = JFolder::files(JDeveloperXTD, "\.xml$", true, true);
		$results = array();
		
		foreach ($files as $i => $file) {
			try {
				$xml = new SimpleXMLElement($file, null, true);
				
				if ($xml->getName() == "template") {
					$results[] = new JObject(array(
							"name" => (string) $xml->name,
							"type" => (string) $xml->attributes()["type"],
							"file" => $file
					));
				}
			} catch (Exception $e) {
			}
		}
		
		return $results;
	}
	
	/**
	 * Create template folder
	 * 
	 * @param string $name	Templte name
	 * @param string $type	Template type
	 * 
	 * @return boolean|mixed
	 */
	public function add($name, $type) {
		$file = JDeveloperXTD . "/templates/$type/$name/$name.xml";
		
		if (JFile::exists($file)) {
			return false;
		}
		
		$xml = new SimpleXMLElement("<template type=\"$type\"><name>$name</name></template>", null, false);
		$buffer = $xml->asXML();
		
		return JFile::write($file, $buffer);
	}
}