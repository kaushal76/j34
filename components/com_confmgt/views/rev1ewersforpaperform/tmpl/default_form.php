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

  <div class = 'form-horizontal'>
    <fieldset>
      <div class="reviewersforpaper-edit front-end-edit">
        <?php if (!empty($this->item->paper_id)): ?>
        <legend><?php echo JText::_('Add a reviewer - Paper ID ');echo $this->item->paper_id ; ?></legend>
        <?php endif; ?>
        <form id="form-author" role="form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <div class="control-label"> <?php echo $this->form->getLabel('id'); ?> </div>
            <div class="controls"> <?php echo $this->form->getInput('id'); ?> </div>
          </div>
          <div class="control-group">
            <div class="control-label"> <?php echo $this->form->getLabel('rev1ewer'); ?> </div>
            <div class="controls"> <?php echo $this->form->getInput('rev1ewer'); ?> </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-primary" ><?php echo JText::_('Add'); ?></button>
              <?php echo JText::_('or'); ?> <a href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewersforpaperform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
              <input type="hidden" name="option" value="com_confmgt" />
              <input type="hidden" name="linkid" value="<?php echo $this->item->paper_id; ?>" />
              <input type="hidden" name="task" value="rev1ewersforpaperform.save" />
              <?php echo JHtml::_('form.token'); ?> </div>
          </div>
        </form>
      </div>
    </fieldset>
  </div>