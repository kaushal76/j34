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
class JDeveloperCreateTableAdminFormSingular extends JDeveloperCreateTable
{		
	/**
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
	protected $templateFile = "admin.models.forms.singular.xml";
	
	private $item_params = null;
	private $item_images = null;

	/**
	 * @see JDeveloperCreateTable::initialize()
	 */
	protected function initialize()
	{
		$model_table = $this->getModel("Table");
		
		// Get param item
		$this->item_params = $model_table->getParamsFormItem($this->table->id);
		$this->item_images = $model_table->getImagesFormItem($this->table->id);
		
		// Initialise template
		$this->template->addPlaceHolders(
			array( 
				"fields" => $this->fields(),
				"relations" => $this->relations(),
				"form_fields" => $this->getFormFields(),
				"form" => $this->getForm($this->table->form_id)
			)
		);

		return parent::initialize();
	}
	
	private function fields()
	{
		$buffer = '';
		
		foreach ($this->fields as $field)
		{
			$lng = "COM_". strtoupper($this->component->name) ."_". strtoupper($this->table->name) ."_FIELD_" . strtoupper($field->name);
			
			$buffer .= "\n\t\t<field\n\t\t\tname=\"". $field->name ."\"\n\t\t\tlabel=\"". $lng ."_LABEL\"\n\t\t\tdescription=\"". $lng ."_DESC\"";
			$buffer .= "\n\t\t\ttype=\"". $field->type ."\"";
			
			// Add default attributes
			if (!empty($field->maxlength))	$buffer .= "\n\t\t\tmaxlength=\"". $field->maxlength ."\"";
			if (!empty($field->default)) 	$buffer .= "\n\t\t\tdefault=\"". $field->default ."\"";
			if ($field->name == $this->fields[0]->name) $field->class = "input-xxlarge input-large-text";
			if (!empty($field->class)) 		$buffer .= "\n\t\t\tclass=\"". $field->class ."\"";
			if (!empty($field->rule)) 		$buffer .= "\n\t\t\tvalidate=\"". strtolower($field->rule) ."\"";
			if (!empty($field->params["filter"])) 	$buffer .= "\n\t\t\tfilter=\"". $field->params["filter"] ."\"";
			if (!empty($field->deactivated)) $buffer .= "\n\t\t\tdeactivated=\"true\"";
			if (!empty($field->readonly)) 	$buffer .= "\n\t\t\treadonly=\"true\"";
			if (!empty($field->required)) 	$buffer .= "\n\t\t\trequired=\"true\"";
			
			// Add attributes
			if (!empty($field->attributes)) {
				for ($i = 0; $i < count($field->attributes['keys']); $i++) {
					$value = isset($field->attributes["values"][$i]) ? $field->attributes["values"][$i] : "";
					$buffer .= "\n\t\t\t" . $field->attributes["keys"][$i] . "=\"" . $value . "\"";
				}
			}
			
			// Add options
			if (!empty($field->options))
			{
				$buffer .= "\n\t\t>";
				
				for ($i = 0; $i < count($field->options['keys']); $i++)
				{
					if (empty($field->options['keys'][$i])) continue;

					// Table translations
					$this->getLanguage()->addKeys(array(
						'FIELD_' . strtoupper($field->name) . '_OPTION_' . str_replace(" ", "_", strtoupper($field->options['keys'][$i])) 
							=> $field->options['values'][$i]
					), $this->table->name);

					$buffer .= "\n\t\t\t<option value=\"" . $field->options['keys'][$i] . "\">" . $lng . "_OPTION_" . str_replace(" ", "_", strtoupper($field->options['keys'][$i])) . "</option>";
				}
				
				$buffer .= "\n\t\t</field>";
			}
			else
			{
				$buffer .= "\n\t\t/>";
			}
		}

		return $buffer;
	}
	
	/**
	 * Get XML fields of table relations
	 * 
	 * @return string
	 */
	private function relations()
	{
		$template = $this->loadSubtemplate("relation.xml");
		$buffer = '';
		
		if (isset($this->table->params["relations"]))
		{
			// Add XML fields for each table relation
			foreach ($this->table->params["relations"] as $relation)
			{
				$table = $this->getModel("Table")->getItem($relation);
				
				$template->addPlaceholders($this->getDefaultPlaceholders(), true);				
				$template->addPlaceholders(array(
					"rel_name" => strtolower($table->singular)
				), true);
				
				$buffer .= $template->getBuffer();
			}
		}

		return $buffer;
	}
	
	/**
	 * Get XML for level 2 fields
	 * 
	 * @return	string
	 */
	private function getFormFields() {
		$model = $this->getModel("Form");
		$fields = $model->getChildren($this->table->form_id, 1);
		
		$buffer = "";
	
		// Add XML form fields for level 2 fields
		foreach ($fields as $field) {
			if ($field->level == "2" && $field->tag == "field") {
				$create = JDeveloperCreate::getInstance("form.field", array("item_id" => $field->id));
				$buffer .= $create->getBuffer();
			}
		}
	
		$buffer = explode("\n", $buffer);
		return implode("\n\t\t", $buffer);
	}
	
	/**
	 * Get other XML fields
	 * 
	 * @return string
	 */
	private function getForm($parent_id = 0) {
		$model = $this->getModel("Form");
		$table = $model->getTable();
		$buffer = "";
	
		foreach ($model->getChildren($parent_id, 1) as $child) {
			// Exclude level 2 fields
			if ($child->level == 2 && $child->tag == "field")
				continue;
			
			// Exclude params if not activated
			if (!$this->table->jfields["params"] && $this->item_params->id == $child->id)
				continue;
			
			// Exclude images if not activated
			if (!$this->table->jfields["images"] && $this->item_images->id == $child->id)
				continue;
				
			// Select template name
			$name = $child->tag == "field" ? "form.field" : "form.child";
			
			// Get Create subclass instance
			$create = JDeveloperCreate::getInstance($name, array("item_id" => $child->id));
				
			// Check if item has children
			if (!$table->isLeaf($child->id)) {
				$create->getTemplate()->addPlaceholders(array(
					"children" => $this->getForm($child->id)
				));
			}
			else {
				$create->getTemplate()->addPlaceholders(array(
					"children" => ""
				));
			}
				
			// Add rendered template to return value
			$result = $create->getBuffer();
			$result = explode("\n", $result);
			$buffer .= implode("\n\t", $result);
		}
	
		return $buffer;
	}	
}