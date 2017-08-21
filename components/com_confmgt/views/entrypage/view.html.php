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
 * Entry page view class
 */

class ConfmgtViewEntrypage extends JViewLegacy {

    protected $role;
    protected $sitename;

    /**
     * Display the view
     */
    public function display($tpl = null) {

        $user	= JFactory::getUser();
		$config = JFactory::getConfig();
		
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
		$this->form	= $this->get('Form');
		$this->regform = $this->get('RegForm');
		
		// check the user's role and define role as an array; 
		$this->role = array();	
		
		// if the user is logged in by default the user is an author
		$this->role['isAuthor'] = ($user->id > 0);
		
		// if the user is assigned as a themeleader in the backend, 
		// he is to be authenticated as a theme leader
		$this->role['isThemeleader'] = AclHelper::isThemeleader();
		
		// if the user has been invited (and agreed) to be a reviewer,
		// he needs to be authenticate as a reviewer
		$this->role['isRev1ewer'] = AclHelper::isRev1ewer();
			
		// get the sitename to make a part of the heading
		$this->sitename = $config->get('sitename' );

        parent::display($tpl);
    }

}
