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
 * Controller class for reviewers for paper
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewersforPaperform extends ConfmgtController
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
        $previousId = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.revforpaper.id', $editId);

        // Get the model.
        $model = $this->getModel('AuthorForm', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=author&layout=edit', false));
    }

    /**
     * Method to save data
     *
     * @return    void
     * @since    1.6
     */
    private function save_common($url_success, $url_fail)
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('rev1ewersforpaperForm', 'ConfmgtModel');


        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');


        // Get the form.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
            return false;
        }

        $data = $model->validate($form, $data);

        // Check for errors.
        if ($data === false) {
            $errors = $model->getErrors();
            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }
            $app->setUserState('com_confmgt.edit.revforpaper.data', JFactory::getApplication()->input->get('jform', array(), 'array'), array());
            $id = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
            $this->setRedirect($url_fail, false);

            return false;
        }
        $return = $model->save($data);

        // Check for errors.
        if ($return === false) {
            $app->setUserState('com_confmgt.edit.revforpaper.data', $data);
            $id = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_($url_fail . $id, false));
            return false;
        }


        // Check in
        if ($return) {
            $model->checkin($return);
        }
        $app->setUserState('com_confmgt.edit.revforpaper.id', null);
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_($url_success, false));
        $app->setUserState('com_confmgt.edit.revforpaper.data', null);
    }

    public function save()
    {
        $app = JFactory::getApplication();
        $id = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
        $url_success = 'index.php?option=com_confmgt&view=authors';
        $url_fail = 'index.php?option=com_confmgt&view=authorform&layout=edit&id=' . $id;

        $this->save_common($url_success, $url_fail);
    }

    public function update_save()
    {
        $app = JFactory::getApplication();
        $id = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
        $url_success = 'index.php?option=com_confmgt&view=authors&layout=update';
        $url_fail = 'index.php?option=com_confmgt&view=authorform&layout=update_form&id=' . $id;

        $this->save_common($url_success, $url_fail);
    }

    function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors', false));
    }

    function update_cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors&layout=update', false));
    }


    public function remove()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewersforpaperForm', 'ConfmgtModel');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Validate the posted data.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(),500);
            return false;
        }

        // Validate the posted data.
        $data = $model->validate($form, $data);

        // Check for errors.
        if ($data === false) {
            // Get the validation messages.
            $errors = $model->getErrors();

            // Push up to three validation messages out to the user.
            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }

            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.author.data', $data);

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.revforpaper.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=author&layout=edit&id=' . $id, false));
            return false;
        }

        // Attempt to save the data.
        $return = $model->delete($data);

        // Check for errors.
        if ($return === false) {
            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.revforpaper.data', $data);

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.author.id');
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=author&layout=edit&id=' . $id, false));
            return false;
        }


        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }

        // Clear the id from the session.
        $app->setUserState('com_confmgt.edit.revforpaper.id', null);

        // Redirect to the list screen.
        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors', false));
        $app->setUserState('com_confmgt.edit.revforpaper.data', null);
    }
}