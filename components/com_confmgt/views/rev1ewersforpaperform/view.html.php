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
class ConfmgtViewRev1ewersforpaperform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        $user	= JFactory::getUser();
		
		
		$this->authors = $this->get('authorsData');
		$this->rev1ewers = $this->get('rev1ewersData');
		
		$this->form		= $this->get('Form');
		$this->linkid	= $this->get('Linkid');

        $this->params = $app->getParams('com_confmgt');
        
        $this->state = $this->get('State');
        $this->item = $this->get('Paper','Paper');
		
		$this->isAuthor = AclHelper::isAuthor($this->linkid);
		$this->isThemeleader = AclHelper::isThemeleader($this->item->paper_theme);
		$this->isStudentCoordinator = AclHelper::isStudentCoordinator();
		
        $this->params = $app->getParams('com_confmgt');
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
		$authorised = true; //TO-DO set the confmgt ACL

        //if ($authorised !== true) {
        //   throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        //}

        parent::display($tpl);
    }

}
