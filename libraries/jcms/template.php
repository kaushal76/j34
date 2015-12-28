<?php
/**
 * @package     JCMS
 * @subpackage  template
 * 
 * @author		Tilo-Lars Flasche
 * @copyright	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */
namespace lib_jcms\template;

defined ("_JEXEC") or die ();

jimport ("joomla.filesystem.file");

use \JFile as JFile;

/**
 * Class for handling template files
 */
class Template {
	/**
	 * The areas
	 *
	 * @var array<string => boolean>
	 */
	protected $areas = array ();
	
	/**
	 * The replaced content
	 *
	 * @var string
	 */
	protected $buffer = '';
	
	/**
	 * The template path
	 *
	 * @var string
	 */
	public $path = '';
	
	/**
	 * The template file content
	 *
	 * @var string
	 */
	protected $template = '';
	
	/**
	 * The placeholders
	 *
	 * @var array (String => String)
	 */
	protected $placeholders = array ();
	
	/**
	 * The errors
	 *
	 * @var array<string>
	 */
	protected $_errors = array ();
	
	/**
	 * Constructor
	 */
	public function __construct($source = '', $isFile = true) {
		if ($isFile && empty ( $source )) {
			$this->setError ( 'Empty template path given' );
		}
		
		if (! $isFile) {
			$this->template = $source;
			return $this;
		}
		
		if (! empty ( $source ) && JFile::exists ( $source )) {
			$this->template = JFile::read ( $source );
			$this->path = $source;
		} else {
			throw new Exception ("Template <i>" . $source . "</i> not found" );
		}
	}
	
	/**
	 * Add placehoders
	 *
	 * @param array $placeholders
	 *        	to look for and the values they will be replaced with
	 * @param boolean $case        	
	 */
	public function addPlaceholders($placeholders = array(), $case = false) {
		foreach ( $placeholders as $key => $value ) {
			if ($case) {
				$this->placeholders [ucfirst ( $key )] = ucfirst ( $value );
				$this->placeholders [strtoupper ( $key )] = strtoupper ( $value );
				$this->placeholders [strtolower ( $key )] = strtolower ( $value );
				
				continue;
			}
			
			$this->placeholders [$key] = $value;
		}
	}
	
	/**
	 * Add areas
	 *
	 * @param array $areas
	 *        	areas to look for
	 */
	public function addAreas($areas = array()) {
		foreach ( $areas as $area => $bool ) {
			$this->areas [$area] = $bool;
		}
	}
	
	/**
	 * Get the edited template of this create instance
	 *
	 * @return string errors
	 */
	public function getErrors() {
		return implode ( "<br>\n", $this->_errors );
	}
	
	/**
	 * Find all unattended areas in the buffer
	 *
	 * @return array unattended areas
	 */
	public function getUnattendedAreas() {
		$areas = array ();
		preg_match_all ( "/##\{start_([A-Za-z0-9_-]*)\}##/", $this->buffer, $matches );
		
		foreach ( $matches [1] as $match ) {
			if (! in_array ( $match, $areas )) {
				$areas [] = $match;
			}
		}
		
		return $areas;
	}
	
	/**
	 * Find all unattended areas in the buffer
	 *
	 * @return array unattended areas
	 */
	public function getUnattendedPlaceholders() {
		$areas = array ();
		preg_match_all ( "/##([A-Za-z0-9_-]*)##/", $this->buffer, $matches );
		
		foreach ( $matches [1] as $match ) {
			if (! in_array ( $match, $areas )) {
				$areas [] = $match;
			}
		}
		
		return $areas;
	}
	
	/**
	 * Replace the placeholders of the template by the given rules
	 *
	 * @return The replaced template
	 */
	public function getBuffer() {
		$this->buffer = $this->template;
		
		/**
		 * Render areas *
		 */
		foreach ( $this->areas as $area => $bool ) {
			if ($bool) {
				// Delete only start- and end tag
				$this->buffer = str_replace ( "##{start_" . $area . "}##", "", $this->buffer );
				$this->buffer = str_replace ( "##{end_" . $area . "}##", "", $this->buffer );
				
				while ( strpos ( $this->buffer, "##{!start_" . $area . "}##" ) !== false ) {
					// Delete content between start- and end tag
					$start_pos = strpos ( $this->buffer, "##{!start_" . $area . "}##" );
					$end_pos = strpos ( $this->buffer, "##{!end_" . $area . "}##" );
					$this->buffer = substr_replace ( $this->buffer, '', $start_pos, $end_pos - $start_pos + strlen ( "##{!end_" . $area . "}##" ) );
				}
			} else {
				// Delete only start- and end tag
				$this->buffer = str_replace ( "##{!start_" . $area . "}##", "", $this->buffer );
				$this->buffer = str_replace ( "##{!end_" . $area . "}##", "", $this->buffer );
				
				while ( strpos ( $this->buffer, "##{start_" . $area . "}##" ) !== false ) {
					// Delete content between start- and end tag
					$start_pos = strpos ( $this->buffer, "##{start_" . $area . "}##" );
					$end_pos = strpos ( $this->buffer, "##{end_" . $area . "}##" );
					$this->buffer = substr_replace ( $this->buffer, '', $start_pos, $end_pos - $start_pos + strlen ( "##{end_" . $area . "}##" ) );
				}
			}
		}
		
		/**
		 * Render placeholders *
		 */
		foreach ( $this->placeholders as $key => $value ) {
			$this->buffer = str_replace ( '##' . $key . '##', $value, $this->buffer );
		}
		
		return $this->buffer;
	}
	
	/**
	 * Set error
	 * 
	 * @param string	$text	error message	
	 */
	public function setError($text) {
		$this->_errors [] = $text;
	}
}