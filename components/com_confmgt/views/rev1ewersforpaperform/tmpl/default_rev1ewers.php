<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// no direct access

$document = JFactory::getDocument();
$bootboxurl = "components/com_confmgt/assets/js/bootbox.min.js";
$delurl = "components/com_confmgt/assets/js/del.js";
$document->addScript($bootboxurl);
$document->addScript($delurl);

defined('_JEXEC') or die;
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h1>
      <?php
		echo JText::_('COM_CONFMGT_PAPER_REVIEWER_PANEL_HEADING') . ' - ' . JText::_('Paper ID') . $this->item->paper_id; ?>
    </h1>
  </div>
    <?php
  if ($this->rev1ewers)
  { ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th><?php echo JText::_('#'); ?> </th>
          <th><?php echo JText::_('Name'); ?> </th>
          <th><?php echo JText::_('Remove'); ?> </th> 
        </tr>
      </thead>
      <tbody>
        <?php
  $i=1;
  foreach($this->rev1ewers as $rev1ewer)
  { ?>
        <tr>
          <td width="5%"><?php
		echo $i; ?></td>
          <td width="90%"><?php
			echo ( $rev1ewer->revtitle . ' ' . $rev1ewer->revfirstname . ' ' . $rev1ewer->revsurname );  
		  ?></td>
          <td>

              <a
                  data-toggle="confirm"
                  data-header="Delete confirmation"
                  data-title="Do you really want to delete the record?"
                  href="<?php echo JRoute::_('index.php?option=com_confmgt&task=rev1ewersforpaperform.remove&jform[rev_id]=' . $rev1ewer->id.'&linkid='.$this->item->paper_id); ?>">
                  <i class="icon-trash icon-white"></i>
              </a>
          </td>
        </tr>
        <?php $i = $i+1;
  }  ?>
      </tbody>
    </table>
    <?php }else{ ?>
    <div>
      <?php 
  		echo JText::_('COM_CONFMGT_PAPER_REVIEWER_EMPTY'); 
  	  ?>
    </div>
    <?php } ?>
  </div>

