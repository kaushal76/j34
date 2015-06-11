<?php
/**
 * @package     JDeveloper
 * @subpackage  Views
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
JDeveloperLoader::import("create");

$input = JFactory::getApplication()->input;
$id = $input->get("id", 0, "int");
$table = $this->getModel()->getTable();

if ($id)
{
	if ($this->item->level == 1)
	{
		$result = JDeveloperCreate::getInstance("form.form", array("item_id" => $this->item->id))->getBuffer();
	}
	elseif ($table->isLeaf($this->item->id))
	{
		$result = JDeveloperCreate::getInstance("form.field", array("item_id" => $this->item->id))->getBuffer();
	}
	else
	{
		$result = JDeveloperCreate::getInstance("form.fieldarray", array("item_id" => $this->item->id))->getBuffer();
	}
}

if ($input->get("format", "") == "xml")
{
	echo $result;
}
else
{
	echo JHtml::_("code.form", $result);
}