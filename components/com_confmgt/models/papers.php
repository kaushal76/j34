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
 * Methods supporting a list of papers.
 */
class ConfmgtModelPapers extends JModelList
{

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see      JController
     * @since    1.6
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since    1.6
     */
    protected function populateState($ordering = null, $direction = null)
    {

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return    JDatabaseQuery
     * @since    1.6
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        //Get the current user

        $user = JFactory::getuser();

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('`#__confmgt_papers` AS a');

        // Only the papers submitted by the user
        $query->where('a.created_by =' . $user->id);

        // Only the papers which are not archieved
        $query->where('a.state =1');

        //join the themes table
        $query->select('b.title AS themename');
        $query->join('LEFT', '#__confmgt_themes AS b ON b.id=a.theme');

        $query->order('a.id ASC');

        return $query;
    }

    /**
     * Removes temporary records for abstract submissions from the papers table
     * @return boolean
     *
     * @since version 3.8.0
     */


    protected function tmpRemoveQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // Select the required fields from the table.
        $query->delete($db->quoteName('#__confmgt_papers'));
        $query->where("title = ''");
        $query->where('created_by = ' . $user->id);
        $db->setQuery($query);
        $result = $db->execute();
        return $result;
    }

    /**
     * A function to remove the temp items in the paper table before returning a list of paper items
     * @return mixed
     *
     * @since version
     */
    public function getItems()
    {

        //remove temporary papers
        $this->tmpRemoveQuery();

        return parent::getItems();
    }

    /**
     * Method to get the paper list for theme leaders
     *
     * @return ObjectList
     * @TODO re code this function with better logic for student papers
     */

    public function getLeadersItems()
    {

        //Check if student papers to be managed by the main theme leaders
        $app = JFactory::getApplication();
        $params = $app->getParams();
        $student_papers_managed_by = $params->get('student_papers_managed_by', 1);

        //remove temporary papers
        $this->tmpRemoveQuery();

        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // @todo - format the query with escape characters
        $query
            ->select('a.*')
            ->from('#__confmgt_papers as a')
            ->select('b.title as theme')
            ->join('LEFT', '#__confmgt_themes as b ON a.theme = b.id')
            ->select('COUNT(g.id) AS revisions')
            ->join('LEFT', '#__confmgt_fullpapers as g ON a.id = g.linkid')
            ->select('f.type as type')
            ->join('LEFT', '#__confmgt_submission_types as f ON a.type = f.id')
            ->select('uc.name as author')
            ->select('uc.email as email')
            ->select('COUNT(d.reviewerid) AS rev1ewers')
            ->join('LEFT', '#__users as uc ON uc.id = a.created_by')
            ->join('LEFT', $db->quoteName('#__confmgt_rev1ewers_papers', 'd') . ' ON (' . $db->quoteName('a.id') . ' = ' . $db->quoteName('d.paperid') . ')');
        // Super coordinator, hence all papers are selected
        if (AclHelper::isSuperCoordinator()) {
            //Not super coordinator and not a student coordinator,
            //hence only papers within the relevant themes
        } elseif (!AclHelper::isStudentCoordinator()) {
            $query->where('b.userid = ' . $user->id);
            // Student coordinator hence student papers and papers within the relevant themes
        } else {
            $query->where('b.userid = ' . $user->id);
            //$query->where('a.student_submission = 1 OR b.userid = '.$user->id);
        }
        // Only the papers which are not archieved
        $query->where('a.state =1');
        $query->where('a.active =1');
        $query->group('a.id');
        $query->order('a.id ASC');

        // Reset the query using our newly populated query object.
        $db->setQuery($query);

        // Load the results as a list of stdClass objects (
        $results = $db->loadObjectList();

        return $results;
    }

}
