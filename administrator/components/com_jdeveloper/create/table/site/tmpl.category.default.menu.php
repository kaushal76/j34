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
class JDeveloperCreateTableSiteTmplCategoryDefaultMenu extends JDeveloperCreateTable
{		
	/*
	 * Look for language keys in the template and add them
	 *
	 * @var	boolean
	 */
	protected $getLangKeys = true;

	/**
	 * The template file
	 *
	 * @var	string
	 */
	protected $templateFile = "site.views.category.tmpl.default.xml";

	/**
	 * Check whether file should be created or not
	 *
	 * @return	boolean
	 */
	protected function condition()
	{
		return $this->table->jfields['catid'];
	}
	
	protected function initialize()
	{
		$name = strtoupper($this->component->name);
		$this->addLanguageKeys(array("COM_" . $name . "_CATEGORY_VIEW_DEFAULT_TITLE", "COM_" . $name . "_CATEGORY_VIEW_DEFAULT_DESC"), "sys");
		return parent::initialize();
	}
}