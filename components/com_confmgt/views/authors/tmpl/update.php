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
$linkid = $this->linkid;
?>

<div class="panel panel-default">
    <div class="panel-heading"><h1><?php echo JText::_('COM_CONFMGT_AUTHORS_FORM_UPDATE_PANEL_HEADING'); ?></h1></div>
    <div class="panel-body">
        <p><?php echo JText::_('COM_CONFMGT_AUTHORS_FORM_UPDATE_PANEL_DETAILS'); ?></p>
    </div>
    <table class="admintable table table-striped">
        <thead>
        <tr>
            <th><?php echo JText::_("COM_CONFMGT_AUTHOR_NUMBER"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_NAME"); ?></th>
            <th><?php echo JText::_("COM_CONFMGT_ACTION"); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php

        $show = false;
        $linkid = $this->linkid;

        ?>
        <?php foreach ($this->items as $item) : ?>
            <?php
            $show = true;
            ?>
            <tr>
                <td width="5%">
                    <?php echo $item->ordering; ?>
                </td>
                <td>
                    <?php echo $item->title . ' ' . $item->firstname . ' ' . $item->surname; ?>
                </td>
                <td width="15%">
                    <a
                        data-toggle="confirm"
                        data-header="Delete confirmation"
                        data-title="Do you really want to delete the record?"
                        href="<?php echo JRoute::_('index.php?option=com_confmgt&task=author.remove_update&id=' . $item->id.'&linkid=' . $this->linkid); ?>">
                        <i class="icon-trash icon-white"></i>
                    </a>
                    <a
                        href="<?php echo JRoute::_('index.php?option=com_confmgt&view=authorform&layout=update&id=' . $item->id.'&linkid=' . $this->linkid); ?>">
                        <i class="icon-pencil"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="inline">
    <form id="form-author-new" style="display:inline"
          action="<?php echo JRoute::_('index.php?option=com_confmgt&task=author.edit_update&id=0'); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-plus"></i>
            <?php echo JText::_("Add new author"); ?>
        </button>
    </form>
</div>
<div class="inline">
    <form id="form-author-new" style="display:inline"
          action="<?php echo JRoute::_('index.php?option=com_confmgt&view=paper&id=' . $linkid); ?>" method="post"
          class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-ok"></i>
            <?php echo JText::_("Done"); ?>
        </button>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
    </form>
</div>
