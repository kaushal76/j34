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
 * @since version 3.8.0
 * ACL helper class for the confmgt. Using a specific ACL for the component as the Joomla ACL does not serve the purpose
 * This class has methods to check authorisations and retrieve commonly used datasets
 */
abstract class AclHelper
{
    /**
     * Check if the logged in user is the author for the given paper id
     * @since v3.8.0
     * @return boolean
     */

    public static function isAuthor($paperid = 0)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        if ($user->id == 0) {
            return false;
        }
        //Build the query 
        $query = $db->getQuery(true)
            ->select($db->quoteName('created_by'))
            ->from($db->quoteName('#__confmgt_papers'))
            ->where('id = ' . (int)$paperid);
        // get the number of records
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the logged in user a theme leader for the given theme or a paper
     * @param int $themeid
     * @param int $paperid
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public static function isThemeleader($themeid = 0, $paperid = 0)
    {

        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();

        if (self::isSuperCoordinator()) {
            return true;
        }

        if ($user->id == 0) {
            return false;
        }
        if ($paperid == 0 && $themeid == 0) {
            // No paperid given or themeid, hence checking if any of the theme leaders
            $query = $db->getQuery(true)
                ->select('userid')
                ->from($db->quoteName('#__confmgt_themes'))
                ->where('userid = ' . (int)$user->id);
        } else {
            //paperid and/or themeid given
            $query = $db->getQuery(true);
            $query->select($db->quoteName(array(
                'a.theme',
                'a.id',
                'b.userid',
                'b.id'
            )));
            $query->from($db->quoteName('#__confmgt_papers', 'a'));
            $query->join('INNER', $db->quoteName('#__confmgt_themes', 'b') . ' ON (' . $db->quoteName('a.theme') . ' = ' . $db->quoteName('b.id') . ')');
            $query->where('b.userid = ' . (int)$user->id);
            if ($paperid) {
                $query->where('a.id = ' . (int)$paperid);
            }
            if ($themeid) {
                $query->where('b.id = ' . (int)$themeid);
            }
        }
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Function to check if the logged in user is a Student Paper Coordinator
     * @param int $paperid
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public static function isStudentCoordinator()
    {

        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();

        //Build the query 
        $query = $db->getQuery(true);

        if (self::isSuperCoordinator()) {
            return true;
        }

        $query->select($db->quoteName(array(
            'a.userid',
            'a.themeid',
        )));
        $query->from($db->quoteName('#__confmgt_coordinators', 'a'));
        $query->where('a.userid = ' . (int)$user->id);
        $query->where('a.themeid = 0');

        // get the number of records
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Function to check if the logged in user is a Super Coordinator
     * @return bool
     *
     * @since version 3.8.0
     */

    public static function isSuperCoordinator()
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        if ($user->id == 0) {
            return false;
        }

        if (!(isset($user->groups[8]) || isset($user->groups[7]))) {
            return false;
        }
        //Build the query
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array(
            'a.userid',
            'a.themeid',
        )));
        $query->from($db->quoteName('#__confmgt_coordinators', 'a'));
        $query->where('a.userid = ' . (int)$user->id);
        $query->where('a.themeid = -1');

        // get the number of records
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Function to check if a given paper is a student submission
     * @param int $paperid
     *
     * @return bool
     *
     * @since version 3.8.0
     */

    public static function isStudentPaper($paperid = 0)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        if ($user->id == 0) {
            return false;
        }

        $query = $db->getQuery(true)
            ->select($db->quoteName(array('a.id','a.student_submission')))
            ->from($db->quoteName('#__confmgt_papers', 'a'))
            ->where('a.id ='.(int)($paperid))
            ->where('a.student_submission =0');

