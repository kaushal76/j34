<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined("_JEXEC") or die("Restricted access");

require_once JPATH_COMPONENT.'/helpers/confmgr.php';

/**
 * Full_paper item view class.
 *
 * @package     Confmgr
 * @subpackage  Views
 */
class ConfmgrViewFull_paper extends JViewLegacy
{
	protected $item;
	protected $form;
	protected $state;

	public function display($tpl = null)
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->state = $this->get('State');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}
		
		if ($this->getLayout() == 'modal')
		{
		}

		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
		$canDo		= ConfmgrHelper::getActions();
		
		JToolBarHelper::title(JText::_('COM_CONFMGR_FULL_PAPER_VIEW_FULL_PAPER_TITLE'));

		if (isset($this->item->checked_out)) {
		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
		
		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create'))))
		{

			JToolBarHelper::apply('full_paper.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('full_paper.save', 'JTOOLBAR_SAVE');
		}
		if (!$checkedOut && ($canDo->get('core.create'))){
			JToolBarHelper::custom('full_paper.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}
		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::custom('full_paper.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}
		if (empty($this->item->id)) {
			JToolBarHelper::cancel('full_paper.cancel', 'JTOOLBAR_CANCEL');
		}
		else {
			JToolBarHelper::cancel('full_paper.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}
?>