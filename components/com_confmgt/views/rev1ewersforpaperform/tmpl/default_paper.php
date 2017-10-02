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
		echo JText::_('COM_CONFMGT_PAPER_PANEL_HEADING') . ' - ' . JText::_('Paper ID') . $this->item->paper_id; ?>
    </h1>
  </div>
  <div class="panel-body"> </div>
  <table class="table table-striped">
    <tr>
      <td width="25%"><?php
		echo JText::_('Abstract review outcome: '); ?>
        </td>
      <td><?php
			echo  $this->item->abstract_review_outcome_txt;
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Abstract review comments: '); ?>
        </td>
      <td><?php
			echo nl2br ($this->item->abstract_abstract_review_comments);
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Full paper: '); ?>
        </td>
      <td><?php
			echo $this->item->fullpaper_full_paper;
			echo $this->item->full_paper_download;
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Full paper review outcome: '); ?>
        </td>
      <td><?php
		
			echo $this->item->full_review_outcome_txt;
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Full paper review comments: '); ?>
        </td>
      <td><?php
		
			echo nl2br ($this->item->fullpaper_full_review_comments);
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Camera ready paper: '); ?>
        </td>
      <td><?php
	
			echo $this->item->camera_ready_txt;
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Presentation: '); ?>
        </td>
      <td><?php
	
			echo $this->item->presentation_txt;
		?></td>
    </tr>
    <tr>
      <td><?php
		echo JText::_('Submitted by: '); ?>
        </td>
      <td><?php
		echo $this->item->paper_created_by; ?></td>
    </tr>
  </table>
</div>
