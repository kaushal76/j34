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
 * Model class for Abstract form
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelAbstractForm extends JModelForm
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

        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.abstract.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.abstract.id', $id);
        }
		$this->setState('abstract.id', $id);

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
	public function &getData($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('abstract.id');
			}

			// Get a level row instance.
			$table = $this->getTable();

			// Attempt to load the row.
			if ($table->load($id))
			{

                $id = $table->id;

                $canEdit = AclHelper::isAuthor($this->getLinkid());

                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),403);
                }

				$properties = $table->getProperties(1);
				$this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
			} elseif ($error = $table->getError()) {
				JFactory::getApplication()->enqueueMessage($error,'error');
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
	public function getTable($type = 'Abstract', $prefix = 'ConfmgtTable', $config = array())
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
		$id = (!empty($id)) ? $id : (int)$this->getState('abstract.id');

		if ($id) {

			$table = $this->getTable();

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
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
	 */
	public function checkout($id = null)
	{
		$id = (!empty($id)) ? $id : (int)$this->getState('abstract.id');

		if ($id) {

			$table = $this->getTable();

			$user = JFactory::getUser();

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
	 * Method to get the profile form.
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
		$form = $this->loadForm('com_confmgt.abstract', 'abstractform', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			throw new Exception(JText::_('Cannot load the form'),500);
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
		$data = JFactory::getApplication()->getUserState('com_confmgt.edit.abstract.data', array());
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
	
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('abstract.id');
        $linkid = $this->getLinkid();
		
		if (empty($data['id'])) {
			
			$user = JFactory::getUser();
				
			$data['linkid'] = $linkid;
			$data['created_by'] = $user->id;
			
			// this model is used only in case of an abstract resubmission. Hence setting the flag in the abstract table 
			$data['mode'] = 'resubmit';
		
		}

		$authorised = AclHelper::isAuthor($linkid);

        if (!$authorised) {
            throw new Exception(JText::_('Not Authorised'),403);
        }
        
        $table = $this->getTable();
		$paper_table = $this->getTable('Paper', 'ConfmgtTable');
		
        if (!$table->save($data) === true) {
            JFactory::getApplication()->enqueueMessage(JText::_('Abstract details could not be updated'),'error');
            return false;
        } 

		$paper_data['id'] = $linkid;
		$paper_data['abstract_id'] = $table->id;
		
		if (!$return = $paper_table->save($paper_data) === true) {
            JFactory::getApplication()->enqueueMessage(JText::_('Paper details could not be updated'),'error');
		    return false;
        }
		return $return;
	}

    /**
     * Function to delete a record
     * @param $data
     *
     * @return bool|int
     *
     * @since version 3.8.0
     */
	function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('abstract.id');

        $authorised = AclHelper::isAuthor($this->getLinkid());

        if (!$authorised) {
            throw new Exception('You are not authorised to view this resouce',403);
        }
        
        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } else {
            return false;
        }
    }
    
}