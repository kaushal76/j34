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
 * Model class for camera ready paper form
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelCameraReadyPaperForm extends JModelForm
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
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.camerareadypaper.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.camerareadypaper.id', $id);
        }
        $this->setState('camerareadypaper.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('camerareadypaper.id', $params_array['item_id']);
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
     * Method to get the Type
     *
     * @return bool/mixed
     *
     * @since version 3.8.0
     */

    public function getType($type='')
    {
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        if (empty($type)) {
            $type = $data['type'];
        }
        return $type;
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
                $id = $this->getState('camerareadypaper.id');
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

    public function getTable($type = 'CameraReady', $prefix = 'ConfmgtTable', $config = array())
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
        $id = (!empty($id)) ? $id : (int)$this->getState('camerareadypaper.id');
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
        $id = (!empty($id)) ? $id : (int)$this->getState('camerareadypaper.id');
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
        $form = $this->loadForm('com_confmgt.camerareadypaper', 'camerareadypaperform', array(
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
        $data = JFactory::getApplication()->getUserState('com_confmgt.edit.camerareadypaper.data', array());
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
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('camerareadypaper.id');
        $linkid = (!empty($data['linkid'])) ? $data['linkid'] : (int)$this->getLinkid();
        $state = (!empty($data['state'])) ? 1 : 0;
        $user = JFactory::getUser();
        $data['created_by'] = $user->id;

        $app = JFactory::getApplication();
        $authorised = AclHelper::isAuthor($linkid);
        if (!$authorised) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 403);
        }
        if ($linkid > 0) {
            $data['linkid'] = $linkid;
        } else {
            throw new Exception(JText::_('JERROR_NOPAPERID'), 500);
        }
        $table = $this->getTable();
        if ($table->save($data) === true) {
            //if the camera_ready papers table is updated, then update the papers table with the file name and the full paper ID.
            //$table now returns the last saved details
            $papertable = $this->getTable('paper', 'ConfmgtTable');
            $paperdata = array();
            $paperdata['id'] = $linkid;
            $paperdata['camera_ready'] = $table->camera_ready;
            $paperdata['cameraready_id'] = $table->id;

            if (!$papertable->save($paperdata) === true) {
                $app->enqueueMessage($papertable->getError());
                return false;
            }
            return $table->id;
        } else {
            return false;
        }
    }


    function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('camerareadypaper.id');

        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        }
        else {
            return false;
        }
    }
}