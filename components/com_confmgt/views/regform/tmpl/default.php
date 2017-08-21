<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
//no direct access 
defined('_JEXEC') or die;

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo JText::_('New Account'); ?></h3>
	</div>
	<div class="panel-body">
		<div class='form-horizontal'>
			<fieldset>
				<div class="reg-edit front-end-edit">
					<legend><?php echo JText::_('Creating a new account'); ?></legend>
					<form id="form-reg" role="form" action="<?php echo JRoute::_('index.php'); ?>
							" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
						<div class="control-group">
							<div class="control-label"> <?php echo $this->form->getLabel('id'); ?> </div>
							<div class="controls"> <?php echo $this->form->getInput('id'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('title'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('title'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('firstname'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('firstname'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('surname'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('surname'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('email'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('email'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('username'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('username'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('password'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('password'); ?> </div>
						</div>
						<div class="control-group">
							<div class="control-label"> <?php echo $this->
								form->getLabel('password2'); ?> </div>
							<div class="controls"> <?php echo $this->
								form->getInput('password2'); ?> </div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit"
								        class="btn btn-primary"><?php echo JText::_('JSUBMIT'); ?> </button>
								<?php echo JText::_('or'); ?> <a
									href="<?php echo JRoute::_('index.php?option=com_confmgt&task=regform.cancel'); ?>"
									title="<?php echo JText::_('JCANCEL'); ?>
											"><?php echo JText::_('JCANCEL'); ?> </a>
								<input type="hidden" name="option" value="com_confmgt"/>
								<input type="hidden" name="task" value="regform.save"/>
								<?php echo JHtml::_('form.token'); ?> </div>
						</div>
					</form>
				</div>
			</fieldset>
		</div>
	</div>
</div>
