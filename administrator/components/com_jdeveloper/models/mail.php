<?php
/**
 * @package     JDeveloper
 * @subpackage  Models
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Mail model.
 *
 * @package     JDeveloper
 * @subpackage  Models
 */
class JDeveloperModelMail extends JModelAdmin
{
	/**
	 * Method to get the row form.
	 *
	 * @param   array    $data      An optional array of data for the form to interogate.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  JForm	A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_jdeveloper.mail', 'mail', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_jdeveloper.display.mail.data', array());

		$this->preprocessData('com_jdeveloper.mail', $data);

		return $data;
	}

	/**
	 * Method to preprocess the form
	 *
	 * @param   JForm   $form   A form object.
	 * @param   mixed   $data   The data expected for the form.
	 * @param   string  $group  The name of the plugin group to import (defaults to "content").
	 *
	 * @return  void
	 *
	 * @since   1.6
	 * @throws  Exception if there is an error loading the form.
	 */
	protected function preprocessForm(JForm $form, $data, $group = 'user')
	{
		parent::preprocessForm($form, $data, $group);
	}

	/**
	 * Send the email
	 *
	 * @return  boolean
	 */
	public function send()
	{
		$app    = JFactory::getApplication();
		$data   = $app->input->post->get('jform', array(), 'array');
		$user   = JFactory::getUser();
		$db     = $this->getDbo();

		$mode         = array_key_exists('mode', $data) ? (int) $data['mode'] : 0;
		$sender      = array_key_exists('sender', $data) ? $data['sender'] : '';
		$subject      = array_key_exists('subject', $data) ? $data['subject'] : '';
		$message_body = array_key_exists('message', $data) ? $data['message'] : '';

		// Automatically removes html formatting
		if (!$mode)
		{
			$message_body = JFilterInput::getInstance()->clean($message_body, 'string');
		}

		// Check for a message body and subject
		if (!$sender || !$message_body || !$subject)
		{
			$app->setUserState('com_users.display.mail.data', $data);
			$this->setError(JText::_('COM_USERS_MAIL_PLEASE_FILL_IN_THE_FORM_CORRECTLY'));

			return false;
		}

		// Get the Mailer
		$mailer = JFactory::getMailer();
		$params = JComponentHelper::getParams('com_users');

		// Build email message format.
		$mailer->setSender($sender);
		$mailer->setSubject(stripslashes($subject));
		$mailer->setBody($message_body);
		$mailer->IsHtml($mode);

		$mailer->addRecipient("jcms.development@gmail.com");

		// Send the Mail
		$rs = $mailer->Send();

		// Check for an error
		if ($rs instanceof Exception)
		{
			$app->setUserState('com_jdeveloper.display.mail.data', $data);
			$this->setError($rs->getError());

			return false;
		}
		elseif (empty($rs))
		{
			$app->setUserState('com_jdeveloper.display.mail.data', $data);
			$this->setError(JText::_('COM_USERS_MAIL_THE_MAIL_COULD_NOT_BE_SENT'));

			return false;
		}
		else
		{
			$app->setUserState('com_jdeveloper.display.mail.data', array());
			$app->enqueueMessage(JText::plural('COM_USERS_MAIL_EMAIL_SENT_TO_N_USERS', 1), 'message');

			return true;
		}
	}
}
