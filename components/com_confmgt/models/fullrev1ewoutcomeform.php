<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access.
defined('_JEXEC') or die;


/**
 * Model class for full review outcome
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelfullrev1ewoutcomeForm extends JModelForm
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
        } else {
            $id = JFactory::getApplication()->input->get('linkid');
            JFactory::getApplication()->setUserState('com_confmgt.edit.paper.id', $id);
            $linkid = JFactory::getApplication()->setUserState('com_confmgt.linkid', $id);
        }
        $this->setState('paper.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('paper.id', $params_array['item_id']);
        }
        $this->setState('params', $params);

    }

    /**
     * Method to get the paperID
     * @return bool/mixed
     * @since version 3.8.0
     */

    public function getLinkid()
    {
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'), 404);
        } else {
            return $linkid;
        }
    }


    /**
     * Method to get paper data
     *
     * @param null $id
     *
     * @return bool|null|object
     *
     * @since version 3.8.0
     * TODO remove getError as depreciated
     */
    public function &getData($id = null)
    {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('paper.id');
                if (empty($id)) {
                    $this->getLinkid();
                }
            }

            // Get a level row instance.
            $table = $this->getTable();
            $table_fullpaper = $this->getTable('FullPaper');

            // Attempt to load the row.
            if ($table->load($id)) {
                $table_fullpaper->load($table->fullpaper_id);
                $canEdit = AclHelper::isThemeleader(0, $table->id);

                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
                }

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $properties['fullpaper'] = $table_fullpaper->full_paper;
                $properties['full_review_outcome'] = $table_fullpaper->full_review_outcome;
                $properties['full_review_comments'] = $table_fullpaper->full_review_comments;
                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
            } elseif ($error = $table->getError()) {
                JFactory::getApplication()->enqueueMessage($error, 'error');
            }
        }

        return $this->_item;
    }

    /**
     * Proxy for the getRev1wers method
     * @return bool|mixed
     *
     * @since version 3.8.0
     */

    public function getRev1ewersData()
    {
        $linkid = $this->getLinkid();
        $rows = MainHelper::getRev1ewers((int)$linkid);
        if ($rows) {
            return $rows;
        } else {
            return false;
        }
    }

    /**
     * Proxy to get getReviewData
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public function getRev1ewData()
    {
        $linkid = $this->getLinkid();
        $rows = MainHelper::getRev1ews((int)$linkid, 'abstract');
        if ($rows) {
            return $rows;
        } else {
            return false;
        }
    }

    /**
     * Proxy to getAuthorsData
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public function getAuthorsData()
    {
        // get the paper id
        $linkid = $this->getLinkid();
        $rows = MainHelper::getAuthors((int)$linkid);
        if ($rows) {
            return $rows;
        } else {
            return false;
        }

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
     * TODO remove getError method as depreciated
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
                    JFactory::getApplication()->enqueueMessage($table->getError());
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
     * TODO remove getError method as depreciated
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
                    JFactory::getApplication()->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to get the form.
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
        $form = $this->loadForm('com_confmgt.paper', 'fullrev1ewoutcomeform', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) {
            throw new Exception('Cound not load form', 500);
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

        $authorised = AclHelper::isThemeleader(0, $id);

        if (!$authorised) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
        }

        $table = $this->getTable();
        $fullpaper_table = $this->getTable('fullpaper', 'ConfmgtTable');
        if (!$table->load($table->id)) {
            JFactory::getApplication()->enqueueMessage('Could not load the paper data', 'error');
            return false;
        }

        $fullpaper_data = $data;
        $fullpaper_data['id'] = $table->fullpaper_id;

        //save to the fullpapers table
        if (!$fullpaper_table->save($fullpaper_data) === true) {
            JFactory::getApplication()->enqueueMessage('Could not save the review data', 'error');
            return false;
        }

        return $table->id;
    }

}