<?php
/**
 * @version     2.5.7
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Author controller class.
 */
class ConfmgtControllerRev1ewersforPaperForm extends ConfmgtController
{

	/**
	 * Method to check out an item for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app = JFactory::getApplication();

		// Get the previous edit id (if any) and the current edit id.
		$previousId = (int) $app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');

		// Set the user id for the user to edit in the session.
		$app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', $editId);

		// Get the model.
		$model = $this->getModel('Rev1ewersforPaperForm', 'ConfmgtModel');

		// Check out the item
		if ($editId) {
            $model->checkout($editId);
		}

		// Check in the previous user.
		if ($previousId) {
            $model->checkin($previousId);
		}

		// Redirect to the edit screen.
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewersforpaper&layout=edit', false));
	}

	/**
	 * Method to save a user's profile data.
	 *
	 * @return	void
	 * @since	1.6
	 */
	private function save_common($url_success, $url_fail)
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$app	= JFactory::getApplication();
		$model = $this->getModel('rev1ewersforpaperForm', 'ConfmgtModel');
		

		// Get the user data.
		$data = JFactory::getApplication()->input->get('jform', array(), 'array'); 
	
		$linkid = $model->getLinkid();

		// Get the form.
		$form = $model->getForm();
		if (!$form) {
			JError::raiseError(500, $model->getError());
			return false;
		}
		
				// Validate the posted data.
				$data = $model->validate($form, $data);
	
				// Check for errors.
				if ($data === false) {
					// Get the validation messages.
					$errors	= $model->getErrors();
		
					// Push up to three validation messages out to the user.
					for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
						if ($errors[$i] instanceof Exception) {
							$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
						} else {
							$app->enqueueMessage($errors[$i], 'warning');
						}
					}
		
					// Save the data in the session.
					$app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', JRequest::getVar('jform'),array());
		
					// Redirect back to the edit screen.
					$id = (int) $app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
					$this->setRedirect($url_fail, false);
					return false;
				}
				
				$data['paperid'] = $linkid;
				$data['reviewerid'] = $data['rev1ewer'];
				
	
		// Attempt to save the data.
		$return	= $model->save($data);

		// Check for errors.
		if ($return === false) {
			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', $data);

			// Redirect back to the edit screen.
			$id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
			$this->setMessage(JText::sprintf('Save failed', $model->getError()), 'Error');
			
			$this->setRedirect(JRoute::_($url_fail.$id, false));
			return false;
		}

            
        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }
        
		
        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', null);

 
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
		$this->setRedirect(JRoute::_($url_success, false));
        //$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors', false)); 

		// Flush the data from the session.
		$app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', null);

	}
    
	public function save() {
		$url_success = 'index.php?option=com_confmgt&view=rev1ewersforpaperform';
		$url_fail = 'index.php?option=com_confmgt&view=rev1ewersforpaperform&layout=edit&id=';
		
		$this->save_common($url_success, $url_fail);
	}
	
	public function update_save() {
		$url_success = 'index.php?option=com_confmgt&view=rev1ewersforpaperform';
		$url_fail = 'index.php?option=com_confmgt&view=rev1ewersforpaperform&id=';
		
		$this->save_common($url_success, $url_fail);
	}
    
    function cancel() {
		
	    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers&layout=leader_default', false));
    }
	
	function update_cancel() {
		
	    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=leader_default', false));
    }
    
    
	public function remove()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$app	= JFactory::getApplication();
		$model = $this->getModel('Rev1ewersforPaperForm', 'ConfmgtModel');
		$linkid = $model->getLinkid();

		// Get the user data.
		$data = JFactory::getApplication()->input->get('jform', array(), 'array');

		$return	= $model->delete($data);

		// Check for errors.
		if ($return === false) {
			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', $data);

			// Redirect back to the edit screen.
			$id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
			$this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewersforpaperForm&layout=edit&id='.$id, false));
			return false;
		}

            
        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }
        
        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', null);

        // Redirect to the list screen.
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
		$link = "index.php?option=com_confmgt&view=rev1ewersforpaperForm&layout=edit&id='".$linkid;
        $this->setRedirect(JRoute::_($link, false));

		// Flush the data from the session.
		$app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', null);
	}
    
    
}