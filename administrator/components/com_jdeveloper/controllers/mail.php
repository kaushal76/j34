<?php
/**
 * @package     JDeveloper
 * @subpackage  Controllers
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Mail controller.
 *
 * @package     JDeveloper
 * @subpackage  Controllers
 */
class JDeveloperControllerMail extends JControllerLegacy
{
	/**
	 * Send the mail
	 *
	 * @return void
	 *
	 * @since 1.6
	 */
	public function send()
	{
		// Check for request forgeries.
		JSession::checkToken('request') or jexit(JText::_('JINVALID_TOKEN'));

		$model = $this->getModel('Mail');

		if ($model->send())
		{
			$type = 'message';
		}
		else
		{
			$type = 'error';
		}

		$msg = $model->getError();
		$this->setredirect('index.php?option=com_jdeveloper&view=mail', $msg, $type);
	}

	/**
	 * Cancel the mail
	 *
	 * @return void
	 *
	 * @since 1.6
	 */
	public function cancel()
	{
		// Check for request forgeries.
		JSession::checkToken('request') or jexit(JText::_('JINVALID_TOKEN'));
		$this->setRedirect('index.php?option=com_jdeveloper');
	}
}
