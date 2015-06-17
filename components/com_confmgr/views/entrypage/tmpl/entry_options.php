<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.modal');
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h1><?php echo JText::sprintf('COM_CONFMGT_VIEW_ENTRYPAGE_ENTRY_OPTIONS_PANEL_HEADING', $this->sitename); ?></h1>
	</div>
	<div class="panel-body">
		<p><?php echo JText::_('COM_CONFMGT_VIEW_ENTRYPAGE_ENTRY_OPTIONS_PANEL_DETAILS'); ?></p>
		<div align="center">
			<div class="button-container">
				<div class="inline">
					<a href="#loginmodal" role="button"
						class="btn btn-default btn-entry" id="loginmodalbtn"
						data-toggle="modal"> <span class="centre"> <img
							src="components/com_confmgr/assets/img/Login-icon.png"
							alt="Login" height="42" width="42">
					</span>
			<?php echo JText::_("COM_CONFMGT_VIEW_ENTRYPAGE_ENTRY_OPTIONS_LOGIN"); ?>
			</a> <a href="#registermodal" role="button"
						class="btn btn-default btn-entry" id="registermodalbtn"
						data-toggle="modal"> <span class="centre"> <img
							src="components/com_confmgr/assets/img/Register-icon.png"
							alt="Login" height="42" width="42">
					</span>
			<?php echo JText::_("COM_CONFMGT_VIEW_ENTRYPAGE_ENTRY_OPTIONS_CREATE"); ?>
			</a>
				</div>
				<div align="center">
					<p>
						<a href="index.php?option=com_users&view=reset"><?php echo JText::_('Forgot your password?'); ?></a>
					</p>
					<p>
						<a href="index.php?option=com_users&view=remind"><?php echo JText::_('Forgot your username?'); ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


