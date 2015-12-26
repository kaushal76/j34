<?php
/**
 * @version     3.4.1
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Login controller class.
 */
class ConfmgtControllerLoginForm extends JControllerForm
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
		$previousId = (int) $app->getUserState('com_confmgt.edit.login.id');
		$editId	= JFactory::getApplication()->input->getInt('id', null, 'array');

		// Set the user id for the user to edit in the session.
		$app->setUserState('com_confmgt.edit.login.id', $editId);

		// Redirect to the edit screen.
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=loginform&layout=edit', false));
	}
				
	public function login()
	{
	   $app = JFactory::getApplication();
       $data = JFactory::getApplication()->input->get('jform', array(), 'array');
	   $model = $this->getModel('LoginForm', 'ConfmgtModel');
   
			// Validate the posted data.
		//@TODO remove the reference to JERROR and use PHP error handling
		 
		try
		{
			$form = $model->getForm();
		}
		catch (Exception $e)
		{
			throw new Exception($e->getMessage(),500);
			return false;
		}
		
	
		// Validate the posted data.
		$data = $model->validate($form, $data);
	
		// Check for errors.
	
		if ($data === false) 
		{
			// Get the validation messages.
			$errors	= $model->getErrors();
	
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) 
			{
				if ($errors[$i] instanceof Exception) 
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'error');
				} 
				else 
				{
					$app->enqueueMessage($errors[$i], 'error');
				}
			}
	
			// Save the data in the session.
			$app->setUserState('com_confmgr.edit.loginform.data', JFactory::getApplication()->input->get('jform', array(), 'array'));
	
			// Redirect back to the edit screen.
			$id = (int) $app->getUserState('com_confmgr.edit.loginform.id');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=login&layout=default&id='.$id, false));
			return false;
		}
	
		jimport( 'joomla.user.authentication');
		$auth = & JAuthentication::getInstance();
		$credentials = array( 'username' => $data['username'], 'password' => $data['pw'] );
		$options = array();
		$response = $auth->authenticate($credentials, $options);
	
		if ($response->status != JAuthentication::STATUS_SUCCESS) 
		{
			$app->enqueueMessage(JText::_('COM_CONFMGR_CONTROLLER_ENTRYPAGE_LOGIN_FAILED'), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=loginform', false));
		}
		else
		{
			$app->login($credentials);
			$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false));
		}
	}
 
    public function cancel() {
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false)); 
	}
}