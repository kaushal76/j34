<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Controller class for review form
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewForm extends ConfmgtController
{
	/**
	 * Method to check out an item for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app = JFactory::getApplication();

		$previousId = (int) $app->getUserState('com_confmgt.edit.rev1ew.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');
		$app->setUserState('com_confmgt.edit.rev1ew.id', $editId);

		$model = $this->getModel('Rev1ewForm', 'ConfmgtModel');

		if ($editId) {
            $model->checkout($editId);
		}

		if ($previousId) {
            $model->checkin($previousId);
		}
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewform&layout=edit', false));
	}

	/**
	 * Method to save data.
	 *
	 * @return	void
	 * @since	1.6
	 */
	private function save_common($url_success, $url_fail)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app	= JFactory::getApplication();
		$model = $this->getModel('Rev1ewForm', 'ConfmgtModel');

		$data = JFactory::getApplication()->input->get('jform', array(), 'array'); 

		$form = $model->getForm();
		if (!$form) {
			throw new Exception($model->getError(),500);
		}

		$data = $model->validate($form, $data);

		if ($data === false) {
			$errors	= $model->getErrors();

			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			$app->setUserState('com_confmgt.edit.rev1ew.data', JFactory::getApplication()->input->get('jform', array(), 'array'),array());
			$id = (int) $app->getUserState('com_confmgt.edit.rev1ew.id');
			$this->setRedirect($url_fail, false);
			return false;
		}

		$return	= $model->save($data);

		// Check for errors.
		if ($return === false) {

			$app->setUserState('com_confmgt.edit.rev1ew.data', $data);
			$id = (int)$app->getUserState('com_confmgt.edit.rev1ew.id');
			$this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
			
			$this->setRedirect(JRoute::_($url_fail.$id, false));
			return false;
		}

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.rev1ew.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
		$this->setRedirect(JRoute::_($url_success, false));
		$app->setUserState('com_confmgt.edit.rev1ew.data', null);
	}
    
	public function save() {
		$url_success = 'index.php?option=com_confmgt&view=rev1ews';
		$url_fail = 'index.php?option=com_confmgt&view=rev1ewform&layout=edit&id=';
		
		$this->save_common($url_success, $url_fail);
	}
	
	public function update_save() {
		$url_success = 'index.php?option=com_confmgt&view=rev1ews&layout=update';
		$url_fail = 'index.php?option=com_confmgt&view=rev1ewform&layout=update_form&id=';
		$this->save_common($url_success, $url_fail);
	}
    
    function cancel() {
	    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ews', false));
    }
	
	function update_cancel() {
	    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ews&layout=update', false));
    }
    
    
	public function remove()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app	= JFactory::getApplication();
		$model = $this->getModel('Rev1ewForm', 'ConfmgtModel');

		$data = JFactory::getApplication()->input->get('jform', array(), 'array');
		$form = $model->getForm();
		if (!$form) {
			JFactory::$application->enqueueMessage($model->getError(),500);
			return false;
		}

		$data = $model->validate($form, $data);
		if ($data === false) {
			$errors	= $model->getErrors();
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			$app->setUserState('com_confmgt.edit.rev1ew.data', $data);

			$id = (int) $app->getUserState('com_confmgt.edit.rev1ew.id');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewform&layout=edit&id='.$id, false));
			return false;
		}
		$return	= $model->delete($data);
		if ($return === false) {
			$app->setUserState('com_confmgt.edit.rev1ew.data', $data);
			$id = (int)$app->getUserState('com_confmgt.edit.rev1ew.id');
			$this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewform&layout=edit&id='.$id, false));
			return false;
		}

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.rev1ew.id', null);
        $linkid = $model->getLinkid();
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ews&linkid='.$linkid, false));
		$app->setUserState('com_confmgt.edit.rev1ew.data', null);
	}
}