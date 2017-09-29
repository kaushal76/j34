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
 * Controller class for Theme Leader Form
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */

class ConfmgtControllerThemeleaderForm extends ConfmgtController
{

	/**
	 * Method to check out an item for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app = JFactory::getApplication();

		$previousId = (int) $app->getUserState('com_confmgt.edit.themeleader.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');
		$app->setUserState('com_confmgt.edit.themeleader.id', $editId);

		$model = $this->getModel('ThemeleaderForm', 'ConfmgtModel');

		if ($editId) {
            $model->checkout($editId);
		}

		if ($previousId) {
            $model->checkin($previousId);
		}
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleaderform&layout=edit', false));
	}

	/**
	 * Method to save data.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function save()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app	= JFactory::getApplication();
		$model = $this->getModel('ThemeleaderForm', 'ConfmgtModel');

		$data = JFactory::getApplication()->input->get('jform', array(), 'array');

		$form = $model->getForm();
		if (!$form) {
			throw new Exception($model->getError(),500);
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

			$app->setUserState('com_confmgt.edit.themeleader.data', JRequest::getVar('jform'),array());

			$id = (int) $app->getUserState('com_confmgt.edit.themeleader.id');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleaderform&layout=edit&id='.$id, false));
			return false;
		}

		$return	= $model->save($data);

		if ($return === false) {
			$app->setUserState('com_confmgt.edit.themeleader.data', $data);

			$id = (int)$app->getUserState('com_confmgt.edit.themeleader.id');
			$this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleaderform&layout=edit&id='.$id, false));
			return false;
		}

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.themeleader.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
		$app->setUserState('com_confmgt.edit.themeleader.data', null);
	}


    /**
     *
     * Method to cancel an edit
     * @since version 3.8.0
     */
	function cancel() {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
    }

    /**
     * Method to remove a theme leader
     * @return bool
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function remove()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$app	= JFactory::getApplication();
		$model = $this->getModel('ThemeleaderForm', 'ConfmgtModel');
		$data = JFactory::getApplication()->input->get('jform', array(), 'array');

		// Validate the posted data.
		$form = $model->getForm();
		if (!$form) {
			throw new Exception($model->getError(),500);
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

			$app->setUserState('com_confmgt.edit.themeleader.data', $data);

			$id = (int) $app->getUserState('com_confmgt.edit.themeleader.id');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleader&layout=edit&id='.$id, false));
			return false;
		}

		$return	= $model->delete($data);
		if ($return === false) {
			$app->setUserState('com_confmgt.edit.themeleader.data', $data);
			$id = (int)$app->getUserState('com_confmgt.edit.themeleader.id');
			$this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleader&layout=edit&id='.$id, false));
			return false;
		}

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.themeleader.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleaders', false));

		$app->setUserState('com_confmgt.edit.themeleader.data', null);
	}
    
    
}