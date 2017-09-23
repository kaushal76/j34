<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
//no direct access 
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidation');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo JText::_('Abstract'); ?></h3>
    </div>
    <div class="panel-body">
        <div class='form-horizontal'>
            <fieldset>
                <div class="paper-edit front-end-edit">
                    <legend><?php echo JText::_('Edit details Paper ID: ');
                        echo $this->item->id; ?></legend>
                    <form id="form-paper" role="form"
                          action="<?php echo JRoute::_('index.php?option=com_confmgt&task=paperform.save'); ?>
		" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('id'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('id'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('abstract_id'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('abstract_id'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('title'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('title'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('abstract'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('abstract'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('keywords'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('keywords'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('theme'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('theme'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('student_submission'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('student_submission'); ?> </div>
                        </div>

                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('type'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('type'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label"> <?php echo $this->
                                form->getLabel('created_by'); ?> </div>
                            <div class="controls"> <?php echo $this->
                                form->getInput('created_by'); ?> </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit"
                                        class="btn btn-primary"><?php echo JText::_('JSUBMIT'); ?> </button>
                                <?php echo JText::_('or'); ?> <a
                                    href="<?php echo JRoute::_('index.php?option=com_confmgt&task=paperform.cancel'); ?>"
                                    title="<?php echo JText::_('JCANCEL'); ?>
				"><?php echo JText::_('JCANCEL'); ?> </a>
                                <input type="hidden" name="option" value="com_confmgt"/>
                                <input type="hidden" name="linkid" value="<?php echo $this->linkid; ?>"/>
                                <input type="hidden" name="task" value="paperform.save"/>
                                <?php echo JHtml::_('form.token'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>