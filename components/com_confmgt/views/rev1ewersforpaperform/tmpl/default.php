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
JHtml::_('behavior.formvalidation');
JHtml::_('bootstrap.alert', 'error');

$document = JFactory::getDocument();
$url = 'components/com_confmgt/assets/js/jquery_custom.js';
$document->addScript($url);


if ($this->item->paper_student_submission) {
	$canView = $this->isThemeleader;
	$canEdit = $this->isThemeleader;
}else{
	$canView = $this->isThemeleader;
	$canEdit = $this->isThemeleader;
}

if ($canView): 
	if ($this->item): 

?>

<div>
  <ul class="nav nav-tabs"  id="tabs">
    <li><a href="#rev1ewer_form" data-toggle="tab"> <?php echo JText::_('Assign reviewers'); ?> </a></li>
    <li><a href="#reviewers" data-toggle="tab"> <?php echo JText::_('Reviewers Assigned so far'); ?> </a></li>
    <li><a href="#authors" data-toggle="tab"> <?php echo JText::_('Authors Details'); ?> </a></li>
    <li><a href="#abstract" data-toggle="tab"> <?php echo JText::_('Abstract details'); ?> </a></li>
    <li><a href="#paper" data-toggle="tab"> <?php echo JText::_('Paper Details'); ?> </a></li>
  </ul>
  <div class="tab-content">
    <div id="rev1ewer_form" class="tab-pane fade">
      <?php
echo $this->loadTemplate('form');
if (!empty($this->rev1ewers)) {
	echo $this->loadTemplate('rev1ewers');
}
?>
    </div>
    <div id="reviewers" class="tab-pane fade">
      <?php
echo $this->loadTemplate('rev1ewers');
?>
    </div>
    <div id="authors" class="tab-pane fade">
      <?php
echo $this->loadTemplate('authors');
?>
    </div>
    <div id="abstract" class="tab-pane fade">
      <?php
echo $this->loadTemplate('abstract');
?>
    </div>
    <div id="paper" class="tab-pane fade">
      <?php
echo $this->loadTemplate('paper');
?>
    </div>
    <form id="form-paper-list-<?php
		echo $this->item->paper_id ?>" style="display:inline" action="<?php
		echo JRoute::_('index.php'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
      <?php
		echo JHtml::_('form.token'); ?>
      <input type="hidden" name="option" value="com_confmgt" />
      <input type="hidden" name="view" value="papers" />
      <input type="hidden" name="layout" value="leader_default" />
      <button class="btn btn-default" type="submit">
        <i class="icon-arrow-left"></i>
      <?php
		echo JText::_("Back"); ?>
      </button>
    </form>
    <?php
	else:
?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php
		echo JText::_('COM_CONFMGT_PAPER_FORM_PANEL_HEADING'); ?>
      </div>
      <div class="panel-body"> </div>
    </div>
    <?php
	endif;
else:
?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php
	echo JText::_('COM_CONFMGT_PAPER_FORM_PANEL_NOT_AUTHORISED'); ?>
      </div>
      <div class="panel-body"> </div>
    </div>
<?php
endif;
?>
  </div>
</div>








