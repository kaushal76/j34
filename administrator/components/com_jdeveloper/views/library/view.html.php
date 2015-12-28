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
 * JDeveloper Library View
 *
 * @package     JDeveloper
 * @subpackage  Views
 */
class JDeveloperViewLibrary extends JViewLegacy
{
	protected $item;
	protected $form;
	protected $state;
	
	public function display($tpl = null)
	{
		$input = JFactory::getApplication()->input;
		$this->_layout == "edit" ? $input->set('hidemainmenu', true) : null;
		
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->state = $this->get('State');
		
		if ($this->_layout == "default")
		{
			$model = JModelLegacy::getInstance("Libraries", "JDeveloperModel");
			$this->items = $model->getItems();
		}
				
		$this->sidebar = JLayoutHelper::render("sidebar", array("active" => "libraries"), JDeveloperLAYOUTS);
		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		if ($this->_layout == "default")
		{
			JToolBarHelper::title(JText::_('COM_JDEVELOPER_LIBRARY'));
		}
		else
		{
			JToolBarHelper::title(JText::_('COM_JDEVELOPER_LIBRARY'));
			JToolBarHelper::apply('library.apply');
			JToolBarHelper::save('library.save');
			JToolBarHelper::save2copy('library.save2copy');
			JToolBarHelper::save2new('library.save2new');
			JToolBarHelper::cancel('library.cancel', 'JTOOLBAR_CANCEL');
		}
	}
}