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
 * Confmgt author model.
 */

class ConfmgtModelAuthor extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState() {
        $app = JFactory::getApplication('com_confmgt');
        $linkid = $app->input->get('linkid',0,'int');

        // Load state from the request authorState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit' ) {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.author.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.author.id', $id);
        }
        $this->setState('author.id', $id);

    }

    /**
     * Method to get the linkid set in get / post data.
     * @since version 3.8.0
     * @return	linkid
     * @return boolean
     *
     */
	public function getLinkid()
	{
        $linkid = JFactory::getApplication()->input->get('linkid',0,'int');
        if ($linkid == 0)
        {
            throw new Exception(JText::_('JERROR_NO_PAPERID'),500);
        }else{
            return $linkid;
        }
	}


    /**
     * Method to get an ojbect.
     *
     * @param	integer	The id of the object to get.
     *
     * @return	mixed	Object on success, false on failure.
     */
    public function &getData($id = null) {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('author.id');
            }

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }

                // Convert the JTable to a clean JObject.
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
					$this->_item->full_review_outcome = Joomla\Utilities\ArrayHelper::fromObject($this->_item->full_review_outcome);
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

			$this->_item->full_review_outcome = !empty($textValue) ? implode(', ', $textValue) : $this->_item->full_review_outcome;

			}

			if (isset($this->_item->abstract_review_outcome) && $this->_item->abstract_review_outcome != '') {
				if(is_object($this->_item->abstract_review_outcome)){
					$this->_item->abstract_review_outcome = Joomla\Utilities\ArrayHelper::fromObject($this->_item->abstract_review_outcome);
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

			$this->_item->abstract_review_outcome = !empty($textValue) ? implode(', ', $textValue) : $this->_item->abstract_review_outcome;

			}

        return $this->_item;
    }

    public function getTable($type = 'Author', $prefix = 'ConfmgtTable', $config = array()) {
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
        $id = (!empty($id)) ? $id : (int) $this->getState('author.id');

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
        $id = (!empty($id)) ? $id : (int) $this->getState('author.id');

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
     * Method to publish  an author
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
     * Method to delete an author
     *
     * @param $id
     * @param $linkId
     *
     * @return bool
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function delete($id, $linkId) {

        $authorised = AclHelper::isAuthor($linkId);

        if (!$authorised) {
            throw New Exception('Not Authorised');
            return false;
        }

        $table = $this->getTable();
        return $table->delete($id);
    }

}
