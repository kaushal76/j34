<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */

// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT . '/controller.php';

/**
 *
 * Controller class for review outcome form
 *
 * @package CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewoutcomeForm extends ConfmgtController
{

    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since    1.6
     */
    public function edit()
    {
        $app = JFactory::getApplication();
        $previousId = (int)$app->getUserState('com_confmgt.edit.paper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $app->setUserState('com_confmgt.edit.paper.id', $editId);

        $model = $this->getModel('Rev1ewoutcomeForm', 'ConfmgtModel');

        if ($editId) {
            $model->checkout($editId);
        }

        if ($previousId) {
            $model->checkin($previousId);
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paper&layout=edit', false));
    }

    /**
     * Method to save data.
     *
     * @return    void
     * @since    1.6
     */
    public function save()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewoutcomeForm', 'ConfmgtModel');
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Validate the posted data.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
        }
        $data = $model->validate($form, $data);

        if ($data === false) {
            $errors = $model->getErrors();

            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }

            $app->setUserState('com_confmgt.edit.paper.data', JFactory::getApplication()->input->get('jform', array(), 'array'));
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewoutcomeform&layout=edit&id=' . $id, false));
            return false;
        }

        $return = $model->save($data);

        if ($return === false) {
            $app->setUserState('com_confmgt.edit.paper.data', $data);
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewoutcomeform&layout=edit&id=' . $id, false));
            return false;
        }

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.paper.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paper&id=' . $return . '&linkid=' . $return, false));

        $app->setUserState('com_confmgt.edit.paper.data', null);
        $app->setUserState('com_confmgt.new.abstract.id', null);
    }

    /**
     * Function to cancel
     *
     * @since version 3.8.0
     */

    function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
    }

    /**
     * Function to remove a review outcome
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function remove()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewoutcomeForm', 'ConfmgtModel');
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
        }
        $data = $model->validate($form, $data);

        if ($data === false) {
            $errors = $model->getErrors();

            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }

            $app->setUserState('com_confmgt.edit.paper.data', $data);
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paper&layout=edit&id=' . $id, false));
            return false;
        }

        $return = $model->delete($data);
        if ($return === false) {
            $app->setUserState('com_confmgt.edit.paper.data', $data);
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paper&layout=edit&id=' . $id, false));
            return false;
        }

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.paper.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));;
        $app->setUserState('com_confmgt.edit.paper.data', null);
    }


}