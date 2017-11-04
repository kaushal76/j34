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
        <h1><?php echo JText::_('Themes'); ?></h1>
    </div>
    <div class="panel-body">
        <p><?php echo JText::_('Followings are the themes configured for this conference'); ?></p>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="5%"><?php echo JText::_("#"); ?></th>
            <th><?php echo JText::_("Theme title"); ?></th>
            <th><?php echo JText::_("Theme Description"); ?></th>
            <th><?php echo JText::_("Leader"); ?></th>
            <th width="20%"><?php echo JText::_("Action"); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $show = false;
        $i =1;
        ?>
        <?php foreach ($this->items as $item) : ?>
            <?php $show = true; ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $item->title ?></td>
                <td><?php echo $item->description ?></td>
                <td><?php echo $item->user_name ?></td>
                <td>
                    <div class="inline">
                        <a
                            data-toggle="confirm"
                            data-header="Delete confirmation"
                            data-title="Do you really want to delete the record?"
                            href="<?php echo JRoute::_('index.php?option=com_confmgt&task=theme.remove&id=' . $item->id); ?>">
                            <i class="icon-trash icon-white"></i>
                        </a>
                        <a
                            href="<?php echo JRoute::_('index.php?option=com_confmgt&task=theme.edit&id=' . $item->id); ?>">
                            <i class="icon-pencil"></i>
                        </a>
                    </div>
                </td>
            </tr>

        <?php
            $i++;
        endforeach; ?>
        <?php
        if (!$show) { ?>
            <tr>
                <td colspan="3"><?php
                    echo JText::_('No themes found');
                    ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="panel-footer">
        <form id="form-theme-new" style="display:inline"
              action="<?php echo JRoute::_('index.php?option=com_confmgt&task=theme.edit&id=0'); ?>" method="post"
              class="form-validate" enctype="multipart/form-data">
            <?php echo JHtml::_('form.token'); ?>
            <button class="btn btn-default" type="submit">
                <i class="icon-plus"></i>
                <?php echo 'New theme'; ?>
            </button>
        </form>
        <form id="form-theme-list" style="display:inline"
              action="<?php echo JRoute::_('index.php?option=com_confmgt'); ?>"
              method="post" class="form-validate" enctype="multipart/form-data">
            <?php echo JHtml::_('form.token'); ?>
            <button class="btn btn-default"
                    type="submit">
                <i class="icon-home"></i>
                <?php echo JText::_("Home"); ?>
            </button>
        </form>
    </div>
</div>
