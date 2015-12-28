<?php
/**
 * @package     JDeveloper
 * @subpackage  Create.Library
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JDeveloperLoader::import("module", JDeveloperCREATE);

/**
 * Library Create Class
 *
 * @package     JDeveloper
 * @subpackage  Create.Libray
 */
class JDeveloperCreateLibraryBase extends JDeveloperCreateLibrary
{		
	/**
	 * The template file
	 *
	 * @var	string
	 */
	protected $templateFile = "library.php";
}