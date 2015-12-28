<?php
/**
 * @package     JDeveloper
 * @subpackage  JDeveloper
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
jimport("jcms.tables.csv");
use lib_jcms\tables\TableCSV as JTableCSV;

/**
 * JDeveloper master controller.
 *
 * @package     JDeveloper
 * @subpackage  JDeveloper
 */
class JDeveloperController extends JControllerLegacy
{
	/**
	 * The name of the default view
	 *
	 * @var	string
	 */
	protected $default_view = "cpanel";
	
	/**
	 * Checks whether a user can see this view.
	 *
	 * @param   string	$view	The view name.
	 *
	 * @return  boolean
	 * @since   1.6
	 */
	protected function canView($view)
	{
		$canDo	= JDeveloperHelper::getActions();
		return $canDo->get('core.admin');
	}
	
	/**
	 * Check if JCMS library is installed
	 * 
	 * @return boolean	true if library is installed, false otherwise
	 */
	public function jcmsLibrarycheck() {
		if (!JFolder::exists(JPATH_ROOT . "/libraries/jcms"))
			return false;
		
		return true;
	}
	
	/**
	 * Test function
	 *
	 * @note	Only important for developer of this component
	 */
	public function test()
	{		
		$file = JPATH_COMPONENT_ADMINISTRATOR . "/db.csv";
		$table = new JTableCSV($file, array("key", "value"));
		$table->prepend(array (
		    array("key", "value")
		));
		
		$rows = $table->getRows();
		foreach ($rows as $row) {
			foreach ($row as $value) {
				echo $value . ", ";
			}
			echo "<br>";
		}
	}

	/**
	 * Fill every folder of this component with HTML file
	 *
	 * @note	Only important for developer of this component
	 */
	public function html()
	{
		require_once JDeveloperLIB . "/archive.php";
		JDeveloperArchive::html(JPATH_COMPONENT);
		echo "HTML files created";
	}
	
	/**
	 * Method to display a view.
	 *
	 * @param   boolean			If true, the view output will be cached
	 * @param   array  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController		This object to support chaining.
	 * @since   1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{		
		$view   = $this->input->get('view', 'components');
		$layout = $this->input->get('layout', 'default');
		$id     = $this->input->getInt('id');
		$doc	= JFactory::getDocument();
		
		$doc->addScript(JURI::base()."components/com_jdeveloper/assets/js/jdeveloper.js");
		$doc->addStyleSheet(JURI::base()."components/com_jdeveloper/assets/css/jdeveloper.css");

		if (!$this->canView($view))
		{
			throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
		}

		return parent::display();
	}
}