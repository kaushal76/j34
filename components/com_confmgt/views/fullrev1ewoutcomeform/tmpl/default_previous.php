<?php
/**
 * @version     2.5.7
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// no direct access
defined('_JEXEC') or die;
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h1>
      <?php
		echo JText::_('COM_CONFMGT_PAPER_PREVIOUS_PANEL_HEADING') . ' - ' . JText::_('Paper ID') . $this->item->id; ?>
    </h1>
  </div>
  <div class="panel-body">
    <div align="right"> </div>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th width="5%" class="header"><?php echo JText::_('#'); ?></th>
        <th class="header"><?php echo JText::_('Full paper'); ?></th>
        <th class="header"><?php echo JText::_('Review outcome'); ?></th>
        <th class="header"><?php echo JText::_('Review comments'); ?></th>
        <th width = "15%" class="header"><?php echo JText::_('Submitted on'); ?></th>
      </tr>
    </thead>
    <tbody>
      	<?php
		if ($this->previousFullPapers)
		{
			$i=1;
    	foreach($this->previousFullPapers as $previousFullPaper)
			{
		?>
      <tr>
        <td><?php echo $i; ?></td>
        <td>
            <a href="<?php echo JRoute::_('index.php?option=com_confmgt&task=paper.downloadfullpaper.&filename='.$previousFullPaper->full_paper); ?>">
            <?php echo $previousFullPaper->full_paper ?></a>
        </td>
        <td><?php echo $previousFullPaper->full_review_outcome ?></td>
        <td><?php echo nl2br($previousFullPaper->full_review_comments) ?></td>
        <td><?php echo $previousFullPaper->last_updated ?></td>
        
      </tr>
      <?php 	$i=$i+1;
	  		
			}
		}
	?>
    </tbody>
  </table>
</div>
