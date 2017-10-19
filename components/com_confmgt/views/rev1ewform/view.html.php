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
 * View class for the Review form
 *
 * @since version 3.8.0
 */

class ConfmgtViewRev1ewform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * @param null $tpl
     * Method to display the review form
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
		$this->paper = $this->get('Paper');
        $this->linkid = $this->get('Linkid');
   		$this->form	= $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
		$authorised = AclHelper::isRev1ewer($this->linkid);

        if (!$authorised) {
           throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }

        parent::display($tpl);
    }
}
