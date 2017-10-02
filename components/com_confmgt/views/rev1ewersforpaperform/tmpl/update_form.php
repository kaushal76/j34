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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

?>

<div class = 'form-horizontal'>
  <fieldset>
    <div class="author-edit front-end-edit">
      <?php if (!empty($this->item->paper_id)): ?>
      <legend><?php echo JText::_('Allocate Reviewers'); ?></legend>
      <?php else: ?>
      <legend><?php echo JText::_('Allocate Reviewers'); ?></legend>
      <?php endif; ?>
      <form id="form-author" role="form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
    	<div class="control-group">
          <div class="control-label"> <?php echo $this->form->getLabel('rev1ewer'); ?> </div>
          <div class="controls"> <?php echo $this->form->getInput('rev1ewer'); ?> </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary" ><?php echo JText::_('JSUBMIT'); ?></button>
            <?php echo JText::_('or'); ?> <a href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewersforpaperform.update_cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            <input type="hidden" name="option" value="com_confmgt" />
            <input type="hidden" name="task" value="rev1ewersforpaperform.update_save" />
            <input type="hidden" name="linkid" value="<?php echo $this->item->paper_id; ?>" />
            <?php echo JHtml::_('form.token'); ?> 
           </div>
        </div>
      </form>
    </div>
  </fieldset>
</div>
