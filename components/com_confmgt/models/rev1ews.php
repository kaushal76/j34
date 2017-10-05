<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
defined('_JEXEC') or die;

/**
 * Model class for reviews
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */

class ConfmgtModelRev1ews extends JModelList {

    /**
     * Constructor.
     *
     * @param    array an optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

        parent::populateState($ordering, $direction);
    }

    /**
     * Method to get the paperID
     * @return bool/mixed
     * @since version 3.8.0
     */

    public function getLinkid()
    {
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'),404);
        } else {
            return $linkid;
        }
    }

    /**
     * Build an SQL query to load the Abstract Pending Review List for a Given reviewer.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getAbsrtactRvPendingListQuery() {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$sub_query = $db->getQuery(true);
		$user = JFactory::getUser();
	
		$sub_query->select(array('abstract_id'));
		$sub_query->from('#__confmgt_reviews');
		$sub_query->where('created_by = '.(int)$user->id);
		
  	    // Select the required fields from the table.
        $query->select( array('a.*', 'b.paperid as paperid', 'b.reviewerid as breviewerid', 'c.id as revid', 'c.userid as userid', 'b.last_updated as due_date'));
        $query->from('#__confmgt_papers AS a');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers_papers', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.paperid') . ')');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers', 'c') . ' ON (' . $db->quoteName('b.reviewerid') . ' = ' . $db->quoteName('c.id') . ')');
		$query->where('c.userid ='.(int)$user->id);
		$query->where('a.abstract_id NOT IN ('.$sub_query.')');
		$query->order('a.id ASC');  
		return $query;
		
	}
	
	/**
	 * Build an SQL query to load the full paper Pending Review List for a Given reviewer.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getFullpaperRvPendingListQuery() {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$sub_query = $db->getQuery(true);
		$user = JFactory::getUser();
	
		$sub_query->select(array('fullpaper_id'));
		$sub_query->from('#__confmgt_reviews');
		$sub_query->where('created_by = '.(int)$user->id);
	
		// Select the required fields from the table.
		$query->select( array('a.*', 'b.paperid as paperid', 'b.reviewerid as breviewerid', 'c.id as revid', 'c.userid as userid', 'b.last_updated as due_date'));
		$query->from('#__confmgt_papers AS a');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers_papers', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.paperid') . ')');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers', 'c') . ' ON (' . $db->quoteName('b.reviewerid') . ' = ' . $db->quoteName('c.id') . ')');
		$query->where('c.userid ='.(int)$user->id);
		$query->where('a.fullpaper_id NOT IN ('.$sub_query.')');
		$query->where('a.fullpaper_id > 0');
		$query->order('a.id ASC');
		return $query;
	
	}
	
	
	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	3.4
	 */
	protected function getListQuery() {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$user = JFactory::getUser();
	
		// Select the required fields from the table.
		$query->select( array('a.paperid AS paperid', 'a.reviewerid AS rev1ewerid', 'b.userid AS userid', 'b.last_updated AS revassigned', 'c.title as title', 'c.abstract_id as abtract', 'c.fullpaper_id as fullpaper', 'COUNT(d.id) AS reviewsposted'));
		$query->from('#__confmgt_rev1ewers_papers AS a');
		$query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers', 'b') . ' ON (' . $db->quoteName('a.reviewerid') . ' = ' . $db->quoteName('b.id') . ')');
		$query->join('LEFT', $db->quoteName('#__confmgt_papers', 'c') . ' ON (' . $db->quoteName('a.paperid') . ' = ' . $db->quoteName('c.id') . ')');
		$query->join('LEFT', $db->quoteName('#__confmgt_reviews', 'd') . ' ON (' . $db->quoteName('d.created_by') . ' = ' . $db->quoteName('b.userid') . 'AND ' . $db->quoteName('d.linkid') . ' = ' . $db->quoteName('a.paperid') . ')');
	
		$query->where('b.userid ='.(int)$user->id);
		$query->where('c.id > '.(int)0);
		$query->group ('a.paperid');
		$query->group ('a.reviewerid');
		$query->order('c.id ASC');
		return $query;
	
	}


    /**
     * Method to get the item
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
	public function getItems() {
        return parent::getItems();
    }

    /**
     * Method to get the Pending Abstract Reviews
     *
     * @return array|bool
     *
     * @since version 3.8.0
     */
    public function getAbstractItemsPending() {
		 
		$abstract_items  = $this->_getItemsAbstractRvPending();

		$return = array();
		$i=0;
		foreach ($abstract_items as $item) {
			
				$return[$i]->paperid = $item->id; 
				$return[$i]->title = $item->title;
				$return[$i]->due_date = $item->due_date;  
				$return[$i]->mode = 'Abstract';
			$i = $i+1;
		}
		
		if (!empty( $return)) {
			return $return;
		}else{
			return false;
		}						 
	}

    /**
     * Method to get Full Paper Pending Reviews
     *
     * @return array|bool
     *
     * @since version 3.8.0
     */
	public function getFullpaperItemsPending() {
			
		$fullpaper_items  = $this->_getItemsFullpaperRvPending();
	
		$return = array();
		$i=0;
		foreach ($fullpaper_items as $item) {
				
			$return[$i]->paperid = $item->id;
			$return[$i]->title = $item->title;
			$return[$i]->due_date = $item->due_date;
			$return[$i]->mode = 'Abstract';
			$return[$i]->fullpaper = $item->full_paper;
			$i = $i+1;
		}
	
		if (!empty( $return)) {
			return $return;
		}else{
			return false;
		}
	}


    /**
     * Provate method to get Pending Abstract Reviews
     * @return mixed
     *
     * @since version 3.8.0
     */
	protected function _getItemsAbstractRvPending()
	{		
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$query = $this->getAbsrtactRvPendingListQuery();
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
		
	}

    /**
     * Private method to get Pending Full Paper Reviews
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
	protected function _getItemsFullpaperRvPending()
	{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$query = $this->getFullpaperRvPendingListQuery();
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	
	}


    /**
     * Method to get completed reviews
     *
     * @param int $paperid
     * @param int $mode
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
	public function getItemsCompleted($paperid=0, $mode=0) {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$user = JFactory::getUser();
		
  	    // Select the required fields from the table. 
        $query->select( 'a.id as rev_id')
			  ->select( 'a.recommendation as recommendation')
			  ->select( 'a.author_comments as author_comments')
			  ->select( 'a.leader_comments as leader_comments')
			  ->select( 'a.score as score')
			  ->select( 'a.last_updated as last_updated')
			  ->select( 'a.mode as mode')
			  ->select( 'a.linkid as rev_linkid')
			  ->select( 'a.created_by as created_by')
			  ->select( 'b.*'); 		
        $query->from('#__confmgt_reviews AS a');
		$query->join('INNER', $db->quoteName('#__confmgt_papers', 'b') . ' ON (' . $db->quoteName('a.linkid') . ' = ' . $db->quoteName('b.id') . ')');
		$query->where('a.created_by ='.(int)$user->id);
		
		if ($paperid > 0) {
			$query->where('a.paperid = '.(int)$paperid);
		} 
		
		if ($mode) {
			$query->where('a.mode = '.(string)$mode);
		}
		
		$query->order('a.linkid ASC'); 
		$db->setQuery($query);
		$results = $db->loadObjectList();
		if (!empty($results)) {
			return $results;
		}else{
			return false; 
		}							 
	}
}
