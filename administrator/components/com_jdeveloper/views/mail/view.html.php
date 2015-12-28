<?php
/**
 * @package     JDeveloper
 * @subpackage  Views
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Mail view.
 *
 * @package     JDeveloper
 * @subpackage  View
 */
class JDeveloperViewMail extends JViewLegacy
{
	/**
	 * @var object form object
	 */
	protected $form;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Redirect to admin index if mass mailer disabled in conf
		if (JFactory::getApplication()->get('massmailoff', 0) == 1)
		{
			JFactory::getApplication()->redirect(JRoute::_('index.php', false));
		}

		// Get data from the model
		$this->form = $this->getModel()->getForm();

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		JToolbarHelper::title(JText::_('COM_USERS_MASS_MAIL'), 'users massmail');
		JToolbarHelper::custom('mail.send', 'envelope.png', 'send_f2.png', 'COM_USERS_TOOLBAR_MAIL_SEND_MAIL', false);
		JToolbarHelper::cancel('mail.cancel');
		JToolbarHelper::divider();
		JToolbarHelper::preferences('com_users');
		JToolbarHelper::divider();
		JToolbarHelper::help('JHELP_USERS_MASS_MAIL_USERS');
	}
}
