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
 * @package CONFMGT
 * View class for the reviewer form
 *
 * @since version 3.8.0
 */
class ConfmgtViewRev1ewerform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
	protected $formnotification;
	protected $row;
    protected $params;

    /**
     * @param null $tpl
     * Method to display
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
		$this->row = $this->get('Row');

        $this->params = $app->getParams('com_confmgt');
   		$this->form		= $this->get('Form');
		$this->formnotification = $this->get('FormNotification');
   		

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }     
        $authorised = AclHelper::isThemeleader();

        if (!$authorised)
        {
            throw new Exception('Not Authorised', 403);
        }

        parent::display($tpl);
    }
    
}
