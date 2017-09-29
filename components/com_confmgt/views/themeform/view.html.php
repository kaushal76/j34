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
 * @package     ${NAMESPACE}
 *
 * @since version View class for the theme form
 */

class ConfmgtViewThemeform extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Method to display the view
     *
     * @param null $tpl
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        $this->state = $this->get('State');
        $this->item = $this->get('Data');

        $this->params = $app->getParams('com_confmgt');
   		$this->form		= $this->get('Form');
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
		$authorised = AclHelper::isThemeleader();

        if (!$authorised) {
           throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }

        parent::display($tpl);
    }
}
