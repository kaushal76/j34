<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined("_JEXEC") or die("Restricted access");

// necessary libraries
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

// sort ordering and direction
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
?>
<style>
.row2 {
	background-color: #e4e4e4;
}
</style>

<h2><?php echo JText::_('COM_CONFMGR_PAPER_VIEW_PAPERS_TITLE'); ?></h2>
<form action="<?php JRoute::_('index.php?option=com_mythings&view=mythings'); ?>" method="post" name="adminForm" id="adminForm">
	<table class="category table table-striped table-bordered table-hover">	
		<thead>
			<tr>				
				<th id="itemlist_header_title">
					<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.abstract_id', $listDirn, $listOrder); ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_FULL_PAPER_ID_LABEL'), 'a.full_paper_id', $listDirn, $listOrder) ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_CAMERA_READY_PAPER_ID_LABEL'), 'a.camera_ready_paper_id', $listDirn, $listOrder) ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_PRESENTATION_ID_LABEL'), 'a.presentation_id', $listDirn, $listOrder) ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_TITLE_LABEL'), 'a.title', $listDirn, $listOrder) ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_STUDENT_PAPER_LABEL'), 'a.student_paper', $listDirn, $listOrder) ?>
				</th>
				<th class="nowrap left">
					<?php echo JHtml::_('grid.sort', JText::_('COM_CONFMGR_PAPER_FIELD_CREATED_BY_LABEL'), 'a.created_by', $listDirn, $listOrder) ?>
				</th>
				<?php if ($this->user->authorise('core.edit') || $this->user->authorise('core.edit.own')) : ?>
				<th id="itemlist_header_edit"><?php echo JText::_('COM_CONFMGR_EDIT_ITEM'); ?></th>
				<?php endif; ?>
			</tr>
		</thead>		
		<tbody>
		<?php foreach ($this->items as $i => $item) :
		$canEdit	= $this->user->authorise('core.edit',       'com_confmgr');
		$canEditOwn	= $this->user->authorise('core.edit.own',   'com_confmgr');
		$canDelete	= $this->user->authorise('core.delete',       'com_confmgr');
		$canCheckin	= $this->user->authorise('core.manage',     'com_checkin') || $item->checked_out == $this->user->id || $item->checked_out == 0;
		$canChange	= $this->user->authorise('core.edit.state', 'com_confmgr') && $canCheckin;
		?>
			<tr class="row<?php echo $i % 2; ?>">				
				<td headers="itemlist_header_title" class="list-title">
					<?php if (isset($item->access) && in_array($item->access, $this->user->getAuthorisedViewLevels())) : ?>
						<a href="<?php echo JRoute::_("index.php?option=com_confmgr&view=paper&id=" . $item->id); ?>">
							<?php echo $this->escape($item->abstract_id); ?>
						</a>
					<?php else: ?>
						<?php echo $this->escape($item->abstract_id); ?>
					<?php endif; ?>
					<?php if ($item->published == 0) : ?>
						<span class="list-published label label-warning">
							<?php echo JText::_('JUNPUBLISHED'); ?>
						</span>
					<?php endif; ?>
				</td>
				<td style="width:50%"><?php echo $this->escape($item->full_paper_id); ?></td>
				<td style="width:50%"><?php echo $this->escape($item->camera_ready_paper_id); ?></td>
				<td style="width:50%"><?php echo $this->escape($item->presentation_id); ?></td>
				<td style="width:50%"><?php echo $this->escape($item->title); ?></td>
				<td style="width:50%"><?php echo $this->escape($item->student_paper); ?></td>
				<td style="width:50%"><?php echo $this->escape($item->created_by); ?></td>
				<?php if ($this->user->authorise('core.edit') || $this->user->authorise('core.edit.own')) : ?>
				<td headers="itemlist_header_edit" class="list-edit">
					<?php if ($canEdit || $canEditOwn) : ?>
						<a href="<?php echo JRoute::_("index.php?option=com_confmgr&task=paper.edit&id=" . $item->id); ?>"><i class="icon-edit"></i> <?php echo JText::_("JGLOBAL_EDIT"); ?></a>
					<?php endif; ?>
				</td>
				<?php endif; ?>
			</tr>
		<?php endforeach ?>
		</tbody>		
		<tfoot>
			<tr>
				<td colspan="7"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
		</tfoot>	
	</table>
	<div>
		<input type="hidden" name="task" value=" " />
		<input type="hidden" name="boxchecked" value="0" />
		<!-- Sortierkriterien -->
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>