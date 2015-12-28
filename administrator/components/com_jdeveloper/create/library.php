<?php
/**
 * @package     JDeveloper
 * @subpackage  Create.Library
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
require_once JDeveloperLIB . '/create.php';

/**
 * Basic Library Create Class
 *
 * @package     JDeveloper
 * @subpackage  Create.Library
 */
class JDeveloperCreateLibrary extends JDeveloperCreate
{	
	/**
	 * The library folder
	 *
	 * @var	string
	 */
	protected $createDir;
	
	/**
	 * The library item
	 *
	 * @var	JObject
	 */
	protected $item;
	
	/**
	 * The template header
	 *
	 * @var	string
	 */
	protected static $templateHeader;
	
	/**
	 * The constructor
	 */
	public function __construct($config = array())
	{		
		parent::__construct();

		$app = JFactory::getApplication();
		if (!isset($config['item_id']) || empty($config['item_id'])) throw new Exception($this->_name . ": No library id given");
		
		// Get plugin data
		$this->item = $this->getModel('library')->getItem($config['item_id']);
		$this->type = "lib_" . strtolower($this->item->name);
		
		// Create plugin directory
		$this->createDir = $this->item->createDir;
				
		// Set template base dirs
		$this->templateDirs[0] = JDeveloperXTD . "/templates/library";
		$this->templateDirs[1] = JDeveloperTEMPLATES . "/library";
		$this->template = $this->getTemplate();
		
		if ($this->template === false)
		{
			throw new JDeveloperException("No template found<br>" . $this->getErrors());
		}

		// Get the plugin header
		$params = JComponentHelper::getParams('com_jdeveloper');
		$header = new JDeveloperTemplate(JDeveloperTEMPLATES.DS . 'fileheader.txt');
		$header->addPlaceholders(
			array(
				'Author' => $params->get('author'),
				'Copyright' => $params->get('copyright'),
				'Extension' => ucfirst($this->item->name),
				'License' => $params->get('license'),
				'Version' => $this->item->version,
			)
		);
		self::$templateHeader = $header->getBuffer();
	}
	
	/**
	 * Check whether file should be created or not
	 *
	 * @return	boolean
	 */
	protected function condition()
	{
		return true;
	}

	/**
	 * Initialize and write files
	 */
	protected function create()
	{
		return $this->initialize()->write();
	}

	/**
	 * Execute Create Instance
	 *
	 * @param	string	$path	Path of create files
	 */
	public static function execute($config = array())
	{
		foreach (JFolder::files(JDeveloperCREATE . "/library", "php$") as $file)
		{			
			$class = JDeveloperCreate::getInstance("library." . JFile::stripExt($file), $config);
			if (!$class->create())
			{
				$errors = $class->getErrors();
				if (!empty($errors)) throw new JDeveloperException($errors);
			}
		}
		
		JDeveloperCreate::getInstance("language.library", $config)->create();
		JDeveloperCreate::getInstance("language.library.sys", $config)->create();
	}

	/**
	 * @see	JDeveloperCreate
	 */
	protected function getDefaultAreas()
	{
		$areas = array(
			"header"	=> false
		);
		
		return array_merge(parent::getDefaultAreas(), $areas);
	}

	/**
	 * @see	JDeveloperCreate
	 */
	protected function getDefaultPlaceholders()
	{
		$placeholders = array(
			'header' 	=> self::$templateHeader,
			'name' 		=> $this->item->name
		);
		
		return array_merge($placeholders, parent::getDefaultPlaceholders());
	}
	
	/**
	 * @see	JDeveloperCreate
	 */
	protected function getLanguage($name = "")
	{
		$_name = "lib_" . $this->item->name;		
		$config = array("prefix" => "LIB_" . strtoupper($this->item->name));

		if (!empty($name))
		{
			$_name .= "_" . $name;
		}
		
		return JDeveloperLanguage::getInstance($_name, $config);
	}
		
	/**
	 * @see	JDeveloperCreate
	 */
	protected function initialize()
	{
		// standart placeholders
		$this->template->addAreas($this->getDefaultAreas());
		$this->template->addPlaceHolders($this->getDefaultPlaceholders(), true);
		
		return parent::initialize();
	}
	
	/**
	 * @see	JDeveloperCreate
	 */
	protected function loadOverride($type = "", $item_id = "", $name = "")
	{
		$type = $type == "" ? "library" : $type;
		$item_id = $item_id == "" ? $this->item->id : $item_id;
		$name = $name == "" ? $this->templateFile : $name;
		
		return parent::loadOverride($type, $item_id, $name);
	}

	/**
	 * @see	JDeveloperCreate
	 */
	public function write($path = '')
	{
		if ($path == '') 
		{
			$path = $this->templateFile;
			$path = str_replace(".", DS, JFile::stripExt($path)) . "." . JFile::getExt($path);
			$path = str_replace('library', $this->item->name, $path);
			$path = str_replace('#version#', $this->item->version, $path);

			$path = $this->createDir . "/" . $path;
			$path = strtolower($path);
		}
		
		return parent::write(strtolower($path));
	}
}