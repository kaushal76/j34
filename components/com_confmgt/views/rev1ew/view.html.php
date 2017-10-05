<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * View class for the review
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */

class ConfmgtViewRev1ew extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
		$this->paper = $this->get('Paper');
		
		if ($this->item->linkid < 1)
		{
			$this->linkid = $this->get('linkid');
		}else{
			$this->linkid = $this->item->linkid;
		}

        $this->params = $app->getParams('com_confmgt');
   		$this->form		= $this->get('Form');
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
		$authorised = AclHelper::isRev1ewer($this->linkid);

        if (!$authorised) {
            throw new Exception('Not Authorised',403);
        }

        parent::display($tpl);
    }
}
