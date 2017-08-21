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

/**
 *
 * Login form view class
 */
class ConfmgtViewLoginform extends JViewLegacy

{
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		parent::display($tpl);
	}
}

 
