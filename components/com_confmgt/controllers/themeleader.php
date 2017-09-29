<?php

/**
 * @version     3.8.0com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT . '/controller.php';

/**
 * Controller class for theme leader
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerThemeleader extends ConfmgtController {

    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since	1.6
     */
    public function edit() {
        $app = JFactory::getApplication();
        $previousId = (int) $app->getUserState('com_confmgt.edit.themeleader.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');

        $app->setUserState('com_confmgt.edit.themeleader.id', $editId);

        $model = $this->getModel('Themeleader', 'ConfmgtModel');

        if ($editId) {
            $model->checkout($editId);
        }
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleaderform&layout=edit', false));
    }

    /**
     * Method to publish a theme leader.
     *
     * @return	void
     * @since	1.6
     */
    public function publish() {

        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $app = JFactory::getApplication();
        $model = $this->getModel('Themeleader', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $return = $model->publish($data['id'], $data['state']);

        if ($return === false) {
            JFactory::$application->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
            $app->setUserState('com_confmgt.edit.themeleader.id', $data['id']);
            $app->setUserState('com_confmgt.edit.themeleader.data', $data);

            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeleader&id='.$data['id'], false));

        } else {
            $model->checkin($return);
            $app->setUserState('com_confmgt.edit.themeleader.id', null);
            $app->setUserState('com_confmgt.edit.themeleader.data', null);
            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));

            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
        }

    }

    /**
     * Method to remove a theme leader
     *
     * @since version 3.8.0
     */
    public function remove() {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $app = JFactory::getApplication();
        $model = $this->getModel('Themeleader', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $return = $model->delete($data['id']);

        if ($return === false) {
            JFactory::$application->enqueueMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
        } else {
            $model->checkin($return);
            $app->setUserState('com_confmgt.edit.themeleader.id', null);
            $app->setUserState('com_confmgt.edit.themeleader.data', null);
            
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
    }

}
