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
 * Model class for full paper form
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelFullpaperForm extends JModelForm
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
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.fullpaper.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.fullpaper.id', $id);
        }
        $this->setState('fullpaper.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('fullpaper.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }

    /**
     * Method to get the paperID
     *
     * @return bool/mixed
     *
     * @since version 3.8.0
     */

    public function getLinkid()
    {
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (empty($linkid)) {
            $linkid = $data['linkid'];
        }
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'));
        } else {
            return $linkid;
        }
    }

    /**
     * Method to get the mode
     *
     * @return bool/mixed
     *
     * @since version 3.8.0
     */

    public function getMode($mode='')
    {
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        if (empty($mode)) {
            $mode = $data['mode'];
        }

            return $mode;
    }


    /**
     * @param null $id
     *
     * @return bool|null|object
     *
     * @since version 3.8.0
     * TODO remove depriciated $table->getError();
     */

    public function &getData($id = null)
    {
        $app = JFactory::getApplication('com_confmgt');

        if ($this->_item === null) {
            $this->_item = false;
            if (empty($id)) {
                $id = $this->getState('fullpaper.id');
            }
            // Get a level row instance.
            $table = $this->getTable();
            // Attempt to load the row.
            if ($table->load($id)) {
                $linkid = $this->getLinkid();
                $canEdit = AclHelper::isAuthor($linkid);
                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 500);
                }
                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
            } elseif ($error = $table->getError()) {
                $app->enqueueMessage($error, 'error');
            }
        }
        return $this->_item;
    }

    public function getTable($type = 'Fullpaper', $prefix = 'ConfmgtTable', $config = array())
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param    integer        The id of the row to check out.
     * @return   boolean        True on success, false on failure.
     * @since    1.6
     */
    public function checkin($id = null)
    {
        $app = JFactory::getApplication('com_confmgt');

        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('fullpaper.id');
        if ($id) {
            // Initialise the table
            $table = $this->getTable();
            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    $app->enqueueMessage($table->getError());
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
        $app = JFactory::getApplication('com_confmgt');

        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('fullpaper.id');
        if ($id) {
            // Initialise the table
            $table = $this->getTable();
            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    $app->enqueueMessage($table->getError());
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Method to get the full paper form
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
        $form = $this->loadForm('com_confmgt.fullpaper', 'fullpaperform', array(
            'control' => 'jform',
            'load_data' => $loadData
        ));
        if (empty($form)) {
            throw new Exception('Could not load the form',500);
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
        $data = JFactory::getApplication()->getUserState('com_confmgt.edit.fullpaper.data', array());
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
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('fullpaper.id');
        $linkid = (!empty($data['linkid'])) ? $data['linkid'] : (int)$this->getLinkid();
        $state = (!empty($data['state'])) ? 1 : 0;
        $user = JFactory::getUser();
        $data['created_by'] = $user->id;

        $app = JFactory::getApplication();
        $authorised = aclHelper::isAuthor($linkid);
        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
        }
        if ($linkid > 0) {
            $data['linkid'] = $linkid;
        } else {
            throw new Exception(JText::_('JERROR_NOPAPERID'), 500);
        }
        $table = $this->getTable();
        if ($table->save($data) === true) {
            //if the full papers table is updated, then update the papers table with the file name and the full paper ID. 
            //$table now returns the last saved details
            $papertable = $this->getTable('paper', 'ConfmgtTable');
            $paperdata = array();
            $paperdata['id'] = $linkid;
            $paperdata['full_paper'] = $table->full_paper;
            $paperdata['fullpaperid'] = $table->id;

            if (!$papertable->save($paperdata) === true) {
                $app->enqueueMessage($papertable->getError());
                return false;
            }
            return $table->id;
        } else {
            return false;
        }
    }


    /**
     * Method to save the full paper resubmit form data.
     *
     * @param    array        The form data.
     * @return    mixed        The user id on success, false on failure.
     * @since    1.6
     */
    public function save_resubmit($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('fullresubmit.id');
        $linkid = (!empty($data['linkid'])) ? $data['linkid'] : (int)$this->getLinkid();
        $user = JFactory::getUser();
        //set the creator
        $data['created_by'] = $user->id;
        //the resubmission must be a new entry in the full papers table
        $data['id'] = 0;

        //check the authorisation
        $app = JFactory::getApplication();
        $authorised = aclHelper::isAuthor($linkid);
        if ($authorised !== true) {
            JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
            return false;
        } //$authorised !== true

        $table = $this->getTable();
        if (!$table->save($data) === true) {

            //something wrong saving the full papers table
            return false;
        }

        //if the full papers table is updated, then update the papers table with the file name and the full paper ID.
        //$table now returns the last saved details
        $papertable = $this->getTable('Paper', 'ConfmgtTable');
        $paperdata = array();
        $paperdata['id'] = $linkid;
        $paperdata['full_paper'] = $table->full_paper;
        $paperdata['fullpaperid'] = $table->id;

        // paper table save successful?
        if (!$papertable->save($paperdata) === true) {
            return false;
        } //!$papertable->save( $paperdata ) === true
        return $table->id;
    }

    function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('fullpaper.id');

        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } //$table->delete( $data[ 'id' ] ) === true
        else {
            return false;
        }
        return true;
    }
}