        // get the number of records
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Function to check if the logged in user is a reviewer generally (paperid = 0) or for a given paper (paperid >0)
     * @param int $paperid
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public static function isRev1ewer($paperid = 0)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        if ($user->id == 0) {
            return false;
        }
        if ($paperid == 0) {
            //Build the query 
            $query = $db->getQuery(true)
                ->select($db->quoteName(array('a.id', 'a.userid', 'a.agreed')))
                ->from($db->quoteName('#__confmgt_rev1ewers', 'a'))
                ->where('a.userid = ' . (int)$user->id)
                ->where('a.agreed = 1');
        }
        else {
            //Build the query 
            $query = $db->getQuery(true)
                ->select($db->quoteName(array('a.reviewerid', 'a.paperid', 'b.agreed', 'b.userid', 'c.id')))
                ->from($db->quoteName('#__confmgt_rev1ewers_papers', 'a'))
                ->join('INNER', $db->quoteName('#__confmgt_rev1ewers', 'b') . ' ON (' . $db->quoteName('a.reviewerid') . ' = ' . $db->quoteName('b.id') . ')')
                ->join('INNER', $db->quoteName('#__users', 'c') . ' ON (' . $db->quoteName('b.userid') . ' = ' . $db->quoteName('c.id') . ')')
                ->where('c.id = ' . (int)$user->id)
                ->where('a.paperid = ' . (int)$paperid)
                ->where('b.agreed = 1');
        }
        // get the number of records
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Function to get the theme for a given paper
     * @param int $paperid
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */

    public static function getTheme($paperid = 0)
    {
        if ($paperid == 0)
        {
            return false;
        }
        //Obtain a database connection
        $db = JFactory::getDbo();

        //Build the query
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('a.theme', 'a.id', 'b.userid', 'b.id', 'b.title')));
        $query->from($db->quoteName('#__confmgt_papers', 'a'));
        $query->join('INNER', $db->quoteName('#__confmgt_themes', 'b') . ' ON (' . $db->quoteName('a.theme') . ' = ' . $db->quoteName('b.id') . ')');
        $query->where('a.id = ' . (int)$paperid);

        $db->setQuery($query);
        $row = $db->loadObject();
        if ($row) {
            return $row;
        }
        else {
            return false;
        }
    }

    /**
     * Function to get userid by entering the email
     * @param $email
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public static function getUserID($email)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('id, email')
            ->from($db->quoteName('#__users'))
            ->where($db->quoteName('email') . ' = ' . $db->quote($email));
        //Prepare the query
        $db->setQuery($query);
        // Load the row.
        $row = $db->loadObject();
        if ($row) {
            return $row->id;
        }
        else {
            return false;
        }
    }

    /**
     * Function to get Reviewer ID by email
     * @param $email
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public static function getRev1ewerID($email)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select($db->quoteName(array('a.id', 'a.userid', 'a.email', 'a.agreed')))
            ->from($db->quoteName('#__confmgt_rev1ewers', 'a'))
            ->where($db->quoteName('email') . ' = ' . $db->quote($email));
        //Prepare the query
        $db->setQuery($query);
        $row = $db->loadObject();
        if ($row) {
            return $row;
        }
        else {
            return false;
        }
    }

    /**
     * Function to get the number of reviewers for a given paper
     * @param $paperid
     *
     * @return bool|int
     *
     * @since version 3.8.0
     */
    public static function getNumofRev1ewers($paperid)
    {
        //Obtain a database connection
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select($db->quoteName(array('a.id', 'a.userid', 'a.email', 'a.agreed')))
            ->from($db->quoteName('#__confmgt_rev1ewers_papers', 'a'))
            ->where($db->quoteName('paperid') . ' = ' . (int)($paperid));
        //Prepare the query
        $db->setQuery($query);
        $db->execute();
        $num_rows = $db->getNumRows();
        if ($num_rows > 0) {
            return $num_rows;
        }
        else {
            return false;
        }
    }

    /**
     * Get authors for a given paper
     * @param int $paperid
     *
     * @return bool|mixed
     *
     * @since version 3.8.0
     */
    public static function getAuthors($paperid = 0)
    {
        if ($paperid ==0)
        {
            return false;
        }

        //Obtain a database connection
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName(array(
            'a.title',
            'a.firstname',
            'a.surname',
            'a.email',
            'a.linkid',
            'a.institution',
            'a.country',
            'a.ordering'
        )));
        $query->from($db->quoteName('#__confmgt_authors', 'a'));
        $query->where('a.linkid = ' . (int)$paperid);
        $query->order('a.ordering ASC');

        // get the number of records
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        if ($rows) {
            return $rows;
        }
        else {
            return false;
        }
    }
}
