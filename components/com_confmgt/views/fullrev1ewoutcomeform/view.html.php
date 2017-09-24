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
 * View class for full paper review outcome
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtViewFullrev1ewoutcomeform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;
	protected $linkid;
    protected $isThemeLeader;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        $this->params = $app->getParams('com_confmgt');
        $this->paper = $this->get('Paper', 'Paper');
   		$this->form		= $this->get('Form');
		$this->linkid	= $this->get('Linkid');
		$this->rev1ewers = $this->get('rev1ewersData');
		$this->rev1ews = $this->get('rev1ewData');
		$this->authors = $this->get('authorsData');
		$this->previousFullPapers = $this->get('previousFullPapers');
		$this->fullPaperRevisionCount = $this->get('fullPaperRevisionCount');
		$this->paper->paper_created_by = JFactory::getUser($this->paper->paper_created_by)->name;
        $this->isThemeleader = AclHelper::isThemeleader(0,$this->linkid);

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
		
		$authorised = AclHelper::isThemeleader(0,$this->linkid);

        if (!$authorised) {
           throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'),403);
        }

        parent::display($tpl);
    }
    
}
