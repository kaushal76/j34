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
 * Abstract resubmit form view class
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtViewAbstractform extends JViewLegacy {

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
		$this->linkid = $this->get('linkid');

        $this->params = $app->getParams('com_confmgt');
   		$this->form		= $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        parent::display($tpl);
    }
}
