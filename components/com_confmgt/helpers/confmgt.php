<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
defined('_JEXEC') or die;

/**
 * Abstract helper class for common methods
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
abstract class MainHelper
{
    /**
     * Method to get the paperID
     * @return bool/mixed
     * @since version 3.8.0
     */

    public static function getLinkid()
    {
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'), 404);
        } else {
            return $linkid;
        }
    }

    /**
     * Method to get reviewers for a given paper (optional) or a given mode (optional)
     * @param int $paperid
     * @param int $mode
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public static function getRev1ews($paperid = 0, $mode = 0)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();

        //Paper id given, hence checking if the themeleader for the given paper
        //Build the query
        $query = $db->getQuery(true);
        $query->select('a.*');
        $query->from($db->quoteName('#__confmgt_reviews', 'a'));
        if ($paperid) {
            $query->where('a.linkid = ' . (int)$paperid);
            if ($mode) {
                $query->where('a.mode = ' . "'" . $mode . "'");
            }
            $query->order('a.id ASC');
        }

        // get the number of records
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        if ($rows) {
            return $rows;
        } else {
            return false;
        }
    }

    /**
     * Method to get a paper for a given paper ID
     *
     * @param int $paperid
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public static function getPaper($paperid = 0)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();

        //- paper id given, hence checking if the themeleader for the given paper
        //Build the query
        $query = $db->getQuery(true);
        $query->select('a.*')
            ->select($db->quoteName('b.user_id', 'leaderid'))
            ->select($db->quoteName('b.id', 'themeid'))
            ->select($db->quoteName('b.title', 'themename'))
            ->select($db->quoteName('c.full_review_outcome', 'c.full_review_outcome'))
            ->select($db->quoteName('c.full_review_comments', 'full_review_comments'))
            ->select($db->quoteName('d.abstract_review_outcome', 'abstract_review_outcome'))
            ->select($db->quoteName('d.abstract_review_comments', 'abstract_review_comments'));
        $query->from($db->quoteName('#__confmgt_papers', 'a'));
        $query->join('LEFT', $db->quoteName('#__confmgt_themes', 'b') . ' ON (' . $db->quoteName('a.theme') . ' = ' . $db->quoteName('b.id') . ')');
        $query->join('LEFT', $db->quoteName('#__confmgt_abstracts', 'd') . ' ON (' . $db->quoteName('a.abstract_id') . ' = ' . $db->quoteName('d.id') . ')');
        $query->join('LEFT', $db->quoteName('#__confmgt_fullpapers', 'c') . ' ON (' . $db->quoteName('a.fullpaper_id') . ' = ' . $db->quoteName('c.id') . ')');
        $query->where('a.id = ' . (int)$paperid);

        // get the number of records
        $db->setQuery($query);
        $row = $db->loadObject();
        if ($row) {
            return $row;
        } //$row
        else {
            return false;
        }
    }

    /**
     * Method to get Authors for a given paper
     *
     * @param int $paperid
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
    public static function getAuthors($paperid = 0)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $user = JFactory::getUser();


        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('`#__confmgt_authors` AS a');

        if (!$paperid == 0) {
            $query->where('linkid =' . $paperid);
        } else {
            self::getLinkid();
        }
        $query->order('a.ordering ASC');
        $db->setQuery($query);

        // Load the row.
        $rows = $db->loadObjectlist();
        return $rows;

    }

    /**
     * Method to count full papers submitted for a given paper
     *
     * @param int $paperid
     *
     * @return int
     *
     * @since version 3.8.0
     */
    public static function getFullPaperRevisionCount($paperid = 0)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('a.*');
        $query->from('`#__confmgt_fullpaper` AS a');

        if (!$paperid == 0) {
            $query->where('linkid =' . $paperid);
        } else {
            self::getLinkid();
        }
        $query->order('a.ordering ASC');
        $db->setQuery($query);

        $rows = $db->getNumRows();
        return $rows;

    }


    /**
     * Method to get reviewers for the given paper
     *
     * @param int $paperid
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
    public static function getRev1ewers($paperid = 0)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('`#__confmgt_rev1ewers_papers` AS a');
        $query->select(array('b.id AS revid', 'b.surname AS revsurname', 'b.title as revtitle', 'b.firstname as revfirstname'));
        $query->join('LEFT', '#__confmgt_rev1ewers AS b ON b.id=a.reviewer_id');
        if (!$paperid == 0) {
            $query->where('a.paper_id =' . $paperid);
        } else {
            self::getLinkid();
        }
        $query->order('a.reviewer_id ASC');

        $db->setQuery($query);

        $rows = $db->loadObjectlist();
        return $rows;

    }

    /**
     * A method to load all the users
     *
     * @return mixed
     *
     * @since version 3.8.0
     */

    public static function getUsers()
    {
        $db = JFactory::getDBO();
        $query = "SELECT * FROM #__users";
        $db->setQuery($query);

        $rows = $db->loadObjectList();
        return $rows;
    }

    /**
     * Method to get a reviewer by reviewer ID
     *
     * @param int $revid
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public static function getRev1ewer($revid = 0)
    {
        if ($revid == 0) {
            JFactory::$application->enqueueMessage('No Reviewer selected', 'error');
            return false;
        }

        $db =& JFactory::getDBO();
        $query = $db->getQuery(true);
        $query
            ->select('a.*')
            ->select('COUNT(b.reviewer_id) AS papers');
        $query->from($db->quoteName('#__confmgt_rev1ewers', 'a'));
        $query->join('LEFT', $db->quoteName('#__confmgt_rev1ewers_papers', 'b') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('b.reviewer_id') . ')');
        $query->where('a.id = ' . $revid);
        $query->group('a.id');
        $query->order('a.ordering ASC');
        $db->setQuery($query);
        $row = $db->loadObject();
        if ($row) {
            return $row;
        }
        else {
            return false;
        }
    }
}


