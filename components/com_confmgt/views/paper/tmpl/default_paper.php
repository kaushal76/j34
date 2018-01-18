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
        <h1><?php echo JText::_('Paper details'); ?></h1>
    </div>
    <table class="table table-striped">
        <tr>
            <td class="header" width="30%"><?php
                echo JText::_('Full paper: '); ?>
            </td>
            <td><?php echo $this->item->full_paper_txt; ?>
                <?php echo $this->item->full_paper_download; ?>
                <?php echo $this->item->fullPaperBtn; ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Camera ready paper: '); ?>
            </td>
            <td><?php echo $this->item->camera_ready_txt; ?>
                <?php echo $this->item->cameraready_download; ?>
                <?php echo $this->item->cameraReadyBtn; ?>
            </td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Presentation: '); ?>
            </td>
            <td><?php echo $this->item->presentation_txt; ?>
                <?php echo $this->item->presentationBtn; ?>
                <?php echo $this->item->presentation_download; ?>
            </td>
        </tr>
    </table>
</div>

