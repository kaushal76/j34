<?php
/**
 * @package     JDeveloper
 * @subpackage  Views
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
?>

<style>
div.buttonbox {
	border-radius: 5px;
	color: #ffffff;
	font-seize: 20px;
	font-weight: 700;
	height: 50px;
	padding: 10px;
	width: 50px;
}
</style>

<div id="j-sidebar-container" class="span3">
	<?php echo JLayoutHelper::render("sidebar", array("active" => "jdeveloper"), JDeveloperLAYOUTS); ?>
</div>

<div id="j-main-container" class="span9">
	<div class="row-fluid">
		<div class="span12">
		<h3><?php echo JText::_("COM_JDEVELOPER_JDEVELOPER_VERSION_CHECK") ?></h3>
		<?php if (null !== $item = JDeveloperHelper::getUpdate()) : ?>
			<div class="alert alert-info">
				<b>JDeveloper Update:</b> Version <?php echo $item->version; ?> is now available.
				<a href="<?php echo JRoute::_("index.php?option=com_installer&view=update") ?>"><button class="btn btn-primary">Update</button></a>
			</div>
		<?php else: ?>		
			<div class="alert alert-success">Latest JDeveloper version is installed.</div>
		<?php endif; ?>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span5 hidden-phone">
			<h3><?php echo JText::_("COM_JDEVELOPER_SUBMENU_DOCUMENTATION"); ?></h3>
			<iframe src="//de.slideshare.net/slideshow/embed_code/key/sjKMTFS470zWle" width="425" height="355" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"> <strong> <a href="//de.slideshare.net/jcmsdevelopment/j-developer-create-component-50795531" title="JDeveloper - create component" target="_blank">JDeveloper - create component</a> </strong> from <strong><a href="//www.slideshare.net/jcmsdevelopment" target="_blank">jcmsdevelopment</a></strong> </div>
			<a target="_blank" href="http://www.slideshare.net/jcmsdevelopment"><?php echo JText::_("COM_JDEVELOPER_TITLE_MORE_TUTORIALS"); ?></a>
		</div>
		<div class="span7">
			<h3><?php echo JText::_("COM_JDEVELOPER_JDEVELOPER_HEADLINE_ARCHIVES") ?></h3>
			<?php if (empty($this->archives)) : ?>
			<div class="alert alert-no-items">
				<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
			<?php else : ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<td>Num</td>
							<td>Archive</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($this->archives as $i => $item) : ?>
						<tr>
							<td><?php echo $i + 1; ?></td>					
							<td><a href="<?php echo $item->link; ?>"><?php echo $item->name; ?></a></td>					
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
	</div>
	<div>
		<input type="hidden" name="task" value=" " />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</div>