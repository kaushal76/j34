<?php
/**
 * @package     JDeveloper
 * @subpackage  Views
 *
 * @copyright  	Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
?>

<form action="<?php echo JRoute::_('index.php?option=com_jdeveloper&view=components'); ?>" method="post" name="adminForm" id="adminForm">
	<?php if (!empty( $this->sidebar)) : ?>
		<div id="j-sidebar-container" class="span2">
			<?php echo $this->sidebar; ?>
		</div>
		<div id="j-main-container" class="span10">
	<?php else : ?>
		<div id="j-main-container">
	<?php endif;?>	
	<?php
		// Search tools bar
		echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
	?>
	<p>&nbsp;</p>
	<?php foreach ($this->items as $i => $item) : ?>
	<?php if ($i % 3 == 0) : ?>
	<div class="row-fluid">
	<?php endif; ?>
	<div class="item span4">
		<div class="item_head">
		<a href="<?php echo JRoute::_("index.php?option=com_jdeveloper&view=component&id=" . $item->id, false); ?>">
			<i class="item_name"><?php echo $item->display_name; ?></i>
		</a>
		</div>
		<div style="background-color:#999999; height:5px;"></div>
		<table class="item_info">
			<tbody>
				<tr>
					<td><?php echo JText::_('COM_JDEVELOPER_COMPONENT_FIELD_INSTALLED_LABEL') ?>: 
						<?php if (empty($item->installed)) : ?>
						<i class="icon-unpublish"></i>
						<?php else : ?>
						<?php if ($item->site) : ?>
							<a class="badge badge-info" href="<?php echo JURI::root(); ?>index.php?option=com_<?php echo $item->name; ?>"><?php echo JText::_("COM_JDEVELOPER_FRONTEND") ?></a>
						<?php endif; ?>
						<a class="badge badge-info" href="<?php echo JURI::base(); ?>index.php?option=com_<?php echo $item->name; ?>"><?php echo JText::_("COM_JDEVELOPER_BACKEND") ?></a>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo JText::_('COM_JDEVELOPER_FIELD_DOWNLOAD_LABEL') ?>: <?php echo JHtml::_("jdgrid.archives", "com_", $item->name); ?></td>
				</tr>
				<tr>
					<td><?php echo JText::_('COM_JDEVELOPER_FIELD_CREATED_BY') ?>: <?php echo JHtml::_("jdgrid.author", $item->created_by, $item->author_name); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php if ($i - 2 % 3 == 0) : ?>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
	<?php echo $this->loadTemplate('batch'); ?>
	<div>
		<input type="hidden" name="task" value=" " />
		<input type="hidden" name="view" value="components" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>