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

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Registration (accounts creation) controller class.
 */
class ConfmgtControllerRegForm extends ConfmgtController
{

	/**
	 * Method to check out an item for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app = JFactory::getApplication();

		// Get the previous edit id (if any) and the current edit id.
		$previousId = (int) $app->getUserState('com_confmgt.edit.reg.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');

		// Set the id for the record to edit in the session.
		$app->setUserState('com_confmgt.edit.reg.id', $editId);

		// Get the model.
		$model = $this->getModel('RegForm', 'ConfmgtModel');

		// Redirect to the edit screen.
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=regform&layout=edit', false));
	}

	/**
	 * Method to save a user's profile data.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function save()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$app	= JFactory::getApplication();
		$model = $this->getModel('RegForm', 'ConfmgtModel');

		// Get the user data.
		$data = JFactory::getApplication()->input->get('jform', array(), 'array');

		// Validate the posted data.
		//TODO Remove getError when the user model throws Exceptions
		try{
			$form = $model->getForm();

			if (!$form) {
				$app->enqueueMessage($model->getError());
				return false;
			}
		}
		catch (RuntimeException $e)
		{
			$app->enqueueMessage($e->getMessage());
		}



		// Validate the posted data.
		//TODO Remove getError when the user model throws Exceptions
		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false) {
			// Get the validation messages.
			$errors	= $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.reg.data', JFactory::getApplication()->input->get('jform', array(), 'array')); 

			// Redirect back to the edit screen.
			$id = (int) $app->getUserState('com_confmgt.edit.reg.id');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=regform&layout=edit&id='.$id, false));
			return false;
		}

		// Attempt to save the data.
		$return	= $model->save($data);

		// Check for errors.
		if ($return === false) {
			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.reg.data', $data);

			// Redirect back to the edit screen.
			//TODO Remove getError when the user model throws Exceptions
			$id = (int)$app->getUserState('com_confmgt.edit.reg.id');
			$app->enqueueMessage(JText::sprintf('Author could not be saved. Please try again', $model->getError()), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=regform&layout=edit&id='.$id, false)); 
			return false;
		}
        
	    $name = $data['title'].' '.$data['firstname'].' '.$data['surname'];
		$username = $data['username'];
		$password = $data['password'];
		$site_url=JURI::base();
		
		// Clear the profile id from the session.
        $app->setUserState('com_confmgt.edit.reg.id', null);
		$credentials = array( 'username' => $data['username'], 'password' => $data['password'] );

        // Redirect to the list screen.
		$app->enqueueMessage(JText::_('COM_CONFMGT_REG_SUCCESSFULLY'));
		$app->login($credentials);
		
		//sending the welcome email to the user
		$emaildata = emailHelper::getEmailcontent ('regemail');
		$rawsubject = $emaildata->subject;
		$recipient = $data['email'];
		
		$config = JFactory::getConfig();
		$sitename = $config->get( 'sitename' );
		$rawbody = $emaildata->message;
		
		//setting placeholders
		$placeholders = array('NAME'=>$name,'USERNAME'=>$username,'PASSWORD'=>$password,'SITE'=>$sitename, 'SITEURL'=>$site_url);
		
		$body = emailHelper::replacePlaceholders($placeholders, $rawbody);
		$subject = emailHelper::replacePlaceholders($placeholders, $rawsubject);
		
		emailHelper::sendEmail($recipient, $subject, $body, $sender=0, $cc=0,  $bcc=0, $attachment=0);
		 
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false));

		// Flush the data from the session.
		$app->setUserState('com_confmgt.edit.reg.data', null);
	}
    
    
    function cancel() {
		$app	= JFactory::getApplication();
		$app->setUserState('com_confmgt.edit.reg.id', null);
		$app->setUserState('com_confmgt.edit.reg.data', null);
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false)); 
	}
    
    
}