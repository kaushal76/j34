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
        <h1><?php echo JText::_('Reviews'); ?></h1>
    </div>
    <table class="table table-striped">
        <tr>
            <td class="header" style="width:30%"><?php
                echo JText::_('Abstract review outcome: '); ?>
            </td>
            <td>
                <?php
                echo $this->item->abstract_review_outcome_txt;
                echo $this->item->abstractBtn;
                ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Abstract review comments: '); ?>
            </td>
            <td><?php echo nl2br($this->item->abstract_abstract_review_comments); ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper review outcome: '); ?>
            </td>
            <td>
                <?php
                echo nl2br($this->item->full_review_outcome_txt);
                echo $this->item->fullPaperBtn;
                echo $this->item->full_paper_download;
                ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper review comments: '); ?>
            </td>
            <td><?php
                echo nl2br($this->item->fullpaper_full_review_comments);
                ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Camera ready paper: '); ?>
            </td>
            <td>
                <?php
                echo $this->item->camera_ready_txt;
                echo $this->item->cameraReadyBtn;
                echo $this->item->cameraready_download;
                ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Presentation: '); ?>
            </td>
            <td>
                <?php
                echo $this->item->presentation_txt;
                echo $this->item->presentationBtn;
                echo $this->item->presentation_download;
                ?>
            </td>
        </tr>
    </table>
</div>
