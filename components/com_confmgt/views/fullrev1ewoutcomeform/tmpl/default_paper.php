<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
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
            <td width="35%" class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_ABSTRACT_REVIEW_OUTCOME'); ?>
                :
            </td>
            <td width="65%"><?php
                if ($this->paper->abstract_abstract_review_outcome == 0) {
                    echo JText::_('N/A');
                } else {
                    echo JText::_('CONFMGT_ABSTRACT_REVIEW_OUTCOME_' . $this->paper->abstract_abstract_review_outcome);
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_ABSTRACT_REVIEW_COMMENTS'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->abstract_abstract_review_comments)) {
                    echo JText::_('N/A');
                } else {
                    echo nl2br($this->paper->abstract_abstract_review_comments);
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_FULL_PAPER'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->fullpaper_full_paper)) {
                    echo JText::_('N/A');
                } else {
                    echo $this->paper->fullpaper_full_paper;
                    echo $this->paper->full_paper_download;
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_FULL_REVIEW_OUTCOME'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->fullpaper_full_review_outcome)) {
                    echo JText::_('N/A');
                } else {
                    echo $this->paper->fullpaper_full_review_outcome;
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_FULL_REVIEW_COMMENTS'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->fullpaper_full_review_comments)) {
                    echo JText::_('N/A');
                } else {
                    echo nl2br($this->paper->fullpaper_full_review_comments);
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_CAMERA_READY'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->camera_camera_ready)) {
                    echo JText::_('N/A');
                } else {
                    echo $this->paper->camera_camera_ready;
                } ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_PRESENTATION'); ?>
                :
            </td>
            <td><?php
                if (empty($this->paper->presentation)) {
                    echo JText::_('N/A');
                } else {
                    echo $this->paper->presentation_presentation;
                } ?></td>
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

