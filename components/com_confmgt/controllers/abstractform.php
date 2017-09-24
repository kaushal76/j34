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
 * Controller class for Abstracts
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerAbstractForm extends ConfmgtController
{
	/**
	 * Method to check out an item for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app = JFactory::getApplication();

		$previousId = (int) $app->getUserState('com_confmgt.edit.abstract.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');

		$app->setUserState('com_confmgt.edit.abstract.id', $editId);

		$model = $this->getModel('AbstractForm', 'ConfmgtModel');

		if ($editId) {
            $model->checkout($editId);
		}

		if ($previousId) {
            $model->checkin($previousId);
		}

		// Redirect to the edit screen.
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=abstractform&layout=edit', false));
	}

	/**
	 * Method to save abstract data.
	 *
	 * @return	mixed
	 * @since	1.6
     * TODO remove getError() deprecited method
	 */
	private function save_common($url_success, $url_fail)
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$app	= JFactory::getApplication();
		$model = $this->getModel('AbstractForm', 'ConfmgtModel');

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

			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.abstract.data', JFactory::getApplication()->input->get('jform', array(), 'array'));

			// Redirect back to the edit screen.
			$id = (int) $app->getUserState('com_confmgt.edit.abstract.id');
			$this->setRedirect($url_fail, false);
			return false;
		}

		$return	= $model->save($data);

		// Check for errors.
		if ($return === false) {
			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.abstract.data', $data);

			// Redirect back to the edit screen.
			$id = (int)$app->getUserState('com_confmgt.edit.abstract.id');
            $app->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
			
			$this->setRedirect(JRoute::_($url_fail.$id, false));
			
			return false;
		}

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.abstract.id', null);
		$app->setUserState('com_confmgt.edit.abstract.data', null);


        $app->enqueueMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_($url_success, false));

		// Flush the data from the session.
		$app->setUserState('com_confmgt.edit.abstract.data', null);
	}

    /**
     * Method to save abstract data
     *
     * @since version 3.8.0
     */
	public function save() {

		$model = $this->getModel('AbstractForm', 'ConfmgtModel');
		$linkid = $model->getLinkid();
		$url_success = 'index.php?option=com_confmgt&view=paper&id='.$linkid.'&linkid='.$linkid;
		$url_fail = 'index.php?option=com_confmgt&view=abstractform&layout=edit&linkid='.$linkid;
		
		$this->save_common($url_success, $url_fail);
	}


    /**
     * Method to cancel save
     *
     * @since version 3.8.0
     */
	function cancel() {

        $app	= JFactory::getApplication();
        $app->setUserState('com_confmgt.edit.abstract.id', null);
		$app->setUserState('com_confmgt.edit.abstract.data', null);
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
    }
    
}