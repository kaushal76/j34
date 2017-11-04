<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;


/**
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtViewThemes extends JViewLegacy
{
	protected $items;
    protected $params;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
        $this->params       = $app->getParams('com_confmgt');
        $this->items        = $this->get('Items');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        parent::display($tpl);
	}
}
