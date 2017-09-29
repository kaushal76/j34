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
 * Abstract Review Outcome model
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelAbrev1ewoutcomeForm extends JModelForm
{
    
    var $_item = null;
	var $_paper_item = null;

	/**
	 *
	 * Method to get State
	 * @since version 3.8.0
	 */

	protected function populateState()
	{
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.paper.id');
        } else {
            $id = JFactory::getApplication()->input->get('linkid');
            JFactory::getApplication()->setUserState('com_confmgt.edit.paper.id', $id);
        }
		$this->setState('paper.id', $id);

	}

	/**
	 * Method to get the paperID
	 * @return bool/mixed
	 * @since version 3.8.0
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
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('paper.id');
			}

			// Get a level row instance.
			$table = $this->getTable();
			$table_abstract = $this->getTable('Abstract');

			// Attempt to load the row.
			if ($table->load($id))
			{
				$table_abstract->load($table->abstract_id);
				$canEdit = AclHelper::isThemeleader(0,$table->id);
            
                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),403);
                }

				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
                $properties['abstract'] = $table_abstract->abstract;
				$properties['abstract_review_outcome'] = $table_abstract->abstract_review_outcome;
				$properties['abstract_review_comments'] = $table_abstract->abstract_review_comments;
				$this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
			} elseif ($error = $table->getError()) {
				JFactory::getApplication()->enqueueMessage($error,'error');
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
		}else{
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
		}else{
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
		$linkid = $this->getLinkid();
		$rows = MainHelper::getAuthors((int)$linkid);
		if ($rows) {
			return $rows;
		}else{
			return false;
		}
	
	}

	/**
	 * Function to return the table object
	 * @param string $type
	 * @param string $prefix
	 * @param array $config
	 *
	 * @return bool|JTable
	 *
	 * @since version 3.8.0
	 */
	public function getTable($type = 'Paper', $prefix = 'ConfmgtTable', $config = array())
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
	 * @param	integer		The id of the row to check out.
	 * @return	boolean		True on success, false on failure.
	 * @since	1.6
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
	 * Method to get the  form.
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
		$form = $this->loadForm('com_confmgt.paper', 'abrev1ewoutcomeform', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			throw new Exception('Cound not load form',500);
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
		$data = JFactory::getApplication()->getUserState('com_confmgt.edit.paper.data', array());
        if (empty($data)) {
            $data = $this->getData();
        }
        return $data;
	}

	/**
	 * Method to save the form data.
	 *
	 * @param	array		Form data.
	 * @return	mixed		The user id on success, false on failure.
	 * @since	1.6
	 */
	public function save($data)
	{
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('paper.id');
		$abstract_table = $this->getTable('Abstract', 'ConfmgtTable');
        $table = $this->getTable();

			// Loading the newly updated paper details.
			// If not, the $table object only contains the data passed on in the $data array.
			if(!$table->load($id)) {
				JFactory::getApplication()->enqueueMessage('Could not load the paper data','error');
				return false;
			}
			
			//preparing abstract table data
			$abstract_data = $data;
			$abstract_data['id'] = $table->abstract_id;
			
			//save to the abstract table
			if (!$abstract_table->save($abstract_data) === true) {
				JFactory::getApplication()->enqueueMessage('Could not save the review data','error');
				return false;
			}
			
			// all fine, returning the paper ID 
            return $table->id;
        
	}

}