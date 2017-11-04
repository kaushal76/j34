<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access.
defined('_JEXEC') or die;

/**
 * Model class for Theme
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelTheme extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState() {
        $app = JFactory::getApplication('com_confmgt');

        // Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.theme.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.theme.id', $id);
        }
        $this->setState('theme.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('theme.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }

    /**
     * Method to get an oobject
     *
     * @param	integer	The id of the object to get.
     *
     * @return	mixed	Object on success, false on failure.
     */
    public function &getData($id = null) {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('theme.id');
            }

            $table = $this->getTable();

            if ($table->load($id)) {
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }

                $properties = $table->getProperties(1);
                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
            } elseif ($error = $table->getError()) {
                JFactory::$application->enqueueMessage($error);
            }
        }

        
		if ( isset($this->_item->created_by) ) {
			$this->_item->created_by = JFactory::getUser($this->_item->created_by)->name;
		}

			if (isset($this->_item->full_review_outcome) && $this->_item->full_review_outcome != '') {
				if(is_object($this->_item->full_review_outcome)){
					$this->_item->full_review_outcome = Joomla\Utilities\ArrayHelper::fromObject ($this->_item->full_review_outcome);
				}
				$values = (is_array($this->_item->full_review_outcome)) ? $this->_item->full_review_outcome : explode(',',$this->_item->full_review_outcome);

				$textValue = array();
				foreach ($values as $value){
					$db = JFactory::getDbo();
					$query = "select name, value from #__confmgt_review_outcomes WHERE value LIKE '" . $value . "'";
					$db->setQuery($query);
					$results = $db->loadObject();
					if ($results) {
						$textValue[] = $results->name;
					}
				}

			$this->_item->full_review_outcome = !empty($textValue) ? implode(', ', $textValue) : $oneItem->full_review_outcome;

			}

			if (isset($this->_item->abstract_review_outcome) && $this->_item->abstract_review_outcome != '') {
				if(is_object($this->_item->abstract_review_outcome)){
					$this->_item->abstract_review_outcome = Joomla\Utilities\ArrayHelper::fromObject ($this->_item->abstract_review_outcome);
				}
				$values = (is_array($this->_item->abstract_review_outcome)) ? $this->_item->abstract_review_outcome : explode(',',$this->_item->abstract_review_outcome);

				$textValue = array();
				foreach ($values as $value){
					$db = JFactory::getDbo();
					$query = "SELECT value, name FROM #__confmgt_review_outcomes  WHERE name LIKE '" . $value . "'";
					$db->setQuery($query);
					$results = $db->loadObject();
					if ($results) {
						$textValue[] = $results->value;
					}
				}

			$this->_item->abstract_review_outcome = !empty($textValue) ? implode(', ', $textValue) : $oneItem->abstract_review_outcome;

			}

        return $this->_item;
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
    public function getTable($type = 'Theme', $prefix = 'ConfmgtTable', $config = array()) {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkin($id = null) {
        // Get the id.
        $id = (!empty($id)) ? $id : (int) $this->getState('theme.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    JFactory::$application->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to check out an item for editing.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkout($id = null) {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int) $this->getState('theme.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    JFactory::$application->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to publish an item
     *
     * @param $id
     * @param $state
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function publish($id, $state) {
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;
        return $table->store();
    }

    /**
     * Method to check if a theme is allocated already to papers
     *
     * @param $id
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function checkAllocations($id) {

        $db		= $this->getDbo();
        $query	= $db->getQuery(true);

        $query->select('a.id');
        $query->from('`#__confmgt_papers` AS a');
        $query->select('b.title as theme');
        $query->join('LEFT', '#__confmgt_themes AS b ON b.id=a.theme');
        $query->where ('b.id = '.$id);
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        $column= $db->loadColumn(0);
        $comma_separated = implode(",", $column);

        if ($num_rows > 0) {
            JFactory::$application->enqueueMessage('This theme is allocated to some active papers. Paper IDs are: '.$comma_separated,'error');
            return false;
        }
        return true;
    }


    /**
     * Method to delete an item
     *
     * @param $id
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function delete($id) {
        $table = $this->getTable();
        return $table->delete($id);
    }

}
