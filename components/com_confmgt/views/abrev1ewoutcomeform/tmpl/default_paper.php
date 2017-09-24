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
            echo JText::_('COM_CONFMGT_PAPER_PANEL_HEADING') . ' - ' . JText::_('Paper ID') . $this->paper->paper_id; ?>
        </h1>
    </div>
    <div class="panel-body"></div>
    <table class="table table-striped">
        <tr>
            <td width="25%" class="header"><?php
                echo JText::_('Abstract review outcome'); ?>
                :
            </td>
            <td><?php
                echo $this->paper->abstract_review_outcome_txt;
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Absrtact review comments'); ?>
                :
            </td>
            <td><?php
                echo nl2br($this->paper->abstract_abstract_review_comments);
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper'); ?>
                :
            </td>
            <td><?php
                echo $this->paper->full_paper_txt;
                echo $this->paper->fullpaper_full_paper;
                echo $this->paper->full_paper_download;
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper review outcome'); ?>
                :
            </td>
            <td><?php

                echo $this->paper->full_review_outcome_txt;
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper review comments'); ?>
                :
            </td>
            <td><?php

                echo nl2br($this->paper->fullpaper_full_review_comments);
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Camera ready paper'); ?>
                :
            </td>
            <td><?php

                echo $this->paper->camera_ready_txt;
                echo $this->paper->camera_camera_ready;
                echo $this->paper->cameraready_download;
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Presentation'); ?>
                :
            </td>
            <td><?php

                echo $this->paper->presentation_txt;
                echo $this->paper->presentation_presentation;
                echo $this->paper->presentation_download;
                ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_CREATED_BY'); ?>
                :
            </td>
            <td><?php
                echo $this->paper->paper_created_by; ?></td>
        </tr>
    </table>
</div>
