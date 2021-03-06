<?php
/**
 * @package     JDeveloper
 * @subpackage  Create.Table
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JDeveloperLoader::import("table", JDeveloperCREATE);;

/**
 * Table Create Class
 *
 * @package     JDeveloper
 * @subpackage  Create.Table
 */
class JDeveloperCreateTableAdminTmplPluralDefault_Batch extends JDeveloperCreateTable
{		
	/**
	 * The template file
	 *
	 * @var	string
	 */
	protected $templateFile = "admin.views.plural.tmpl.default_batch.php";
}