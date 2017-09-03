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
 * View class for Authors for a given paper
 */
class ConfmgtViewAuthors extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;
	protected $linkid;

	/**
	 * @since version 3.8.0
	 * Function to Display the view
	 */
	public function display($tpl = null)
	{
        $this->state		= $this->get('State');
        $this->items		= $this->get('Items');
		$this->linkid		= $this->get('Linkid');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
		
		// Check if the user is an author for the paper
		$authorised  = AclHelper::isAuthor($this->linkid);
		
		if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        	}

        parent::display($tpl);
	}
    	
}
