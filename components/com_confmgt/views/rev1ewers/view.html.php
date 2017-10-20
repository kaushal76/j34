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
 * View class for the reviewers list
 *
 * @since version 3.8.0
 */

class ConfmgtViewRev1ewers extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;
	protected $linkid;

    /**
     * @param null $tpl
     * Method to display
     *
     * @since version 3.8.0
     * @throws Exception
     */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
        
        $this->state		= $this->get('State');
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
		$this->leader		= $this->get('Leader');
        $this->params       = $app->getParams('com_confmgt');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }

        parent::display($tpl);
	}

}
