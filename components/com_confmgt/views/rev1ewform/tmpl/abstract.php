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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1>
            <?php
            echo JText::_('Abstract details') . ' - ' . JText::_('Paper ID ') . $this->paper->id; ?>
        </h1>
    </div>
    <table class="table table-striped">
        <tr>
            <td width="23%" class="header"><?php
                echo JText::_('Paper ID :'); ?>
            </td>
            <td width="77%"><?php
                echo $this->paper->id; ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Title'); ?>
                :
            </td>
            <td><?php
                echo $this->paper->title; ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Abstract'); ?>
                :
            </td>
            <td><?php
                echo nl2br($this->paper->abstract); ?></td>
        </tr>
        <tr>
            <td class="header"><?php
                echo JText::_('Keywords'); ?>
                :
            </td>
            <td><?php
                echo $this->paper->keywords; ?></td>
        </tr>
    </table>
</div>

<div class='form-horizontal well'>
    <fieldset>
        <div class="author-edit front-end-edit">
            <?php if (!empty($this->item->id)): ?>
                <legend><?php echo JText::_('Edit Review'); ?></legend>
            <?php else: ?>
                <legend><?php echo JText::_('Add New Review'); ?></legend>
            <?php endif; ?>
            <form id="form-author" role="form" action="<?php echo JRoute::_('index.php'); ?>" method="post"
                  class="form-validate form-horizontal" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="control-label"> <?php echo $this->form->getLabel('id'); ?> </div>
                    <div class="controls"> <?php echo $this->form->getInput('id'); ?> </div>
                </div>
                <div class="control-group">
                    <div class="control-label"> <?php echo $this->form->getLabel('recommendation'); ?> </div>
                    <div class="controls"> <?php echo $this->form->getInput('recommendation'); ?> </div>
                </div>
                <div class="control-group">
                    <div class="control-label"> <?php echo $this->form->getLabel('author_comments'); ?> </div>
                    <div class="controls"> <?php echo $this->form->getInput('author_comments'); ?> </div>
                </div>
                <div class="control-group">
                    <div class="control-label"> <?php echo $this->form->getLabel('leader_comments'); ?> </div>
                    <div class="controls"> <?php echo $this->form->getInput('leader_comments'); ?> </div>
                </div>
                <div class="control-group">
                    <div class="control-label"> <?php echo $this->form->getLabel('score'); ?> </div>
                    <div class="controls"> <?php echo $this->form->getInput('score'); ?> </div>
                </div>
                <div class="control-group">
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                        <?php echo JText::_('or'); ?> <a
                            href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewform.cancel'); ?>"
                            title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
                        <input type="hidden" name="option" value="com_confmgt"/>
                        <input type="hidden" name="task" value="rev1ewform.save"/>
                        <input type="hidden" name="jform[linkid]" value="<?php echo $this->linkid; ?>"/>
                        <input type="hidden" name="jform[mode]" value="abstract"/>
                        <?php echo JHtml::_('form.token'); ?> </div>
                </div>
            </form>
        </div>
    </fieldset>
</div>
