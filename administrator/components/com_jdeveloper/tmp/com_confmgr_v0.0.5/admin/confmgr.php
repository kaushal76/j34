<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined("_JEXEC") or die("Restricted access");

require_once JPATH_COMPONENT_ADMINISTRATOR.'/helpers/confmgr.php';

$controller	= JControllerLegacy::getInstance('Confmgr');
$input = JFactory::getApplication()->input;

if (!JFactory::getUser()->authorise('core.manage', 'com_jdeveloper'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

try {
	$controller->execute($input->get('task'));
} catch (Exception $e) {
	$controller->setRedirect(JURI::base(), $e->getMessage(), 'error');
}

$controller->redirect();
?>