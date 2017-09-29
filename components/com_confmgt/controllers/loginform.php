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
 * Controller class for login
 *
 * @package  CONFGMT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerLoginForm extends ConfmgtController
{
	/**
	 * Login action
	 */

	public function login()
	{
	   $app = JFactory::getApplication();
       $data = JFactory::getApplication()->input->get('jform', array(), 'array');
	   $model = $this->getModel('LoginForm', 'ConfmgtModel');

		try
		{
			$form = $model->getForm();
			if (!$form) {
				$app->enqueueMessage($model->getError());
				return false;
			}
		}
		catch (RuntimeException $e)
		{
            $app->enqueueMessage($e->getMessage());
		    return false;
		}
		
	
		// Validate the posted data.
		$data = $model->validate($form, $data);
	
		// Check for errors.
	
		if ($data === false) 
		{
			//@TODO update this to use Exceptions when available
            //Get errors
			$errors	= $model->getErrors();
	
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) 
			{
				if ($errors[$i] instanceof RuntimeException)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'error');
				} 
				else 
				{
					$app->enqueueMessage($errors[$i], 'error');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_confmgt.edit.loginform.data', JFactory::getApplication()->input->get('jform', array(), 'array'));
	
			// Redirect back to the edit screen.
			$id = (int) $app->getUserState('com_confmgt.edit.loginform.id');
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

    /**
     * Method to cancel a login
     *
     * @since version 3.8.0
     */
	public function cancel()
    {
		$this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false)); 
	}

    /**
     * Method to logout
     *
     * @since version 3.8.0
     */
	public function logout()
	{
		$app = JFactory::getApplication();
		if ($app->logout()) 
		{
			$app->enqueueMessage(JText::_('COM_CONFMGR_CONTROLLER_ENTRYPAGE_LOGOUT_SUCCESS'), 'message');
			$app->redirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false));
		}
		else
		{
			$app->enqueueMessage(JText::_('COM_CONFMGR_CONTROLLER_ENTRYPAGE_LOGOUT_FAIELD'), 'error');
			$app->redirect(JRoute::_('index.php?option=com_confmgt&view=entrypage', false));
		}
	}
}