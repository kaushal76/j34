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
JHtml::_('behavior.formvalidation');
?>

<div class = 'form-horizontal well'>
  <fieldset>
    <div class="reviewer-notify front-end-edit">
      <legend><?php echo JText::_('Notification email'); ?></legend>
      <form id="form-reviewer-notification" role="form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        <div class="control-group">
          <div class="control-label"> <?php echo JText::_('To'); ?> </div>
          <div class="controls"> <?php echo $this->item->email; ?> </div>
        </div>
        <div class="control-group">
          <div class="control-label"> <?php echo $this->formnotification->getLabel('subject'); ?> </div>
          <div class="controls"> <?php echo $this->formnotification->getInput('subject'); ?> </div>
        </div>
        <div class="control-group">
          <div class="control-label"> <?php echo $this->formnotification->getLabel('body'); ?> </div>
          <div class="controls"> <?php echo $this->formnotification->getInput('body'); ?> </div>
        </div>
        <div class="control-group">
          <div class="form-actions">
            <button type="submit" class="btn btn-primary" ><?php echo JText::_('Send'); ?></button>
            <?php echo JText::_('or'); ?> <a href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewerform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a> 
            <input type="hidden" name="option" value="com_confmgt" />
            <input type="hidden" name="jform[email]" value="<?php echo $this->item->email; ?>" />
            <input type="hidden" name="task" value="rev1ewerform.notify" />
            <?php echo JHtml::_('form.token'); ?> </div>
        </div>
      </form>
    </div>
  </fieldset>
</div>
