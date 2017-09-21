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
 * Paper controller class.
 * @since version 3.8.0
 */
class ConfmgtControllerPaper extends ConfmgtController
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
        $previousId = (int)$app->getUserState('com_confmgt.edit.paper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.paper.id', $editId);

        // Get the model.
        $model = $this->getModel('Paper', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&layout=edit&linkid=' . $linkId, false));
    }

    /**
     * Method to load an edit layout when editing an abstract.
     *
     * @since    1.6
     */
    public function update()
    {
        $app = JFactory::getApplication();

        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int)$app->getUserState('com_confmgt.edit.paper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $linkId = JFactory::getApplication()->input->getInt('linkid', null, 'array');

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.paper.id', $editId);

        // Get the model.
        $model = $this->getModel('Paper', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&id='.$linkId.'&layout=update&linkid=' . $linkId, false));
    }

    /**
     * Method to publish paper data.
     *
     * @return    void
     * @since    1.6
     * TODO remove the getError method as depreciated
     */
    public function publish()
    {
        // Check for request forgeries.
        JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Paper', 'ConfmgtModel');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Attempt to save the data.
        $return = $model->publish($data['id'], $data['state']);

        // Check for errors.
        if ($return === false) {
            $app->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
        } else {
            // Check in the profile.
            if ($return) {
                $model->checkin($return);
            }

        }

        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.paper.id', null);

        // Flush the data from the session.
        $app->setUserState('com_confmgt.edit.paper.data', null);

        // Redirect to the list screen.
        $app->enqueueMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
    }

    /**
     * Method to delete a paper (permanently)
     * @return void
     * @since version 3.8.0
     * TODO remove the getError method as depreciated
     */

    public function remove()
    {

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Paper', 'ConfmgtModel');
        $id = JFactory::getApplication()->input->get('id');

        // Attempt to save the data.
        $return = $model->delete($id);

        // Check for errors.
        if ($return === false) {
            $app->enqueueMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
        } else {
            // Check in the profile.
            if ($return) {
                $model->checkin($return);
            }

            // Clear the profile id from the session.
            $app->setUserState('com_confmgt.edit.paper.id', null);

            // Flush the data from the session.
            $app->setUserState('com_confmgt.edit.paper.data', null);

            $app->enqueueMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        }

        // Redirect to the list screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
    }


    /**
     * Method to create and submit new abstract
     * @return void
     * @since version 3.8.0
     */
    public function newAbstract()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables and access the paper form model and the authors model
        $app = JFactory::getApplication();
        $model = $this->getModel('PaperForm', 'ConfmgtModel');
        $authors = $this->getModel('authors', 'ConfmgtModel');

        // create a new blank data array to initiate a new paper ID.
        // This will create a blank paper enrty in the database and return the new ID
        $data = array();

        // Attempt to save the blank data and get the ID from the last saved record
        $return = $model->newAbstract($data);
        if ($return) {
            //This is the first time the record is created, hence the notification email is due.
            // Set this as a session variable
            $app->setUserState('com_confmgt.edit.paper.email', 1);

            //Check if there is an authors list; if not redierct to create one
            if (!$authors->getAuthorsForPaper($return)) {
                $app->enqueueMessage(JText::_('You need to create a list of authors for your abstracts first', 'warning'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=authors&linkid=' . $return, false));
            } else {
                // redirect to the new abstract page
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&task=paper.edit&id=' . $return, false));
            }
        } else {
            // Redirect to the list screen.
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
        }
    }

    /**
     * Method to download a Full Paper.
     * @return void
     *
     * @since version 3.8.0
     */
    public function downloadFullPaper()
    {
        $app = JFactory::getApplication();
        $params = JFactory::getApplication()->getParams();
        $filename = $app->input->get('filename');
        $path = $params->get('upload_path') . $filename;
        $mime = UploadHelper::getMimetype($path, $filename);
        UploadHelper::downloadFile($filename, $path, $mime);
    }

    /**
     * Method to download a Camera Ready Paper.
     * @return void
     *
     * @since version 3.8.0
     */
    public function downloadCameraReady()
    {
        $app = JFactory::getApplication();
        $params = JFactory::getApplication()->getParams();
        $filename = $app->input->get('filename');
        $path = $params->get('upload_path') . $filename;
        $mime = UploadHelper::getMimetype($path, $filename);
        $dn = UploadHelper::downloadFile($filename, $path, $mime);
    }

    /**
     * Method to download a Presentation.
     * @return void
     *
     * @since version 3.8.0
     */
    public function downloadPresentation()
    {
        $app = JFactory::getApplication();
        $params = JFactory::getApplication()->getParams();
        $filename = $app->input->get('filename');
        $path = $params->get('upload_path') . $filename;
        $mime = UploadHelper::getMimetype($path, $filename);
        $dn = UploadHelper::downloadFile($filename, $path, $mime);
    }
}

?>