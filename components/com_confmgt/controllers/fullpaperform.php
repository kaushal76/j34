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
 * Full paper form controller class
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerFullpaperForm extends ConfmgtController
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
        $previousId = (int)$app->getUserState('com_confmgt.edit.fullpaper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.fullpaper.id', $editId);

        // Get the model.
        $model = $this->getModel('FullpaperForm', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=fullpaper&layout=edit', false));
    }

    /**
     * Method to save the full paper data.
     *
     * @return    void | bool
     * @return bool
     * @since    1.6
     * TODO remove depriciated method $model->getError();
     */
    public function save()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('FullpaperForm', 'ConfmgtModel');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        //Get files inout for validation
        $files = JFactory::getApplication()->input->files->get('jform');

        $data['full_paper'] = $files['full_paper']['name'];

        // Validate the posted data.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), '500');
        }
        //get Link ID
        $linkid = $model->getLinkid();

        // Validate the posted data.
        $data = $model->validate($form, $data);

        // Check for errors.
        if ($data === false) {
            // Get the validation messages.
            $errors = $model->getErrors();
            // Push up to three validation messages out to the user.
            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'error');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }

            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.fullpaper.data', JFactory::getApplication()->input->get('jform', array(), 'array'));

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.fullpaper.id');

            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=fullpaperform&layout=edit&linkid=' . $linkid . '&id=' . $id, false));
            return false;
        }

        // Attempt to save the data.
        $return = $model->save($data);

        // Check for errors.
        if ($return === false) {
            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.fullpaper.data', $data);

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.fullpaper.id');
            $app->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=fullpaperform&layout=edit&linkid=' . $linkid . '&id=' . $id, false));
            return false;
        }


        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }

        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.fullpaper.id', null);
        $app->setUserState('com_confmgt.edit.fullpaper.linkid', null);

        // Redirect to the list screen.
        $app->enqueueMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $item = 'index.php?option=com_confmgt&view=paper&id=' . $linkid . '&linkid=' . $linkid;

        $this->setRedirect(JRoute::_($item, false));

        // Flush the data from the session.
        $app->setUserState('com_confmgt.edit.fullpaper.data', null);

    }

    /**
     * Method to redirect when user cancel a paper upload
     *
     * @since version 3.8.0
     */
    function cancel()
    {

        //get model and Link ID
        $model = $this->getModel('FullpaperForm', 'ConfmgtModel');
        $linkid = $model->getLinkid();
        if (!$linkid) {
            $linkid = JFactory::getApplication()->input->getInt('linkid');
        }
        $link = 'index.php?option=com_confmgt&view=paper&id=' . $linkid . '&linkid=' . $linkid;
        $this->setRedirect(JRoute::_($link, false));
    }

    /**
     * Method to remove a full paper
     *
     * @since version 3.8.0
     * TODO complete the remove function for full papers
     */
    public function remove()
    {

    }


}