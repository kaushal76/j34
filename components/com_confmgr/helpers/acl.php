<?php

/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * @desc		Abstract ACL helper class for the confmgt. Using a specific ACL for the component as the Joomla ACL does not serve the purpose
 * @package     Confmgr
 * @subpackage  Helpers
 */

abstract class AclHelper
{
	
	/**
	 * @desc		Method to check if the logged in user the author for a given paper id
	 * @param		int $paperid
	 * @return		boolean 
	 */
	
	public static function isAuthor($paperid = 0)
	{
		if (!$paperid ==0)
		{
			//Get the current user object
			$user = JFactory::getUser();
			
			//Obtain a database connection
			$db   = JFactory::getDbo();

			if ($user->id == 0) 
			{
				return FALSE;
			}
			
			//Build the query
			$query = $db->getQuery(true)	
			->select($db->quoteName('created_by'))
			->from($db->quoteName('#__confmgr_paper'))
			->where('id = ' . (int) $paperid);
				
			try
			{
				$db->setQuery($query);
				$result = $db->getNumRows();
				// If it fails, it will throw a RuntimeException
			}
			catch (RuntimeException $e)
			{
				throw new Exception($e->getMessage());
			}
			
			if ($result > 0) 
			{
				return TRUE;
			
			} 
			else 
			{
				return FALSE;
			}
		}
		else //No paper id given, hence only check if the user logged in. All logged in users can be authors
		{
			if ($user->guest)
			{
				return FALSE;
			}
			else 
			{
				return TRUE;
			}
			
		}
	}
	
	/**
	 * 
	 * @param number $themeid
	 * @param number $paperid
	 * @return boolean
	 * @todo Update to meet the new database schema @author Kaushal
	 */

