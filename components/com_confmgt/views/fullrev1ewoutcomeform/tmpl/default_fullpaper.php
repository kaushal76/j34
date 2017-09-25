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
            echo JText::_('Paper details for the ') . ' - ' . JText::_('Paper ID') . $this->paper->paper_id; ?>
        </h1>
    </div>
    <table class="table table-striped">
        <tr>
            <td width="23%" class="header"><?php
                echo JText::_('Paper ID: '); ?>
            </td>
            <td width="77%"><?php
                echo $this->paper->paper_id; ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Paper Title: '); ?>
            </td>
            <td><?php
                echo $this->paper->paper_title; ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Full paper: '); ?>
            </td>
            <td><?php
                echo $this->paper->fullpaper_full_paper;
                echo $this->paper->full_paper_download;
                ?>

            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Keywords: '); ?>
            </td>
            <td><?php
                echo $this->paper->paper_keywords; ?></td>
        </tr>
    </table>
</div>

