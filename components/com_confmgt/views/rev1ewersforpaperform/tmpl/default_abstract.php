<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// no direct access
defined('_JEXEC') or die;
?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>
        <?php
		echo JText::_('COM_CONFMGT_PAPER_ABSRTACT_HEADING') . ' - ' . JText::_('Paper ID') . $this->item->paper_id; ?>
      </h1>
    </div>
    <table class="table table-striped">
      <tr>
        <td width="23%"><?php
		echo JText::_('Paper ID: '); ?>
          </td>
        <td width="77%"><?php
		echo $this->item->paper_id; ?></td>
      </tr>
      <tr>
        <td><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_TITLE'); ?>
          :</td>
        <td><?php
		echo $this->item->paper_title; ?></td>
      </tr>
      <tr>
        <td><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_ABSTRACT'); ?>
          : </td>
        <td><?php
		echo nl2br($this->item->abstract_abstract); ?></td>
      </tr>
      <tr>
        <td><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_KEYWORDS'); ?>
          :</td>
        <td><?php
		echo $this->item->paper_keywords; ?></td>
      </tr>
    </table>
  </div>

