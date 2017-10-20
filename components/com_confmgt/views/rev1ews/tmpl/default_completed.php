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
        <h1><?php echo JText::_('COM_CONFMGT_REVIEWS_PANEL_COMPLETED_HEADING'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_REVIEWS_PANEL_COMPLETED_DETAILS'); ?></p>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="5%"><?php echo JText::_("COM_CONFMGT_REVIEWS_NUM"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_TITLE"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_MODE"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_COMPLETED_ON"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_VIEW_REVIEW"); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $show = false; ?>
        <?php if ($this->items_completed): ?>
            <?php foreach ($this->items_completed as $item) : ?>
                <?php if ($item->mode == 'abstract') {
                    $mode_text = 'Abstract';
                    $layout = 'abstract';
                    $btn = JText::_('View Abstract Review');
                } elseif ($item->mode == 'full') {
                    $layout = 'full';
                    $mode_text = 'Full Paper';
                    $btn = JText::_('View Full paper Review');
                }else{
                    $mode_text = $item->mode;
                }
                ?>
                <?php $show = true; ?>
                <tr>
                    <td width="5%"><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $mode_text; ?></td>
                    <td><?php echo $item->last_updated; ?></td>
                    <td width="10%">
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&view=rev1ew&layout='.$layout.'&rev_id='.(int)$item->rev_id.'&linkid='.(int)$item->id.'&jform[linkid]='.$item->id); ?>">
                            <i class="icon-list"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!$show): ?>
            <tr>
                <td colspan="5">
                    <?php
                    echo JText::_('COM_CONFMGT_NO_ITEMS');
                    ?>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
