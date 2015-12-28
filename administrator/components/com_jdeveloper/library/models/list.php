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
 * JDeveloper List Model
 *
 * @package     JDeveloper
 * @subpackage  Models
 */
class JDeveloperModelList extends JModelList
{	
	/**
	 * Get id of last item
	 * 
	 * @return int	The id of the last item
	 */
	public function getLastItemId() {
		$db = JFactory::getDbo();
		
		$query = $db->getQuery(true)
		->select("a.id")
		->from("#__jdeveloper_" . $this->getName() . " AS a")
		->order("a.id DESC LIMIT 1");
		
		$db->setQuery($query);

		return $db->loadResult();
	}
}