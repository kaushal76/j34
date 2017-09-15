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
 * View class for a paper
 */
class ConfmgtViewPaper extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
	protected $linkid;
	protected $authors;
	protected $fullpapers;
	protected $camerareadypapers;
	protected $presentations;

    /**
     * Display the view
     */
    public function display($tpl = null) {

        $user	= JFactory::getUser();
		
		//getting the authors and full papers linked with the item
			
		$this->authors = $this->get('Items', 'Authors');
		$this->fullpapers = $this->get('Items', 'Fullpapers');
		$this->camerareadypapers = $this->get('Items', 'Camerareadypapers');
		$this->presentations = $this->get('Items', 'Presentations');
		
		$this->form		= $this->get('Form');
		$this->linkid	= $this->get('Linkid');
	        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');

		$this->isAuthor = AclHelper::isAuthor($this->item->id);


        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }      
        
        if($this->_layout == 'edit') {
		// only registered can create an abstract
		
			if ($this->item->id > 0) {				
				$authorised  = AclHelper::isAuthor($this->item->id);				
			}else{			
			$authorised = ($user->id > 0);			
			}
			if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        	}
        }
		// If the user is requesting a theme leader view, then he must be a theme leader
		if($this->_layout == 'leader_default') {
			$authorised  = AclHelper::isThemeleader();
			
			if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        	}
		}

        parent::display($tpl);
    }
}
