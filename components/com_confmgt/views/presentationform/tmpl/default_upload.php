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
        <h3 class="panel-title"><?php echo JText::_('Presentation'); ?></h3>
    </div>
    <div class="panel-body">
        <div class='form-horizontal'>
            <fieldset>
                <legend><?php echo JText::_('Upload the Presentation'); ?></legend>
                <form id="form-paper" role="form" action="<?php echo JRoute::_('index.php'); ?>" method="post"
                      class="form-validate form-horizontal" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="control-label"> <?php echo $this->form->getLabel('bio'); ?> </div>
                        <div class="controls"> <?php echo $this->form->getInput('bio'); ?> </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"> <?php echo $this->form->getLabel('presentation'); ?> </div>
                        <div class="controls"> <?php echo $this->form->getInput('presentation'); ?> </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"> <?php echo $this->form->getLabel('linkid'); ?> </div>
                        <div class="controls"> <?php echo $this->form->getInput('linkid'); ?> </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn btn-primary" name="submit"
                                   value="<?php echo JText::_('Upload'); ?>"/>
                            <?php echo JText::_('or'); ?> <a
                                href="<?php echo JRoute::_('index.php?option=com_confmgt&task=presentationform.cancel&linkid='.$this->linkid); ?>"
                                title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
                            <input type="hidden" name="option" value="com_confmgt"/>
                            <input type="hidden" name="jform[linkid]" value="<?php echo $this->linkid; ?>"/>
                            <input type="hidden" name="jform[type]" value="presentation"/>
                            <input type="hidden" name="task" value="presentationform.save"/>
                            <?php echo JHtml::_('form.token'); ?></div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>