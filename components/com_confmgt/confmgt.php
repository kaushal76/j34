<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */

// No direct access

defined('_JEXEC') or die ();

// adding helpers
JLoader::register('MainHelper', JPATH_COMPONENT . '/helpers/confmgt.php');
JLoader::register('AjaxvalidateHelper', JPATH_COMPONENT . '/helpers/ajaxvalidate.php');
JLoader::register('AclHelper', JPATH_COMPONENT . '/helpers/acl.php');
JLoader::register('EmailHelper', JPATH_COMPONENT . '/helpers/email.php');
JLoader::register('UploadHelper', JPATH_COMPONENT . '/helpers/upload.php');

// adding overiding styles
$url      = "components/com_confmgt/assets/css/confmgt.css";
$document = JFactory::getDocument();
$document->addStyleSheet($url);
$input = JFactory::getApplication()->input;

// Execute the task.
$controller = JControllerLegacy::getInstance('Confmgt');
$controller->registerDefaultTask('displayDefault');
try
{
	$controller->execute($input->get('task'));
}
catch (Exception $e)
{
	$controller->setRedirect(JURI::base(), $e->getMessage(), 'error');
}
$controller->redirect();
