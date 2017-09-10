/l<?php

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
 * Author controller class
 */
class ConfmgtControllerAuthor extends ConfmgtController
{

    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since    1.6
     */
    public function edit()
    {
        $app = JFactory::getApplication();

        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int)$app->getUserState('com_confmgt.edit.author.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');


        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.author.id', $editId);

        // Get the model.
        $model = $this->getModel('Author', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authorform&layout=edit&linkid=' . $linkId, false));
    }

    /**
     * Method to edit author details and redirect to the edit_update form.
     *
     * @since    1.6
     */
    public function edit_update()
    {
        $app = JFactory::getApplication();

        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int)$app->getUserState('com_confmgt.edit.author.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.author.id', $editId);

        // Get the model.
        $model = $this->getModel('Author', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authorform&layout=update_form&linkid=' . $linkId, false));
    }


    /**
     * Method to publish an author data.
     *
     * @return    void
     * @since    1.6
     * TODO update the model->getError() method to replace the depreciated method
     */
    public function publish()
    {

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Author', 'ConfmgtModel');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Attempt to save the data.
        $return = $model->publish($data['id'], $data['state']);

        // Check for errors.
        if ($return === false) {
            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
        } else {
            // Check in the profile.
            if ($return) {
                $model->checkin($return);
            }

            // Clear the profile id from the session.
            $app->setUserState('com_confmgt.edit.author.id', null);

            // Redirect to the list screen.
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));

            // Flush the data from the session.
            $app->setUserState('com_confmgt.edit.author.data', null);

        }
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors&linkid=' . $linkId, false));
    }

    /**
     * Function to remove an author
     *
     * @return void
     * @since version 3.8.0
     */
    public function remove()
    {
        $app = JFactory::getApplication();
        $model = $this->getModel('Author', 'ConfmgtModel');
        $linkId = $app->input->getInt('linkid', null, 'array');
        $id = $app->input->getInt('id', null, 'array');

        // Attempt to delete the row.
        $return = $model->delete($id, $linkId);

        // Check for errors.
        if ($return === false) {
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
        } else {
            // Clear the profile id from the session.
            $app->setUserState('com_confmgt.edit.author.id', null);

            // Flush the data from the session.
            $app->setUserState('com_confmgt.edit.author.data', null);

            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }

        // Redirect to the list screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors&linkid=' . $linkId, false));
    }


    /**
     * Method to remove an author in the update laypout
     * @return void
     * @since version 3.8.0
     */
    public function remove_update()
    {

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Author', 'ConfmgtModel');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');
        $id = JFactory::getApplication()->input->getInt('id', null, 'array');

        // Attempt to save the data.
        $return = $model->delete('id', $linkId);

        // Check for errors.
        if ($return === false) {
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
        } else {

            // Clear the profile id from the session.
            $app->setUserState('com_confmgt.edit.author.id', null);

            // Flush the data from the session.
            $app->setUserState('com_confmgt.edit.author.data', null);

            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }

        // Redirect to the list screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors&layout=update&linkid=' . $linkId, false));
    }

}
