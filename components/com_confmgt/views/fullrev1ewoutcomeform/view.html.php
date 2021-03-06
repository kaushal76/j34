<?php

/**
 * @version     2.5.7
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class ConfmgtViewFullrev1ewoutcomeform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;
	protected $linkid;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        $user		= JFactory::getUser();
        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');

        $this->params = $app->getParams('com_confmgt');
   		$this->form		= $this->get('Form');
		$this->linkid	= $this->get('Linkid');
		$this->item = $this->get('paperData');
		$this->rev1ewers = $this->get('rev1ewersData');
		$this->rev1ews = $this->get('rev1ewData');
		$this->authors = $this->get('authorsData');
		$this->previousFullPapers = $this->get('previousFullPapers');
		$this->fullPaperRevisionCount = $this->get('fullPaperRevisionCount');
		$this->item->created_by_name = JFactory::getUser($this->item->created_by)->name;
		
		
		$this->isAuthor = AclHelper::isAuthor($this->linkid);
		$this->isRev1ewer = AclHelper::isRev1ewer($this->linkid);
		if ($this->item->student_submission) {
			$this->isThemeleader = AclHelper::isStudentCoordinator();
		}else{
			$this->isThemeleader = AclHelper::isThemeleader($this->item->theme);
		}

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
        
        // Temp authorise -- TODO - must authenticate later      
        // $authorised = $user->authorise('core.create', 'com_confmgt');
		
		$authorised = true;

        if ($authorised !== true) {
           throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }    
        
        $this->_prepareDocument();

        parent::display($tpl);
    }


	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('COM_CONFMGT_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}        
    
}
