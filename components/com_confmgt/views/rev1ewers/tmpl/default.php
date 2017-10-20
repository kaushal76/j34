<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @rev1ewer    Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('bootstrap.alert', 'error');
$document = JFactory::getDocument();
$bootboxurl = "components/com_confmgt/assets/js/bootbox.min.js";
$delurl = "components/com_confmgt/assets/js/del.js";
$document->addScript($bootboxurl);
$document->addScript($delurl);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h1><?php echo JText::_('COM_CONFMGT_REVIEWERS_FORM_PANEL_HEADING'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_REVIEWERS_FORM_PANEL_DETAILS'); ?></p>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?php echo JText::_("COM_CONFMGT_REVIEWER_NUMBER"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_REVIEWER_NAME"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_REVIEWER_AGREED"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_REVIEWER_ADDED_BY"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_REVIEWER_PAPERS"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_ACTION"); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php

            $show = false;
            $leader = $this->leader;
            ?>
            <?php foreach ($this->items as $item) : ?>
                <?php $show = true; ?>
                <tr>
                    <td width="5%"><?php echo $item->ordering; ?></td>
                    <td><?php echo $item->title . ' ' . $item->firstname . ' ' . $item->surname; ?></td>
                    <td><?php
                        if ($item->agreed == 1) {
                            echo JText::_("COM_CONFMGT_REVIEWER_YES");
                        } elseif ($item->agreed == 0) {
                            echo JText::_("COM_CONFMGT_REVIEWER_NO");
                        } else {
                            echo JText::_("COM_CONFMGT_REVIEWER_PENDING");
                        }
                        ?></td>
                    <td><?php echo JFactory::getUser($item->created_by)->name; ?></td>
                    <td><?php echo $item->papers; ?></td>
                    <td>

                        <a class=""
                           data-toggle="confirm"
                           data-header="Delete confirmation"
                           data-title="Do you really want to delete the record?"
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewer.remove&jform[id]=' .(int)$item->id); ?>">
                            <i class="icon-trash"></i>
                        </a>
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewer.edit&jform[id]=' .(int)$item->id.'&id=' .(int)$item->id); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewer.notify&jform[id]=' .(int)$item->id.'&revid=' .(int)$item->id); ?>">
                            <i class="icon-envelope"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <?php
            if (!$show) { ?>
                <tr>
                    <td colspan="6"><?php
                        echo JText::_('COM_CONFMGT_NO_ITEMS');
                        ?></td>
                </tr>
                <?php
                $newBtn = JText::_("COM_CONFMGT_ADD_REVIEWER");
            } else {
                $newBtn = JText::_("COM_CONFMGT_ADD_ANOTHER_REVIEWER");
            }
            ?>

        </table>
    </div>
    <div class="panel-footer">
        <form id="form-rev1ewer-new" style="display:inline"
              action="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewer.edit&id=0'); ?>" method="post"
              class="form-validate" enctype="multipart/form-data">
            <?php echo JHtml::_('form.token'); ?>
            <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
            <button class="btn btn-default" type="submit">
                <i class="icon-plus"></i>
                <?php echo $newBtn; ?>
            </button>
        </form>
        <form id="form-rev1ewer-list" style="display:inline"
              action="<?php echo JRoute::_('index.php?option=com_confmgt&view=papers&layout=leader_default'); ?>"
              method="post" class="form-validate" enctype="multipart/form-data">
            <?php echo JHtml::_('form.token'); ?>
            <button class="btn btn-default"
                    type="submit">
                <i class="icon-list"></i>
                <?php echo JText::_("COM_CONFMGT_REVIEWERS_BACK"); ?>
            </button>
        </form>
    </div>
</div>