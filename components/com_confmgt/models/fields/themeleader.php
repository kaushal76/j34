<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * 
 *
 * @package     Joomla.Platform
 * @subpackage  Form
 * @link        http://www.w3.org/TR/html-markup/textarea.html#textarea
 * @since       11.1
 */
class  JFormFieldThemeLeader extends JFormField
{
	/**
	 * The form field type.
	 * Extending the TextArea field type
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'ThemeLeader';

	/**
	 * Method to get the textarea field input markup for the abstract reviews with a default email content in the area.
	 * Use the rows and columns attributes to specify the dimensions of the area.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{
		// Initialize some field attributes.
		if ($this->value =='') {

		}

		$test = '<input type="text" name="mytext[]">';


        $html = '<div class=\"input_fields_wrap\">';
        $html = $html.'<button class=\"add_field_button\">Add More Fields</button>';
        $html = $html.'<div><input type="text" name="mytext[]"></div>';
        $html = $html.'</div>' ;
		return $html;

	}
	
}
