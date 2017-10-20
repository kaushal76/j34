<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
defined('_JEXEC') or die;

/**
 * Model class for Reviewers
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelRev1ewers extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {
        parent::populateState();
    }


    /**
     * Method to get the table object
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     *
     * @since version 3.8.0
     */
    public function getTable($type = 'Rev1ewers', $prefix = 'ConfmgtTable', $config = array())
	{   
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');
        return JTable::getInstance($type, $prefix, $config);
	} 
	


	/**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery 
     * @since	1.6
     */
    protected function getListQuery() {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		
	    // Select the required fields from the table.
        $query->select( array('a.*', 'COUNT(b.reviewer_id) AS papers'));
        $query->from('#__confmgt_rev1ewers AS a');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers_papers', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.reviewer_id') . ')');
		$query->group('a.id');
		$query->order('a.ordering ASC'); 
		return $query;
		
	}

	public function getItems() {
        return parent::getItems();
    }

}
