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
 * Paperform controller class.
 */
class ConfmgtControllerPaperForm extends ConfmgtController
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

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_confmgt.edit.paper.id', $editId);

        // Get the model.
        $model = $this->getModel('PaperForm', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        // Check in the previous user.
        if ($previousId) {
            $model->checkin($previousId);
        }

        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paper&layout=edit', false));
    }

    /**
     * Method to save a paper data.
     *
     * @return    void
     * @since    1.6
     */
    public function save()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('PaperForm', 'ConfmgtModel');

        // Get the  data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Validate the posted data.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
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
            $app->setUserState('com_confmgt.edit.paper.data', JFactory::getApplication()->input->get('jform', array(), 'array'));

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&layout=edit&id=' . $id, false));
            return false;
        }


        // Attempt to save the data.
        $return = $model->save($data);

        // Check for errors.
        if ($return === false) {
            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.paper.data', $data);

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.paper.id');
            $app->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&layout=edit&id=' . $id, false));
            return false;
        }

        // Check in the paper.
        if ($return) {
            $model->checkin($return);

            $emaildue = (int)$app->getUserState('com_confmgt.edit.paper.email');

            if ($emaildue) {

                //preparing the emails
                $config = JFactory::getConfig();
                $theme = AclHelper::getTheme((int)$data['id']);

                //TODO send the email to all the theme leaders - Change the AclHelper::getTheme function
                $themeleader = $theme->userid;
                $themeleadername = JFactory::getUser((int)$themeleader)->name;
                $themeleaderemail = JFactory::getUser((int)$themeleader)->email;

                $themetitle = $theme->title;
                $abstract = $data ['abstract'];
                $title = $data ['title'];
                $keywords = $data ['keywords'];
                $title = $data['title'];
                $sitename = $config->get('config.sitename');
                $authorname = JFactory::getUser()->name;
                $authoremail = JFactory::getUser()->email;
                $site_url = JURI::base();
                $authors = AclHelper::getAuthors((int)$data['id']);
                $authordetails = '';
                if ($authors) {
                    foreach ($authors as $author) {
                        $authordetails = $authordetails . $author->title . ' ' . $author->firstname . ' ' . $author->surname . '; ';
                    }
                }
                //sending email to the author
                $authoremaildata = emailHelper::getEmailcontent('auth_abs');
                $rawsubject = $authoremaildata->subject;
                $rawbody = $authoremaildata->message;
                $recipient = $authoremail;

                //setting placeholders
                $placeholders = array('ABSTRACT' => $abstract, 'NAME' => $authorname, 'TITLE' => $title, 'KEYWORDS' => $keywords, 'SITE' => $sitename, 'SITE_URL' => $site_url, 'AUTHORS' => $authordetails);
                $body = emailHelper::replacePlaceholders($placeholders, $rawbody);
                $subject = emailHelper::replacePlaceholders($placeholders, $rawsubject);

                emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);

                //sending the email to the theme leader
                $leaderemaildata = emailHelper::getEmailcontent('leader_abs');
                $leader_rawsubject = $leaderemaildata->subject;
                $leader_rawbody = $leaderemaildata->message;
                $leader_recipient = $themeleaderemail;

                //setting placeholders
                $leader_placeholders = array('ABSTRACT' => $abstract, 'NAME' => $themeleadername, 'TITLE' => $title, 'KEYWORDS' => $keywords, 'SITE' => $sitename, 'SITE_URL' => $site_url, 'AUTHORS' => $authordetails, 'AUTHOR' => $authorname, 'THEME' => $themetitle);
                $leader_body = emailHelper::replacePlaceholders($leader_placeholders, $leader_rawbody);
                $leader_subject = emailHelper::replacePlaceholders($leader_placeholders, $leader_rawsubject);

                emailHelper::sendEmail($leader_recipient, $leader_subject, $leader_body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);

                $app->setUserState('com_confmgt.edit.paper.email', null);

            }//email due
        }

        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.paper.id', null);

        // Redirect to the list screen.
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));

        // Flush the data from the session.
        $app->setUserState('com_confmgt.edit.paper.data', null);
        $app->setUserState('com_confmgt.new.abstract.id', null);
    }


    /**
     * Method to save a resubmitted abstract
     *
     * @return    void
     * @since    1.6
     */
    public function save_resubmit()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('PaperForm', 'ConfmgtModel');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $linkid = $model->getLinkid();
        $data['linkid'] = $linkid;

        // Validate the posted data.
        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
            return false;
        }

        // Validate the posted data.
        //$data = $model->validate($data);

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
            $app->setUserState('com_confmgt.edit.abresubmit.data', JFactory::getApplication()->input->get('jform', array(), 'array'));

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.abresubmit.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&layout=resubmit&id=' . $id . '&linkid=' . $linkid, false));
            return false;
        }


        // Attempt to save the data.
        $return = $model->save($data);

        // Check for errors.
        if ($return === false) {
            // Save the data in the session.
            $app->setUserState('com_confmgt.edit.abresubmit.data', $data);

            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_confmgt.edit.abresubmit.id');
            $app->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=paperform&layout=resubmit&id=' . $id . '&linkid=' . $linkid, false));
            return false;
        }


        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }

        // Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.abresubmit.id', null);

        // Redirect to the list screen.
        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));

        // Flush the data from the session.
        $app->setUserState('com_confmgt.edit.abresubmit.data', null);
        $app->setUserState('com_confmgt.edit.abresubmit.id', null);
    }

    /**
     * Method to handle cancel
     * @return void
     *
     * @since version 3.8.0
     */

    function cancel()
    {
        $app = JFactory::getApplication();
        $app->setUserState('com_confmgt.edit.paper.id', null);
        $app->setUserState('com_confmgt.edit.paper.data', null);
        $app->setUserState('com_confmgt.new.abstract.id', null);
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers', false));
    }

}