	public static function isThemeleader($themeid = 0, $paperid = 0)
	{

		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false;
		} //$user->id == 0
		if ($paperid == 0 && $themeid == 0) {
			if (self::isStudentCoordinator()) {
				return true;
			}
				
			if (self::isSuperCoordinator()) {
				return true;
			}
			// - no paper id given, hence checking if any of the theme leaders
			//Build the query
			$query = $db->getQuery(true)->select('userid')->from($db->quoteName('#__confmgr_theme'))->where('userid = ' . (int) $user->id);
		} //$paperid == 0 && $themeid == 0
		else {
			//- paper id given, hence checking if the themeleader for the given paper
			//Build the query
			$query = $db->getQuery(true);
			$query->select($db->quoteName(array(
					'a.theme',
					'a.id',
					'b.userid',
					'b.id'
			)));
			$query->from($db->quoteName('#__confmgr_paper', 'a'));
			$query->join('INNER', $db->quoteName('#__confmgt_themes', 'b') . ' ON (' . $db->quoteName('a.theme') . ' = ' . $db->quoteName('b.id') . ')');
			$query->where('b.userid = ' . (int) $user->id);
			if ($paperid) {
				if (self::isSuperCoordinator()) {
					return true;
				}elseif (self::isStudentPaper($paperid)) {
					if (self::isStudentCoordinator()) {
						return true;
					}
				}else{
					$query->where('a.id = ' . (int) $paperid);
				}

			} //$paperid
			if ($themeid) {
				if (self::isSuperCoordinator()) {
					return true;
				}else{
					$query->where('b.id = ' . (int) $themeid);
				}
			} //$themeid
		}
		// get the number of records
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return true;
		} //$num_rows > 0
		else {
			return false;
		}
	}

	/**
	 * @desc function to check if the logged in user is a Student Paper Coordinator
	 * @return boolean
	 * @todo Update to meet the new database schema
	 */
	
	public static function isStudentCoordinator()
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false;
		}

		if (self::isSuperCoordinator()) {
			return true;
		}
		//Build the query
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array(
				'a.userid',
				'a.themeid',
		)));
		$query->from($db->quoteName('#__confmgt_coordinators', 'a'));
		$query->where('a.userid = ' . (int) $user->id);
		$query->where('a.themeid = 0');
		// get the number of records
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return true;
		} //$num_rows > 0
		else {
			return false;
		}
	}

	/**
	 * @desc function to check if the logged in user is a Super Coordinator
	 * @return boolean
	 * @todo Update to meet the new database schema
	 */
	public static function isSuperCoordinator()
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false; 
		}

		if(!(isset($user->groups[8]) || isset($user->groups[7]))){
			return false;
		}
		//Build the query
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array(
				'a.userid',
				'a.themeid',
		)));
		$query->from($db->quoteName('#__confmgt_coordinators', 'a'));
		$query->where('a.userid = ' . (int) $user->id);
		$query->where('a.themeid = -1');
		// get the number of records
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return true;
		} //$num_rows > 0
		else {
			return false;
		}
	}
	
	/**
	 * @desc Method to check if a paper is a student submission
	 * @param int $paperid
	 * @return boolean
	 * @todo Update to meet the new database schema
	 */

	public static function isStudentPaper($paperid)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false;
		} //$user->id == 0

		$query = $db->getQuery(true)->select($db->quoteName(array(
				'a.id',
				'a.student_submission'
		)))->from($db->quoteName('#__confmgt_papers', 'a'));

		// get the number of records
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return true;
		} //$num_rows > 0
		else {
			return false;
		}
	}
	
	/**
	 * @desc method to check if the logged in user is a reviewer for a given paper
	 * @param number $paperid
	 * @return boolean
	 * @todo Update to meet the new database schema
	 */

	public static function isRev1ewer($paperid = 0)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false;
		} //$user->id == 0
		if ($paperid == 0) {
			//Build the query
			$query = $db->getQuery(true)->select($db->quoteName(array(
					'a.id',
					'a.userid',
					'a.agreed'
			)))->from($db->quoteName('#__confmgt_rev1ewers', 'a'))->where('a.userid = ' . (int) $user->id)->where('a.agreed = 1');
		} //$paperid == 0
		else {
			//Build the query
			$query = $db->getQuery(true)->select($db->quoteName(array(
					'a.reviewerid',
					'a.paperid',
					'b.agreed',
					'b.userid',
					'c.id'
			)))->from($db->quoteName('#__confmgt_rev1ewers_papers', 'a'))->join('INNER', $db->quoteName('#__confmgt_rev1ewers', 'b') . ' ON (' . $db->quoteName('a.reviewerid') . ' = ' . $db->quoteName('b.id') . ')')->join('INNER', $db->quoteName('#__users', 'c') . ' ON (' . $db->quoteName('b.userid') . ' = ' . $db->quoteName('c.id') . ')')->where('c.id = ' . (int) $user->id)->where('a.paperid = ' . (int) $paperid)->where('b.agreed = 1');
		}
		// get the number of records
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return true;
		} //$num_rows > 0
		else {
			return false;
		}
	}
	
	/**
	 * @desc method to get the theme for a given paper
	 * @param number $paperid
	 * @return mixed|boolean
	 * @todo Update to meet the new database schema
	 */

	public static function getTheme($paperid = 0)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();

		//Build the query
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array(
				'a.theme',
				'a.id',
				'b.userid',
				'b.id',
				'b.title'
		)));
		$query->from($db->quoteName('#__confmgt_papers', 'a'));
		$query->join('INNER', $db->quoteName('#__confmgt_themes', 'b') . ' ON (' . $db->quoteName('a.theme') . ' = ' . $db->quoteName('b.id') . ')');
		
		//- paper id given, hence checking if the themeleader for the given paper
		if ($paperid) {
			$query->where('a.id = ' . (int) $paperid);
		} //$paperid

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
	 * @desc method to get userid by entering the email
	 * @param unknown $email
	 * @return boolean
	 * @todo Update to meet the new database schema
	 */
	
	public static function getUserID($email)
	{
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		$query = $db->getQuery(true)->select('id, email')->from($db->quoteName('#__users'))->where($db->quoteName('email') . ' = ' . $db->quote($email));
		//Prepare the query
		$db->setQuery($query);
		// Load the row.
		$row = $db->loadObject();
		if ($row) {
			return $row->id;
		} //$row
		else {
			return false;
		}
	}
	
	/**
	 * @desc method to get Reviewer ID by email
	 * @param unknown $email
	 * @return mixed|boolean
	 * @todo Update to meet the new database schema
	 */
	public static function getRev1ewerID($email)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		//Build the query
		$query = $db->getQuery(true)->select($db->quoteName(array(
				'a.id',
				'a.userid',
				'a.email',
				'a.agreed'
		)))->from($db->quoteName('#__confmgt_rev1ewers', 'a'))->where($db->quoteName('email') . ' = ' . $db->quote($email));
		//Prepare the query
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
	 * @desc method to get the number of reviewers for a given paper
	 * @param unknown $paperid
	 * @return boolean|number
	 * @todo Update to meet the new database schema
	 */
	
	public static function getNumofRev1ewers($paperid)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();
		if ($user->id == 0) {
			return false;
		} //$user->id == 0
		//Build the query
		$query = $db->getQuery(true)->select($db->quoteName(array(
				'a.id',
				'a.userid',
				'a.email',
				'a.agreed'
		)))->from($db->quoteName('#__confmgt_rev1ewers_papers', 'a'))->where($db->quoteName('paperid') . ' = ' . (int) ($paperid));
		//Prepare the query
		$db->setQuery($query);
		$db->execute();
		$num_rows = $db->getNumRows();
		if ($num_rows > 0) {
			return $num_rows;
		} //$num_rows > 0
		else {
			return false;
		}
	}
	/**
	 * @desc method to get authors for a given paper
	 * @param number $paperid
	 * @return mixed|boolean
	 */
	
	public static function getAuthors($paperid = 0)
	{
		//Obtain a database connection
		$db   = JFactory::getDbo();
		$user = JFactory::getUser();

		//- paper id given, hence checking if the themeleader for the given paper
		//Build the query
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array(
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
		if ($paperid) {
			$query->where('a.linkid = ' . (int) $paperid);
			$query->order('a.ordering ASC');
		} //$paperid

		// get the number of records
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		if ($rows) {
			return $rows;
		} //$row
		else {
			return false;
		}
	}
}
