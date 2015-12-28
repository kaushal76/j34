<?php
/**
 * JDeveloper update script
 *
 * @package     JDeveloper
 * @subpackage  JDeveloper
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die('Restricted access');

class com_jdeveloper_update_3_10_1
{
	/**
	 * Custom update method for JDeveloper
	 *
	 * @param	object	$parent		The installer adapter
	 *
	 * @return  void
	 */
	public function update($config = array()) {
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . "/tables");
		$table = JTable::getInstance("Field", "JDeveloperTable");
		$db = JFactory::getDbo();
		
			if (!array_key_exists("options", $table->getFields())) {
			$db->setQuery("ALTER TABLE `#__jdeveloper_fields` ADD `options` TEXT NOT NULL AFTER `maxlength`;")->execute();
		}
		
		if (!array_key_exists("attributes", $table->getFields())) {
			$db->setQuery("ALTER TABLE `#__jdeveloper_fields` ADD `attributes` TEXT NOT NULL AFTER `options`;")->execute();
		}
	}
}