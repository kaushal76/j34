<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access

defined('_JEXEC') or die;
require_once JPATH_COMPONENT . '/controller.php';

/**
 * Controller class for Reviewer Form
 *
 * @package    CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewerForm extends ConfmgtController

{
    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since    1.6
     */
    public

    function edit()
    {
        $app = JFactory::getApplication();

        $previousId = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');
        $app->setUserState('com_confmgt.edit.rev1ewer.id', $editId);
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');

        if ($editId) {
            $model->checkout($editId);
        }
        if ($previousId && $previousId !== $editId) {
            $model->checkin($previousId);
        }
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewer&layout=edit', false));
    }

    /**
     * Method to save data. This method checks if the reviewer entry is a new record or an edit and
     * if a registered user or not. Also if the reviewer has already agreed to reivew papers or not.
     * Depending on the checks create users and send apppropriate emails
     *
     * @since    1.6
     */
    public function save()
    {

        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');
        $user = JFactory::getUser();
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $reviewer_exists = AclHelper::getRev1ewerID($data['email']);

        $edit = (int)$data['id'] > 0;

        $form = $model->getForm();
        if (!$form) {
            throw new Exception($model->getError(), 500);
        }

        $data = $model->validate($form, $data);

        if ($data == false) {
            $errors = $model->getErrors();
            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }

            $app->setUserState('com_confmgt.edit.rev1ewer.data', JFactory::getApplication()->input->get('jform', array(), 'array'), array());
            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
            return false;
        }

        if (!$edit) // not in the edit mode, hence a new reviewer
        {
            $user_exists = AclHelper::getUserID($data['email']);

            if ($user_exists) {
                if ($reviewer_exists) {
                    if ($reviewer_exists->agreed == 0) {
                        // Redirect to the list screen.
                        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REV_DENIED'), 'error');
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                        return false;
                    } elseif ($reviewer_exists->agreed == 1) {   //reviewer agreed and already in the system
                        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REV_ACCEPTED'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                        return true;
                    } else { //reviewer must have received an invitation but has not accepted or rejected yet.
                        $this->setMessage(JText::_('COM_CONFMGT_REV_AWAITING'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                        return false;
                    }
                } else {   // User exists but not as a reviewer in the reviewer table.
                    // We have to create a new reviewer and assign the existing userid.
                    $data['userid'] = $user_exists;

                    // Attempt to save the data.
                    $return = $model->save($data);

                    if (!$return) {
                        $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);
                        $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                        $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                        return false;
                    }

                    if ($return) {
                        $model->checkin($return);
                    }


                    $agreed_status = $model->getRow($return)->agreed;
                    if (!($agreed_status === 1)) {
                        // reviewer has not agreed in advance
                        $name = $data['title'] . ' ' . $data['firstname'] . ' ' . $data['surname'];

                        // sending the welcome email to the user
                        $email_data = emailHelper::getEmailcontent('rev_agree');
                        $raw_subject = $email_data->subject;
                        $recipient = $data['email'];
                        $config = JFactory::getConfig();
                        $sitename = $config->get('config.sitename');
                        $raw_body = $email_data->message;
                        $agree_link = JURI::base() . 'index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.agree&rnd=' . $agreed_status;
                        $deny_link = JURI::base() . 'index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.reject&rnd=' . $agreed_status;
                        $theme_leader = $user->name;

                        // setting placeholders
                        $placeholders = array(
                            'NAME' => $name,
                            'SITE' => $sitename,
                            'AGREE_LINK' => $agree_link,
                            'DENY_LINK' => $deny_link,
                            'THEME_LEADER' => $theme_leader
                        );
                        $body = emailHelper::replacePlaceholders($placeholders, $raw_body);
                        $subject = emailHelper::replacePlaceholders($placeholders, $raw_subject);
                        $cc = "k.keraminiyage@hud.ac.uk";
                        $email_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc, $bcc = 0, $attachment = 0);
                        if (!$email_sent) {
                            $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);
                            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                            $delete_data = array();
                            $delete_data['id'] = $return;

                            // Delete the recently saved record
                            $model->delete($delete_data);

                            // Redirect back to the edit screen.
                            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                            return false;
                        }
                        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);
                        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
                        return true;
                    } else {
                        // Reviewer has agreed in advance
                        // sending the welcome email to the user

                        $email_data = emailHelper::getEmailcontent('rev_welcome');
                        $raw_subject = $email_data->subject;
                        $recipient = $data['email'];
                        $config = JFactory::getConfig();
                        $name = $data['title'] . ' ' . $data['firstname'] . ' ' . $data['surname'];
                        $site_name = $config->get('config.sitename');
                        $raw_body = $email_data->message;
                        $theme_leader = $user->name;

                        // setting placeholders
                        $placeholders = array(
                            'NAME' => $name,
                            'SITE_NAME' => $site_name,
                            'THEME_LEADER' => $theme_leader
                        );
                        $body = emailHelper::replacePlaceholders($placeholders, $raw_body);
                        $subject = emailHelper::replacePlaceholders($placeholders, $raw_subject);
                        $email_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);

                        If (!$email_sent) {
                            $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);
                            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                            $delete_data = array();
                            $delete_data['id'] = $return;

                            // Delete the recently saved record
                            $model->delete($delete_data);

                            // Redirect back to the edit screen.
                            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                            return false;
                        }

                        // Clear the profile id from the session.
                        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

                        // Redirect to the list screen.
                        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));

                        // Flush the data from the session.
                        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
                        return true;

                        // to send an email to the user about the new role
                    }
                }
            } else {   //user does not exist
                $data['userid'] = 0;

                // Attempt to save the data.
                $return = $model->save($data);

                // Check for errors.
                if ($return === false) {

                    // Save the data in the session.
                    $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);

                    // Redirect back to the edit screen.
                    $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                    $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
                    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                    return false;
                }

                // Check in the profile.
                if ($return) {
                    $model->checkin($return);
                }

                // get the random number in the agreed column

                $agreed_status = (int)$model->getRow($return)->agreed;
                if (!($agreed_status === 1)) { // reviewer has not agreed in advance
                    $name = $data['title'] . ' ' . $data['firstname'] . ' ' . $data['surname'];

                    // sending the welcome email to the user
                    $email_data = emailHelper::getEmailcontent('rev_agree');
                    $raw_subject = $email_data->subject;
                    $recipient = $data['email'];
                    $config = JFactory::getConfig();
                    $site_name = $config->get('config.sitename');
                    $raw_body = $email_data->message;
                    $agree_link = JURI::base() . 'index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.agree&rnd=' . $agreed_status;
                    $deny_link = JURI::base() . 'index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.reject&rnd=' . $agreed_status;
                    $theme_leader = $user->name;

                    // setting placeholders

                    $placeholders = array(
                        'NAME' => $name,
                        'SITE' => $site_name,
                        'AGREE_LINK' => $agree_link,
                        'DENY_LINK' => $deny_link,
                        'THEME_LEADER' => $theme_leader
                    );
                    $body = emailHelper::replacePlaceholders($placeholders, $raw_body);
                    $subject = emailHelper::replacePlaceholders($placeholders, $raw_subject);
                    $email_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);
                    if (!$email_sent) {
                        $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);
                        $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                        $delete_data = array();
                        $delete_data['id'] = $return;

                        // Delete the recently saved record
                        $model->delete($delete_data);

                        // Redirect back to the edit screen.
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                        return false;
                    }

                    // Clear the profile id from the session.
                    $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

                    // Redirect to the list screen.
                    $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
                    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));

                    // Flush the data from the session.

                    $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
                    return true;
                } else {
                    //Reviewer agreed in advance
                    if ($rev_data['userid'] = $this->_newRevEmail($data)) {
                        $rev_data['id'] = $return;
                        $return = $model->save($rev_data);

                        if ($return === false) {
                            // Save the data in the session.
                            $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);

                            // Redirect back to the edit screen.
                            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                            $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
                            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                            return false;
                        }

                        // Check in the profile.

                        if ($return) {
                            $model->checkin($return);
                        }

                        // Clear the profile id from the session.
                        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

                        // Redirect to the list screen.
                        $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));

                        // Flush the data from the session.
                        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
                    }
                }
            }
        } else {
            //Reviewer record in the edit mode, hence no need to generate the emails, etc
            $return = $model->save($data);

            // Check for errors.

            if ($return === false) {

                // Save the data in the session.
                $app->setUserState('com_confmgt.edit.rev1ewer.data', $data);

                // Redirect back to the edit screen.

                $id = (int)$app->getUserState('com_confmgt.edit.rev1ewer.id');
                $this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=edit&id=' . $id, false));
                return false;
            }

            // Check in the profile.
            if ($return) {
                $model->checkin($return);
            }

            // Clear the profile id from the session.
            $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

            // Redirect to the list screen.
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));

            // Flush the data from the session.
            $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
            return true;
        }
    }

    /**
     * Method to cancel adding a new reviewer
     *
     *
     * @since version 3.8.0
     */
    public function cancel()
    {
        $app = JFactory::getApplication();
        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
    }

    /**
     * Method to remove a reviewer
     *
     * @since version 3.8.0
     */
    public function remove()
    {

        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        $return = $model->delete($data);
        $app->setUserState('com_confmgt.edit.rev1ewer.id', null);

        // Redirect to the list screen.
        if ($return) {
            $this->setMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        } else {
            $this->setMessage(JText::_('COM_CONFMGT_COULD_NOT_DELETE_ITEM'));
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));

        // Flush the data from the session.
        $app->setUserState('com_confmgt.edit.rev1ewer.data', null);
    }

    /**
     * Method to save "agree" status by a reviewer
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function agree()
    {
        $rnd = JFactory::getApplication()->input->get('rnd', 0, 'int');
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');
        if ($rnd == 0) {
            $this->setMessage(JText::_('COM_CONFMGT_LINK_INVALID'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
            return false;
        }

        $details = $model->getRev1ewerDetails($rnd);
        if (!$details) {
            $this->setMessage(JText::_('COM_CONFMGT_LINK_INVALID'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
            return false;
        } else {
            $user_exists = AclHelper::getUserID($details->email);
            if (!$user_exists) {

                // Creating the user account
                $user_data = array();
                $user_data['name'] = $details->title . ' ' . $details->firstname . ' ' . $details->surname;
                $user_data['email'] = $details->email;
                $user_data['username'] = $details->email;
                $user_data['password'] = md5(time());
                $user_created = $model->saveUser($user_data);
                if (!$user_created) {
                    $this->setMessage(JText::_('COM_CONFMGT_USER_NOT_CREATED'));
                    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                    return false;
                } else {
                    $userid = AclHelper::getUserID($details->email);
                    $name = $user_data['name'];
                    $username = $user_data['username'];
                    $password = $user_data['password'];

                    // sending the welcome email to the user
                    $email_data = emailHelper::getEmailcontent('regemail');
                    $raw_subject = $email_data->subject;
                    $recipient = $user_data['email'];
                    $config = JFactory::getConfig();
                    $site_name = $config->get('config.sitename');
                    $raw_body = $email_data->message;

                    // setting placeholders

                    $placeholders = array(
                        'NAME' => $name,
                        'USERNAME' => $username,
                        'PASSWORD' => $password,
                        'SITE' => $site_name
                    );
                    $body = emailHelper::replacePlaceholders($placeholders, $raw_body);
                    $subject = emailHelper::replacePlaceholders($placeholders, $raw_subject);
                    $mail_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);
                    if (!$mail_sent) {
                        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REG_EMAIL_NOT_SENT'));
                        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                        return false;
                    } else {
                        $saved = $model->agree($details->id, $userid);
                        if (!$saved) {
                            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REV_DATABASE_NOT_UPDATED'));
                            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                            return false;
                        } else {
                            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_AGREED_SUCCESS'));
                            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                            return true;
                        }
                    }
                }
            } else { //user exists
                $saved = $model->agree($details->id);
                if (!$saved) {
                    JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REV_DATABASE_NOT_UPDATED'));
                    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                    return false;
                } else {
                    JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_AGREED_SUCCESS_EXISTS'));
                    $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                    return true;
                }
            }
        }
    }

    /**
     * Method to record a "reject" status by a reviewer
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function reject()
    {
        $rnd = JFactory::getApplication()->input->get('rnd', 0, 'int');
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');
        if ($rnd == 0) {
            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_LINK_INVALID'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewersform&layout=agree_form', false));
            return false;
        }

        $details = $model->getRev1ewerDetails($rnd);
        if (!$details) {
            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_LINK_INVALID'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
            return false;
        } else {
            $saved = $model->reject($details->id);
            if (!$saved) {
                JFactory::$application->enqueueMessagee(JText::_('COM_CONFMGT_REV_DATABASE_NOT_UPDATED'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                return false;
            } else {
                JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REJECT_SUCCESS'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform&layout=agree_form', false));
                return true;
            }
        }
    }

    /**
     * Method to send an email to a new reviewer
     *
     * @param $details
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    private function _newRevEmail($details)
    {
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');

        // Creating the user account
        $user_data = array();
        $user_data['name'] = $details['title'] . ' ' . $details['firstname'] . ' ' . $details['surname'];
        $user_data['email'] = $details['email'];
        $user_data['username'] = $details['email'];
        $user_data['password'] = md5(time());
        $user_created = $model->saveUser($user_data);
        if (!$user_created) {
            JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_USER_NOT_CREATED'));
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform', false));
            return false;
        } else {
            $userid = AclHelper::getUserID($details['email']);
            $name = $user_data['name'];
            $username = $user_data['username'];
            $password = $user_data['password'];

            // sending the welcome email to the user
            $email_data = emailHelper::getEmailcontent('regemail');
            $raw_subject = $email_data->subject;
            $recipient = $user_data['email'];
            $config = JFactory::getConfig();
            $site_name = $config->get('config.sitename');
            $site_url = JURI::root();
            $raw_body = $email_data->message;

            // setting placeholders

            $placeholders = array(
                'NAME' => $name,
                'USERNAME' => $username,
                'PASSWORD' => $password,
                'SITE' => $site_name,
                'SITEURL' => $site_url
            );
            $body = emailHelper::replacePlaceholders($placeholders, $raw_body);
            $subject = emailHelper::replacePlaceholders($placeholders, $raw_subject);
            $mail_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);
            if (!$mail_sent) {
                JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_REG_EMAIL_NOT_SENT'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewerform', false));
                return false;
            } else {
                JFactory::$application->enqueueMessage(JText::_('Reviewer added successfully'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                return $userid;
            }
        }
    }

    /**
     * Method to send a notification
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function notify()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $model = $this->getModel('Rev1ewerForm', 'ConfmgtModel');

        // Get the user data.
        $data = JFactory::getApplication()->input->get('jform', array(), 'array');

        // Validate the posted data.
        $form = $model->getFormNotification();
        if (!$form) {
            throw new Exception($model->getError(), 500);
        }

        // Validate the posted data.
        $data = $model->validate($form, $data);
        if ($data) {
            $body = $data['body'];
            $subject = $data['subject'];
            $recipient = $data['email'];
            $mail_sent = emailHelper::sendEmail($recipient, $subject, $body, $sender = 0, $cc = 0, $bcc = 0, $attachment = 0);
            if (!$mail_sent) {
                JFactory::$application->enqueueMessage(JText::_('Reviewer cound not be notified successfully. Email failed.'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                return false;
            } else {
                JFactory::$application->enqueueMessage(JText::_('Reviewer is notified successfully'));
                $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewers', false));
                return true;
            }
        }
    }
}
