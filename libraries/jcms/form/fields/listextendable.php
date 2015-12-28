<?php
/**
 * @package     JDeveloper
 * @subpackage  Fields
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * Form field for database tables.
 *
 * @package		JDeveloper
 * @subpackage	Fields
 */
class JFormFieldListExtendable extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  11.1
	 */
	protected $type = 'listextendable';
	
	public function __construct($form = null) {
		parent::__construct($form);		
		JFactory::getDocument()->addScriptDeclaration(
		"jQuery(document).ready(function(){"
			. "jQuery('a.removeline').click(function(){"
				. "jQuery(this).closest('tr').remove();"
			. "})"
		. "});");
	}
	
	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   11.1
	 */
	protected function getInput()
	{		
		$name_keys = str_replace("[]", "[keys][]", $this->name);
		$name_values = str_replace("[]", "[values][]", $this->name);
		
		// jQuery add option function
		$html = "<a onclick=\"
		jQuery(document).ready(function(){
			jQuery('table[relation=\\'" . $this->fieldname . "\\']').append(
				'<tr><td><input name=\'" . $name_keys . "\' value=\'\'></td>'
				+ '<td><input name=\'" . $name_values . "\' value=\'\'></td>'
				+ '<td><a class=\'icon-delete removeline\'></a></td></tr>'
			);
		}
		);\"
		class=\"btn btn-success\">" . JText::_("LIB_JCMS_FIELD_LISTEXTENDABLE_ADDOPTION") . "</a>";
		
		// Display options as two column table
		$html .= "<table relation=\"" . $this->fieldname . "\">";

		$html .= "<thead><tr><th>" . JText::_("LIB_JCMS_FIELD_LISTEXTENDABLE_KEYS") . "</th>";
		$html .= "<th>" . JText::_("LIB_JCMS_FIELD_LISTEXTENDABLE_VALUES") . "</th></tr></thead><tbody>";
				
		// Create table rows for each key value pair
		if (is_array($this->value) && isset($this->value["keys"])) {
			for ($i = 0; $i < count($this->value["keys"]); $i++) {
				$value = isset($this->value["values"][$i]) ? $this->value["values"][$i] : "";
				
				$html .= "<tr><td><input name=\"" . $name_keys . "\" value=\"" . $this->value["keys"][$i] . "\"/></td>";
				$html .= "<td><input name=\"" . $name_values . "\" value=\"" . $value . "\"/></td>";
				$html .= "<td><a class=\"icon-delete removeline\"></a></td></tr>";
			}
		}
		
		// Create one empty row for new input
		$html .= "<tr><td><input name=\"" . $name_keys . "\" value=\"\"/></td>";
		$html .= "<td><input name=\"" . $name_values . "\" value=\"\"/></td>";
		$html .= "<td><a class=\"icon-delete removeline\"></a></td></tr>";

		$html .= "</tbody></table>";
		
		return $html;
	}
}
?>