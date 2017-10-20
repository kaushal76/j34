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
 * View class for a list of papers.
 */
class ConfmgtViewPapers extends JViewLegacy
{
	protected $items;
	protected $state;
	protected $leaders_items;

	/**
	 * Method to display the view
     * @since 3.8.0
     * @return void
	 */
	public function display($tpl = null)
	{
		$this->state        = $this->get('State');
		$this->items        = $this->get('Items');
		$this->leaders_items = $this->get('LeadersItems');


		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}
		parent::display($tpl);
	}
}
