<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// no direct access
defined('_JEXEC') or die;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1><?php echo JText::_('COM_CONFMGT_REVIEWS_PANEL_PENDING_HEADING'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_REVIEWS_PANEL_PENDNG_DETAILS'); ?></p>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="5%"><?php echo JText::_("COM_CONFMGT_REVIEWS_NUM"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_TITLE"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_MODE"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_DUE_ON"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_REVIEWS_PERFORM_REVIEW"); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $show = false; ?>
        <?php if ($this->abs_items_pending): ?>
            <?php foreach ($this->abs_items_pending as $item) :
                $layout = 'abstract';
                $btn = JText::_('Post Abstract Review');

                $show = true; ?>
                <tr>
                    <td width="5%"><?php echo $item->paperid; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->mode; ?></td>
                    <td><?php echo $item->due_date; ?></td>
                    <td width="10%">
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&view=rev1ewform&layout='.$layout.'&linkid='.(int)$item->paperid.'&jform[linkid]='.$item->paperid); ?>">
                            <i class="icon-list"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ($this->full_items_pending): ?>
            <?php foreach ($this->full_items_pending as $item) :

                $layout = 'full';
                $btn = JText::_('Post Full paper Review');

                $show = true; ?>
                <tr>
                    <td width="5%"><?php echo $item->paperid; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->mode; ?></td>
                    <td><?php echo $item->due_date; ?></td>
                    <td width="10%">
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&view=rev1ewform&layout='.$layout.'&linkid='.(int)$item->paperid.'&jform[linkid]='.$item->paperid); ?>">
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
