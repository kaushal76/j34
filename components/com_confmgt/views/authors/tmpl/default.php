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

JHtml::_('bootstrap.alert', 'error');
$document = JFactory::getDocument();
$bootboxurl = "components/com_confmgt/assets/js/bootbox.min.js";
$delurl = "components/com_confmgt/assets/js/del.js";
$document->addScript($bootboxurl);
$document->addScript($delurl);

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1><?php echo JText::_('COM_CONFMGT_VIEW_AUTHORS_DEFAULT_FORM_PANEL_HEADING'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_VIEW_AUTHORS_DEFAULT_FORM_PANEL_DETAILS'); ?></p>
    </div>
    <table class="admintable table">
        <thead>
        <tr>
            <th width="5%"><?php echo JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_NUMBER"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_NAME"); ?></th>
            <th width="20%"><?php echo JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_ACTION"); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $show = false;
        $linkid = $this->linkid;
        ?>
        <?php foreach ($this->items as $item) : ?>
            <?php $show = true; ?>
            <tr>
                <td><?php echo $item->ordering; ?></td>
                <td><?php echo $item->title . ' ' . $item->firstname . ' ' . $item->surname; ?></td>
                <td>
                    <div class="inline">
                        <a
                           data-toggle="confirm"
                           data-header="Delete confirmation"
                           data-title="Do you really want to delete the record?"
                           href="<?php echo JRoute::_('index.php?option=com_confmgt&task=author.remove&id=' . $item->id.'&linkid=' . $linkid); ?>">
                            <i class="icon-trash icon-white"></i>
                        </a>
                        <a
                            href="<?php echo JRoute::_('index.php?option=com_confmgt&task=author.edit&id=' . $item->id.'&linkid=' . $linkid); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php
        if (!$show) { ?>
            <tr>
                <td colspan="3"><?php
                    echo JText::_('COM_CONFMGT_VIEW_AUTHORS_DEFAULT_NO_ITEMS');
                    ?></td>
            </tr>
            <?php
            $newBtn = JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_ADD_AUTHOR");
            $nxtBtnDisable = " disabled = disabled";
        } else {
            $newBtn = JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_ADD_ANOTHER_AUTHOR");
            $nxtBtnDisable = "";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="inline">
    <form id="form-author-new" style="display:inline" action="<?php echo JRoute::_('index.php'); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <input type="hidden" name="option" value="com_confmgt"/>
        <input type="hidden" name="task" value="author.edit"/>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
        <input type="hidden" name="id" value="0"/>
        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-plus"></i>
            <?php echo $newBtn; ?>
        </button>
    </form>
</div>

<div class="inline">
    <form id="form-author-list" style="display:inline" action="<?php echo JRoute::_('index.php'); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <input type="hidden" name="option" value="com_confmgt"/>
        <input type="hidden" name="view" value="papers"/>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-arrow-left"></i>
            <?php echo JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_AUTHORS_BACK"); ?>
        </button>
    </form>
</div>
<div class="inline">
    <form id="form-paper-new" style="display:inline"
          action="<?php echo JRoute::_('index.php?option=com_confmgt&task=paper.edit&id=' . $linkid); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <input type="hidden" name="option" value="com_confmgt"/>
        <input type="hidden" name="task" value="paper.edit"/>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
        <input type="hidden" name="id" value="<?php echo $linkid; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
        <button class="btn btn-default btn-lg" <?php echo $nxtBtnDisable; ?> type="submit">
            <i class="icon-arrow-right"></i>
            <?php echo JText::_("COM_CONFMGT_VIEW_AUTHORS_DEFAULT_PROCEED_TO_PAPER"); ?>
        </button>
    </form>
</div>
