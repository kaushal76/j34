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

JHtml::_('bootstrap.alert', 'error');
$document = JFactory::getDocument();
$bootboxurl = "components/com_confmgt/assets/js/bootbox.min.js";
$delurl = "components/com_confmgt/assets/js/del.js";
$document->addScript($bootboxurl);
$document->addScript($delurl);

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1><?php echo JText::_('COM_CONFMGT_PAPERS_FORM_PANEL_HEADING'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_PAPERS_FORM_PANEL_DETAILS'); ?></p>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="5%"><?php echo JText::_("COM_CONFMGT_ID"); ?></th>
                <th><?php echo JText::_("COM_CONFMGT_TITLE"); ?></th>
                <th width="20%"><?php echo JText::_("COM_CONFMGT_PAPERS_THEME"); ?></th>
                <th width="20%"><?php echo JText::_("COM_CONFMGT_PAPERS_SUBMITTED_ON"); ?></th>
                <th width="20%"><?php echo JText::_("COM_CONFMGT_ACTION"); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $show = false; ?>
            <?php foreach ($this->items as $item) : ?>
                <?php $show = true; ?>
                <tr>
                    <td width="5%"><?php echo $item->id; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->themename; ?></td>
                    <td><?php echo $item->last_updated; ?></td>
                    <td>
                        <a class=""
                           data-toggle="confirm"
                           data-header="Delete confirmation"
                           data-title="Do you really want to delete the record?"
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&task=paper.remove&id=' . $item->id); ?>">
                            <i class="icon-trash"></i>
                        </a>
                        <a class=""
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&id='.(int)$item->id.'&linkid='.(int)$item->id.'&view=paper'); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php
            if (!$show) { ?>
                <tr>
                    <td colspan="5"><?php
                        echo JText::_('COM_CONFMGT_NO_ITEMS');
                        ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <div class="inline">
            <form id="form-entrypage-<?php echo $item->id ?>" action="<?php echo JRoute::_('index.php'); ?>"
                  method="post"
                  class="form-validate form-entry" enctype="multipart/form-data">
                <?php echo JHtml::_('form.token'); ?>
                <button class="btn btn-default btn-lg" type="submit">
                    <i class="icon-home"></i>
                    <?php echo JText::_("COM_CONFMGT_ENTRY_PAGE"); ?>
                </button>
                <input type="hidden" name="option" value="com_confmgt"/>
                <input type="hidden" name="view" value="entrypage"/>
            </form>
        </div>
        <div class="inline">
            <form id="form-paper-new-<?php echo $item->id ?>" action="<?php echo JRoute::_('index.php'); ?>"
                  method="post"
                  class="form-validate form-entry" enctype="multipart/form-data">
                <?php echo JHtml::_('form.token'); ?>
                <button class="btn btn-default btn-lg" type="submit">
                    <i class="icon-plus"></i>
                    <?php echo JText::_("COM_CONFMGT_ADD_PAPER"); ?>
                </button>
                <input type="hidden" name="option" value="com_confmgt"/>
                <input type="hidden" name="task" value="paper.newabstract"/>
            </form>
        </div>
    </div>
</div>