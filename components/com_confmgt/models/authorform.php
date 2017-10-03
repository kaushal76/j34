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
 * Model class for the Author Form
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelAuthorForm extends JModelForm
{
    
    var $_item = null;
    
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('com_confmgt');

		// Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.author.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.author.id', $id);
        }
		$this->setState('author.id', $id);

		// Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if(isset($params_array['item_id'])){
            $this->setState('author.id', $params_array['item_id']);
        }
		$this->setState('params', $params);

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
	 * Method to get data.
	 *
	 * @param	integer	The id of the object to get.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function &getData($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('author.id');
			}

			$table = $this->getTable();

			if ($table->load($id))
			{
                $canEdit = AclHelper::isAuthor($this->getLinkid());
                if (!$canEdit) {
                    throw new Exception( JText::_('JERROR_ALERTNOAUTHOR'),500);
                }
				if ($published = $this->getState('filter.published'))
				{
					if ($table->state != $published) {
						return $this->_item;
					}
				}

				$properties = $table->getProperties(1);
				$this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
			} elseif ($error = $table->getError()) {
				JFactory::$application->enqueueMessage($error,'error');
			}
		}

		return $this->_item;
	}

    /**
     * Method to get a table object
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     *
     * @since version 3.8.0
     */
	public function getTable($type = 'Author', $prefix = 'ConfmgtTable', $config = array())
	{   
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR.'/tables');
        return JTable::getInstance($type, $prefix, $config);
	}     

    
	/**
	 * Method to check in an item.
	 *
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkin($id = null)
	{
		// Get the id.
		$id = (!empty($id)) ? $id : (int)$this->getState('author.id');

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
	public function checkout($id = null)
	{
		// Get the user id.
		$id = (!empty($id)) ? $id : (int)$this->getState('author.id');

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
	 * Method to get the author form.
	 *
	 * The base form is loaded from XML 
     * 
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_confmgt.author', 'authorform', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_confmgt.edit.author.data', array());
        if (empty($data)) {
            $data = $this->getData();
        }
        return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param	array		The form data.
	 * @return	mixed		The user id on success, false on failure.
	 * @since	1.6
	 */
	public function save($data)
	{
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('author.id');
        $linkid = $this->getLinkid();
        $authorised = AclHelper::isAuthor($linkid);
        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),403);
            return false;
        }
		
		if (empty($data['id'])) {
			
			$user = JFactory::getUser();
				
			$data['linkid'] = $linkid;
			$data['created_by'] = $user->id;

		}
        
        $table = $this->getTable();
        if ($table->save($data) === true) {
            return $id;
        } else {
            return false;
        }
	}

    /**
     * Method to delete
     *
     * @param $data
     *
     * @return bool|int
     *
     * @since version 3.8.0
     */
	function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('author.id');
	    $linkid = MainHelper::getLinkid();
        $authorised = AclHelper::isAuthor($linkid);
        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),403);
            return false;
        }
        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } else {
            return false;
        }
        return true;
    }
    
}