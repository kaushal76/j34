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

<script type="text/javascript">
	Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		}
		else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_jdeveloper&view=libraries'); ?>" method="post" name="adminForm" id="adminForm">
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
		<div class="item_head" style="background-color:#000088;">
		<a href="<?php echo JRoute::_("index.php?option=com_jdeveloper&view=library&id=" . $item->id, false); ?>">
			<i class="item_name"><?php echo $item->display_name; ?></i>
		</a>
		</div>
		<div style="background-color:#999999; height:5px;"></div>
		<table class="item_info">
			<tbody>
				<tr>
					<td>
						<?php echo JText::_('COM_JDEVELOPER_FIELD_INSTALLED_LABEL'); ?>: 
						<?php echo $item->installed ? "<i class=\"icon-publish\"></i>" : '<i class="icon-unpublish"></i>'; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo JText::_('COM_JDEVELOPER_FIELD_DOWNLOAD_LABEL') ?>: 
					<?php echo JHtml::_("jdgrid.archives", "lib_", $item->name) ?></td>
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
	<div class="item span4">
		<div class="item_head" style="background-color:#00aa00;">
		<a href="<?php echo JRoute::_("index.php?option=com_jdeveloper&task=library.add", false); ?>">
			</i><i class="item_name"><?php echo JText::_("COM_JDEVELOPER_NEW_LIBRARY"); ?></i>
		</a>
		</div>
	</div>	
	<div>
		<input type="hidden" name="task" value=" " />
		<input type="hidden" name="boxchecked" value="0" />
		<!-- Sortierkriterien -->
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>

	</form>
</div>