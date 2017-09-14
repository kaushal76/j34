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
<?php

$show = false;
$linkid = $this->linkid;

$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$saveOrder = true;

?>
<div>
    <form action="<?php echo JRoute::_('index.php?option=com_confmgt&view=authors'); ?>" method="post" name="adminForm"
          id="adminForm" style="display:inline">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><?php echo JText::_('COM_CONFMGT_AUTHORS_REORDER_FORM_PANEL_HEADING'); ?></h1></div>
            <div class="panel-body">
                <p><?php echo JText::_('COM_CONFMGT_AUTHORS_REORDER_FORM_PANEL_DETAILS'); ?></p>
            </div>

            <table class="admintable table table-striped">
                <thead>
                <tr>
                    <th width="5%"><?php echo JText::_("#"); ?></th>
                    <th><?php echo JText::_("COM_CONFMGT_NAME"); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($this->items)): ?>
                <?php foreach ($this->items as $i => $item) : ?>
                    <?php $ordering = true; ?>
                    <tr>
                        <td class="order">
                            <div class="controls"><input type="hidden" id="cb<?php echo $i; ?> " name="cid[]"
                                                         value="<?php echo $item->id; ?>"/><input type="text"
                                                                                                  name="order[]"
                                                                                                  size="5"
                                                                                                  value="<?php echo $item->ordering; ?>"
                                                                                                  class="input-block-level"/>
                            </div>
                        </td>
                        <td>
                            <?php echo $item->title . ' ' . $item->firstname . ' ' . $item->surname; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>

                <?php
                else: ?>
                    <tr>
                        <td colspan="2">
                            <?php
                            echo JText::_('COM_CONFMGT_NO_ITEMS');
                            ?>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
            </table>
            <div>
                <input type="hidden" name="task" value="authors.saveorder"/>
                <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
                <input type="hidden" name="boxchecked" value="0"/>
            </div>
        </div>

        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-save-copy"></i>
            <?php echo 'Save authors sequence'; ?>
        </button>
    </form>
    <form id="form-author-new" style="display:inline"
          action="<?php echo JRoute::_('index.php'); ?>"
          method="post" class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <button class="btn btn-default btn-lg" type="submit">
            <i class="icon-ok"></i>
            <?php echo JText::_("Done"); ?>
        </button>
        <input type="hidden" name="linkid" value="<?php echo $linkid; ?>"/>
        <input type="hidden" name="id" value="<?php echo $linkid; ?>"/>
        <input type="hidden" name="view" value="paper"/>
        <input type="hidden" name="option" value="com_confmgt"/>
    </form>
</div>

<?php //endif; ?> 

