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
 * Controller class for theme
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerTheme extends ConfmgtController {

    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since	1.6
     */
    public function edit() {
        $app = JFactory::getApplication();

        $previousId = (int) $app->getUserState('com_confmgt.edit.theme.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $app->setUserState('com_confmgt.edit.theme.id', $editId);

        $model = $this->getModel('Theme', 'ConfmgtModel');

        if ($editId) {
            $model->checkout($editId);
        }
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themeform&layout=edit', false));
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
        $model = $this->getModel('Theme', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $return = $model->publish($data['id'], $data['state']);

        if ($return === false) {
            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
        } else {

            if ($return) {
                $model->checkin($return);
            }

            $app->setUserState('com_entrusters.edit.bid.id', null);
            $this->setMessage(JText::_('COM_ENTRUSTERS_ITEM_SAVED_SUCCESSFULLY'));
        }
        $app->setUserState('com_confmgt.edit.theme.id', null);
        $app->setUserState('com_confmgt.edit.theme.data', null);

        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
    }

    public function remove() {

        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $app = JFactory::getApplication();
        $model = $this->getModel('Theme', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $return = $model->delete($data['id']);

        if ($return === false) {
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');   
        } else {
            if ($return) {
                $model->checkin($return);
            }

            $app->setUserState('com_confmgt.edit.theme.id', null);
            $app->setUserState('com_confmgt.edit.theme.data', null);
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=themes', false));
    }

}
