<?php
/**
 * @package     JDeveloper
 * @subpackage  Controllers
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JDeveloperLoader::import("controllers.list");

/**
 * JDeveloper Libraries Controller
 *
 * @package     JDeveloper
 * @subpackage  Controllers
 */
class JDeveloperControllerLibraries extends JDeveloperControllerList
{
	/**
	 * The URL view list variable.
	 *
	 * @var    string
	 * @since  12.2
	 */
	protected $view_list = "libraries";
	
	/**
	 * The item model name
	 *
	 * @var    string
	 * @since  12.2
	 */
	protected $model_item = "library";
	
	/**
	 * Create ZIP file of libraries
	 *
	 * @param	array	$ids	The primary keys of the items
	 */
	public function create($ids = array())
	{
		// Initialize
		$user = JFactory::getUser();
		$app = JFactory::getApplication();
		$this->setRedirect(JRoute::_('index.php?option=com_jdeveloper&view=library', false));

		empty($ids) ? $ids = $app->input->get('cid', array(), 'array') : null;
		
		// Check access
		if (!$user->authorise('libraries.create', 'com_jdeveloper'))
		{
			$this->setMessage(JText::_('COM_JDEVELOPER_ACTION_NOT_ALLOWED'), 'warning');
			return;
		}

		// Load classes
		JDeveloperLoader::import('archive');
		JDeveloperLoader::import('template');
		JDeveloperLoader::import('library', JDeveloperCREATE);
		jimport('joomla.filesystem.folder');

		// Create library for each id
		foreach ($ids as $id)
		{
			$library = $this->getModel()->getItem($id);
			$path = $library->createDir;
			
			// Delete old archive if exists
			(JFile::exists($path.'.zip')) ? JFile::delete($path.'.zip') : null;
			
			// Create library
			try {
				JDeveloperCreateLibrary::execute(array("item_id" => $id));
			}
			catch (Exception $e) {
				$this->setMessage($e->getMessage(), "error");
				return;
			}
			
			// Create HTML files for each folder, zip the folder and delete the folder
			JDeveloperArchive::html($path);
			
			// Create ZIP archive and delete folder
			JDeveloperArchive::zip($path);
			JFolder::delete($path);
		}

		$this->setMessage(JText::sprintf('COM_JDEVELOPER_LIBRARY_MESSAGE_ZIP_CREATED', count($ids)));
	}	

	/**
	 * Delete ZIP files of libraries
	 */
	public function deletezip()
	{
		require_once JDeveloperLIB . "/archive.php";
		
		// Check access
		$user = JFactory::getUser();
		$this->setRedirect(JRoute::_('index.php?option=com_jdeveloper&view=library', false));
		
		if (!$user->authorise('libraries.deletezip', 'com_jdeveloper'))
		{
			$this->setMessage(JText::_('COM_JDEVELOPER_ACTION_NOT_ALLOWED'), 'warning');
			return;
		}

		$app = JFactory::getApplication();
		$ids = $app->input->get('cid', array(), 'array');
		
		foreach ($ids as $id)
		{
			$library = $this->getModel()->getItem($id);
			$files = JDeveloperArchive::getVersions("lib_", $library->name);
			
			foreach ($files as $file)
			{
				JFile::delete($library->createDir . ".zip");
			}
		}
		
		$this->setMessage(JText::sprintf('COM_JDEVELOPER_LIBRARY_MESSAGE_ZIP_DELETED', count($ids)));
	}

	/**
	 * Install libraries
	 */
	public function install()
	{
		// Check access
		$user = JFactory::getUser();
		$this->setRedirect(JRoute::_('index.php?option=com_jdeveloper&view=library', false));
		
		if (!$user->authorise('libraries.install', 'com_jdeveloper'))
		{
			$this->setMessage(JText::_('COM_JDEVELOPER_ACTION_NOT_ALLOWED'), 'warning');
			return;
		}
		
		// Initialize
		jimport('joomla.filesystem.folder');
		require_once JDeveloperLIB . '/install.php';
		
		$app = JFactory::getApplication();
		$ids = $app->input->get('cid', array(), 'array');
		
		// Install modules
		foreach ($ids as $id)
		{
			$library = $this->getModel()->getItem($id);
			$path = $library->createDir . '.zip';
			$this->create(array($id));
			
			if (JDeveloperInstall::isInstalled('library', $library->name))
			{
				JDeveloperInstall::install($path, true);
			}
			else
			{
				JDeveloperInstall::install($path);
			}
		}
		
		$this->setMessage(JText::sprintf('COM_JDEVELOPER_LIBRARY_MESSAGE_INSTALLED', count($ids)));
	}

	/**
	 * Uninstall libraries
	 */
	public function uninstall()
	{
		// Check access
		$user = JFactory::getUser();
		$this->setRedirect(JRoute::_('index.php?option=com_jdeveloper&view=library', false));
		
		if (!$user->authorise('libraries.uninstall', 'com_jdeveloper'))
		{
			$this->setMessage(JText::_('COM_JDEVELOPER_ACTION_NOT_ALLOWED'), 'warning');
			return;
		}
		
		// Initialize
		require_once JDeveloperLIB.DS. 'install.php';
		
		$app = JFactory::getApplication();
		$ids = $app->input->get('cid', array(), 'array');
		
		// Uninstall modules
		foreach ($ids as $id)
		{
			$library = $this->getModel()->getItem($id);
			JDeveloperInstall::uninstall("library", $library->name);
		}
		
		$this->setMessage(JText::sprintf('COM_JDEVELOPER_LIBRARY_MESSAGE_UNINSTALLED', count($ids)));
	}
}