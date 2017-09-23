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
 * Paper form model
 * Model to work on the paper create / update
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelPaperForm extends JModelForm
{

    var $_item = null;

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since    1.6
     */
    protected function populateState()
    {
        $app = JFactory::getApplication('com_confmgt');

        // Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.paper.id');
            $this->setState('paper.id', $id);
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.paper.id', $id);
            $linkid = JFactory::getApplication()->input->get('linkid');
            $this->setState('paper.id', $id);
        }
    }

    /**
     * Method to get the paper ID .
     *
     * @param    none
     *
     * @return    paper ID (Int) on success false on failure.
     */
    public function getLinkid()
    {
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'));
        } else {
            return $linkid;
        }
    }


    /**
     * Method to get an ojbect.
     *
     * @param    integer    The id of the object to get.
     *
     * @return    mixed    Object on success, false on failure.
     * TODO replace getError() as depreciated
     */
    public function &getData($id = null)
    {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('paper.id');
            }

            // Get a level row instance.
            $table = $this->getTable();
            $abstract_table = $this->getTable('abstract');

            // Attempt to load the row.
            if ($table->load($id)) {

                // Can the user edit the paper
                $user = JFactory::getUser();
                $id = $table->id;
                $abstract_table->load($table->abstract_id);

                if ($id) {
                    $canEdit = AclHelper::isAuthor($id);
                } else {
                    $canEdit = ($user->id > 0);
                }

                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
                }

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $properties['abstract'] = $abstract_table->abstract;
                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');

            } elseif ($error = $table->getError()) {
                JFactory::getApplication()->enqueueMessage($error, 'error');
            }
        }
        return $this->_item;
    }

    public function getTable($type = 'Paper', $prefix = 'ConfmgtTable', $config = array())
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }


    /**
     * Method to check in an item.
     *
     * @param    integer        The id of the row to check out.
     * @return    boolean        True on success, false on failure.
     * @since    1.6
     */
    public function checkin($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('paper.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    JFactory::getApplication()->enqueueMessage($table->getError(), 'error');
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to check out an item for editing.
     *
     * @param    integer        The id of the row to check out.
     * @return    boolean        True on success, false on failure.
     * @since    1.6
     */
    public function checkout($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('paper.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    JFactory::getApplication()->enqueueMessage($table->getError(), 'error');
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to get the profile form.
     *
     * The base form is loaded from XML
     *
     * @param    array $data An optional array of data for the form to interogate.
     * @param    boolean $loadData True if the form is to load its own data (default case), false if not.
     * @return    JForm    A JForm object on success, false on failure
     * @since    1.6
     */
    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_confmgt.paper', 'paperform', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) {
            throw new Exception('Cannot load the form');
        }
        return $form;
    }

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return    mixed    The data for the form.
     * @since    1.6
     */
    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_confmgt.edit.paper.data', array());
        if (empty($data)) {
            $data = $this->getData();
        }
        return $data;
    }

    /**
     * Method to save the form data.
     *
     * @param    array        The form data.
     * @return    mixed        The user id on success, false on failure.
     * @since    1.6
     */
    public function save($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('paper.id');
        $user = JFactory::getUser();

        //preparing abstract data initially
        $data_prepared = $data;
        $data_prepared['id'] = $data['abstract_id'];
        $data_prepared['linkid'] = $id;
        $data_prepared['created_by'] = $user->id;


        if ($id) {
            $authorised = AclHelper::isAuthor($id);
        } else {
            $authorised = ($user->id > 0);
        }

        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
        }

        $table = $this->getTable();
        $abstract_table = $this->getTable('Abstract', 'ConfmgtTable');

        $abstract_data = $abstract_table->save($data_prepared);

        if ($abstract_data) {
            //set the abstract_id data for the papers table
            $data['abstract_id'] = $abstract_table->id;
            $data['state'] = (int)1;

            if (!$table->save($data) === true) {
                JFactory::getApplication()->enqueueMessage($table->getError());
                return false;
            }
            return true;
        } else {
            JFactory::getApplication()->enqueueMessage($table->getError());
            return false;
        }

    }

    /**
     * Method to create a new abstract - reserve and return the paper ID.
     * @since version 3.8.0
     * @param $data (array)
     * @return mixed The newly created paper id on success, false on failure.
     *
     */


    public function newAbstract($data)
    {
        $user = JFactory::getUser();
        $data = array();

        //insert the author ID
        $data['created_by'] = $user->id;

        //get the table
        $table = $this->getTable();

        //save an empty record to reserve the paper id
        if ($table->save($data) === true) {

            //get the last created paper id
            $id = $table->id;

            //check the author and return the last paper id
            if ($table->created_by == $user->id) {
                //update the linkid field with the new ID created
                $data_new['linkid'] = $id;
                //make the abstract active
                $data_new['active'] = 1;
                //save the row once more
                if ($table->save($data_new) === true) {
                    // return the new ID
                    $id_new = $table->id;
                    return $id_new;
                } else {
                    return false;
                }

            } else {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
            }

        } else {
            JFactory::getApplication()->enqueueMessage($table->getError());
            return false;
        }

    }

    function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('paper.id');
        if (AclHelper::isAuthor($id) !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
        }
        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } else {
            JFactory::getApplication()->enqueueMessage($table->getError());
            return false;
        }
    }

}