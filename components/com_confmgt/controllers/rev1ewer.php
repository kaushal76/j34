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

require_once JPATH_COMPONENT . '/controller.php';

/**
 * Controller class for Reviewer
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewer extends ConfmgtController {

    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since	1.6
     */
    public function edit() {
        $app = JFactory::getApplication();

        $previousId = (int) $app->getUserState('com_confmgt.edit.rev1ewer.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');

        $app->setUserState('com_confmgt.edit.rev1ewer.id', $editId);

        $model = $this->getModel('Rev1ewer', 'ConfmgtModel');

        if ($editId) {
            $model->checkout($editId);
        }

        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit', false));
    }

    /**
     * Method to save data.
     *
     * @return	void
     * @since	1.6
     */
    public function publish() {

        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewer', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $return = $model->publish($data['id'], $data['state']);

        if ($return === false) {
            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
        } else {
            if ($return) {
                $model->checkin($return);
            }
        }


        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);

        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
    }

    /**
     * Method to remove a Reviewer
     *
     * @since version 3.8.0
     */
    public function remove() {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewer', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $return = $model->delete($data['id']);

        if ($return === false) {
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');   
        } else {
            if ($return) {
                $model->checkin($return);
            }
            $app->setUserState('com_confmgt.edit.rev1ewer.id', null);
            $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
            
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
    }
	
	
	/**
	 * Method to send the notification emails to reviewers (once the papers are allocated) 
	 * @Since 2.5.3
	 * @return void
	 */
	 
	public function notify() 
	{
		$app = JFactory::getApplication();
		

        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int) $app->getUserState('com_confmgt.notify.rev.id');
        $editId = JFactory::getApplication()->input->getInt('revid', null, 'array');

        $app->setUserState('com_confmgt.notify.rev.id', $editId);

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=notify_form', false));
	
	}
}
