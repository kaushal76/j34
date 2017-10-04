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
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtModelRev1ewForm extends JModelForm
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
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.rev1ew.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.rev1ew.id', $id);
        }
		$this->setState('rev1ew.id', $id);

		// Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if(isset($params_array['item_id'])){
            $this->setState('rev1ew.id', $params_array['item_id']);
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
            throw new Exception(JText::_('JERROR_NO_PAPERID'),404);
        } else {
            return $linkid;
        }
    }
	
	public function getPaper($id = null)
	{
			$this->_paperItem = false;
		
			if (empty($id)) {
					$id = $this->getLinkid();
			}
			
			$table = $this->getTable('Paper', 'ConfmgtTable');
			if ($table->load($id))
			{
				$id = $table->id;

				$canEdit = AclHelper::isAuthor($id);
	
				if (!$canEdit) {
					throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),500);
				}

				$properties = $table->getProperties(1);
				$this->_paperItem = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
				$this->_paperItem->full_paper_download = $this->_FullPaperDownloadBtn($this->_paperItem->full_paper);
			} elseif ($error = $table->getError()) {
				JFactory::$application->enqueueMessage($error);
			}
		return $this->_paperItem;
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
				$id = $this->getState('rev1ew.id');
			}

			// Get a level row instance.
			$table = $this->getTable();

			// Attempt to load the row.
			if ($table->load($id))
			{
                $id = $table->id;
                $canEdit = AclHelper::isThemeleader();

                if (!$canEdit) {
                    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),500);
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
				JFactory::$application->enqueueMessage($error);
			}
		}

		return $this->_item;
	}

    /**
     * Method to get a Table object
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     *
     * @since version 3.8.0
     */
	public function getTable($type = 'Rev1ew', $prefix = 'ConfmgtTable', $config = array())
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
		$id = (!empty($id)) ? $id : (int)$this->getState('rev1ew.id');

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
		$id = (!empty($id)) ? $id : (int)$this->getState('rev1ew.id');

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
		$form = $this->loadForm('com_confmgt.rev1ew', 'rev1ewform', array('control' => 'jform', 'load_data' => $loadData));
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
		$data = JFactory::getApplication()->getUserState('com_confmgt.edit.rev1ew.data', array());
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
	
		$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('rev1ew.id');
		
		if (empty($data['id'])) {
			
			$user = JFactory::getUser();
			$app = JFactory::getApplication();
			$data['created_by'] = $user->id;
		
		}
        $state = (!empty($data['state'])) ? 1 : 0;
		
		$authorised = AclHelper::isThemeleader();

        if (!$authorised) {
            throw new Exception('Not Authorised',403);
        }
		
        $table = $this->getTable();
		$paper_table = $this->getTable('Paper', 'ConfmgtTable');
        $abstract_table = $this->getTable('Abstract', 'ConfmgtTable');
        $fullpaper_table = $this->getTable('FullPaper', 'ConfmgtTable');

        if (!$paper_table->load($data['linkid'])) {
            JFactory::$application->enqueueMessage('Could not load the paper', 'error');
            return false;
        }


        if ($data['mode'] == 'abstract') {
            if (!$abstract_table->load($data['abstract_id'])) {
                JFactory::$application->enqueueMessage('Could not load the paper', 'error');
                return false;
            }

            $data['abstract_id'] = $paper_table->abstract_id;
            $data['fullpaper_id'] = 0;
        }

        if ($data['mode'] == 'full') {
            if (!$fullpaper_table->load($data['fullpaper_id'])) {
                JFactory::$application->enqueueMessage('Could not load the paper','error');
                return false;
            }

            $data['abstract_id'] = 0;
            $data['fullpaper_id'] = $paper_table->fullpaper_id;

        }
		
        if ($table->save($data) === true) {
            JFactory::$application->enqueueMessage('Review saved and submitted');
            return $id;
        } else {
            JFactory::$application->enqueueMessage('Error saving the review','error');
            return false;
        }
        
	}

    /**
     * Method to delete a review
     *
     * @param $data
     *
     * @return bool|int
     *
     * @since version 3.8.0
     */

	public function delete($data)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('rev1ew.id');

        $authrosied = AclHelper::isThemeleader();

        if (!$authrosied) {
            throw new Exception('Not authorised',403);
        }

        $table = $this->getTable();
        if ($table->delete($data['id']) === true) {
            return $id;
        } else {
            return false;
        }
    }

    /**
     * Generate the download Btn
     *
     * @param $filename
     *
     * @return string
     *
     * @since version 3.8.0
     */
	private function _FullPaperDownloadBtn ($filename)
	{ 
		$html =  "<div style=\"display:inline\">";
		$html = $html. "<form id=\"form-download\"";
		$html = $html." action=\"".JRoute::_('index.php')."\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
		$html = $html.JHtml::_('form.token');
  		$html = $html."<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
  		$html = $html."<input type=\"hidden\" name=\"task\" value=\"paper.downloadfullpaper\" />";
		$html = $html."<input type=\"hidden\" name=\"filename\" value=\"".$filename."\" />";
  		$html = $html."<button class=\"btn btn-default\" type=\"submit\">";
		$html =	$html.JText::_("Download");
		$html = $html."</button></form></div>";
		return $html;
		
	}
    
}