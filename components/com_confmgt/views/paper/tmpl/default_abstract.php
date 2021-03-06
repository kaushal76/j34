<?php
/**
 * @version     2.5.8.1
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// no direct access

defined('_JEXEC') or die;

//adding overriding styles
$url = "http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/css/bootstrap-editable.css";
$document = JFactory::getDocument();
//$document->addStyleSheet($url);

$url = "http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/js/bootstrap-editable.min.js";
$document = JFactory::getDocument();
$document->addScript($url);

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h1>
      <?php
		echo JText::_('COM_CONFMGT_PAPER_ABSRTACT_HEADING') . ' - ' . JText::_('Paper ID') . $this->item->id; ?>
    </h1>
  </div>
  <div class="panel-body">
  </div>
  <table class="table table-striped">
    <tr>
      <td width="20%" class="header"><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_ID'); ?>
        : </td>
      <td><?php
		echo $this->item->id; ?></td>
    </tr>
    <tr>
      <td class="header"><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_TITLE'); ?>
        :</td>
      <td><div id="title" data-type="text" data-pk="<?php echo $this->item->id; ?> " data-url="index.php?option=com_confmgt&task=paperform.save_ajax&tmpl=component" data-title="Enter Title" name="jform[title]"><?php
		echo $this->item->title; ?></div></td>
    </tr>
    <tr>
      <td class="header"><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_ABSTRACT'); ?>
        : </td>
      <td><?php
		echo nl2br($this->item->abstract); ?></td>
    </tr>
    <tr>
      <td class="header"><?php
		echo JText::_('COM_CONFMGT_FORM_LBL_PAPER_KEYWORDS'); ?>
        :</td>
      <td><?php
		echo $this->item->keywords; ?></td>
    </tr>
  </table>
</div>

    <div>
      <form id="form-abstract-new-<?php echo $this->item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
        <?php echo JHtml::_('form.token'); ?>
        <input type="hidden" name="option" value="com_confmgt" />
        <input type="hidden" name="task" value="paper.edit" />
        <input type="hidden" name="id" value="<?php echo $this->linkid; ?>" />
        <button class="btn btn-default btn-sm" type="submit">
        <?php echo JText::_("COM_CONFMGT_EDIT_ABSRTACT"); ?>
        </button>
      </form>
    </div>

<a href="#myModal" class="btn" data-toggle="modal"> Click here to see my image</a>

<?php echo JHTML::_('bootstrap.renderModal', 'myModal', array(), '<img src="https://static.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg" />'); ?>