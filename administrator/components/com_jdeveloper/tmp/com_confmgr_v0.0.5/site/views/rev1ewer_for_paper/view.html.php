<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined("_JEXEC") or die("Restricted access");
 
/**
 * Rev1ewer_for_paper item view class.
 *
 * @package     Confmgr
 * @subpackage  Views
 */
class ConfmgrViewRev1ewer_for_paper extends JViewLegacy
{
	protected $item;
	protected $form;
	protected $state;
	
	public function display($tpl = null)
	{
		$this->state 	= $this->get('State');
		$this->item 	= $this->get('Item');
		$this->form 	= $this->get('Form');

		$app = JFactory::getApplication();
		$user = JFactory::getUser();
		
		// Check if item is empty
		if (empty($this->item))
		{
			$app->redirect(JRoute::_('index.php?option=com_confmgr&view=rev1ewers_for_paper'), JText::_('JERROR_NO_ITEMS_SELECTED'));
		}
			
		// Is the user allowed to create an item?
		if (!$this->item->id && !$user->authorise("core.create", "com_confmgr"))
		{
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
		}

		// Get menu params
		$menu = $app->getMenu();
		$active = $menu->getActive();
		
		if (is_object($active))
		{
			$this->state->params = $active->params;
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}		

		// Increment hits
		$model = $this->getModel();
		$model->hit($this->item->id);##{end_hits}##
		
		parent::display($tpl);
	}
}
?>