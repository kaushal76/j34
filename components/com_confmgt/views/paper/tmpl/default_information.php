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
        <h1><?php echo JText::_('Abstract'); ?></h1>
    </div>
        <table class="table table-striped">
            <tr>
                <td class="header" style="width:30%"><?php
                    echo JText::_('Paper ID: '); ?>
                </td>
                <td><?php echo $this->item->id; ?></td>
            </tr>
            <tr>
                <td class="header"><?php
                    echo JText::_('Paper Title: '); ?>
                </td>
                <td>
                        <?php echo $this->item->title; ?>
                </td>
            </tr>
            <tr>
                <td class="header"><?php
                    echo JText::_('Submitted by: '); ?>
                </td>
                <td><?php echo $this->item->created_by; ?></td>
            </tr>
            <tr>
                <td class="header"><?php
                    echo JText::_('Absrtact: '); ?>
                </td>
                <td><?php echo nl2br($this->item->abstract); ?></td>
            </tr>
            <tr>
                <td class="header"><?php
                    echo JText::_('Keywords: '); ?>
                </td>
                <td><?php echo $this->item->keywords; ?></td>
            </tr>
        </table>
    <div class="panel-footer">
        <a class="btn btn-default"
            href="<?php echo JRoute::_('index.php?option=com_confmgt&linkid='.$this->item->id.'&task=paper.update&id=' . $this->item->id);  ?>">
            <i class="icon-pencil"></i>
            <?php echo JText::_('Edit'); ?>
        </a>
    </div>
</div>