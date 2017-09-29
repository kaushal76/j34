<?php
/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - htttp://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT . '/controller.php';

/**
 * Controller class for reviewer for paper form
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtControllerRev1ewersforPaperForm extends ConfmgtController
{
    /**
     * Method to check out an item for editing and redirect to the edit form.
     *
     * @since    1.6
     */
    public function edit()
    {
        $app = JFactory::getApplication();

        $previousId = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
        $editId = JFactory::getApplication()->input->getInt('id', null, 'array');

        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', $editId);

        $model = $this->getModel('Rev1ewersforPaperForm', 'ConfmgtModel');

        // Check out the item
        if ($editId) {
            $model->checkout($editId);
        }

        if ($previousId) {
            $model->checkin($previousId);
        }

        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewersforpaper&layout=edit', false));
    }

    /**
     * Method to save data.
     *
     * @return    void
     * @since    1.6
     */
    private function save_common($url_success, $url_fail)
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('rev1ewersforpaperForm', 'ConfmgtModel');

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $linkid = $model->getLinkid();

        // Get the form.
        $form = $model->getForm();
        if (!$form) {
            JFactory::$application->enqueueMessage($model->getError(), 500);
            return false;
        }
        $data = $model->validate($form, $data);
        if ($data === false) {
            $errors = $model->getErrors();

            for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
                if ($errors[$i] instanceof Exception) {
                    $app->enqueueMessage($errors[$i]->getMessage(), 'warning');
                } else {
                    $app->enqueueMessage($errors[$i], 'warning');
                }
            }
            $app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', JFactory::getApplication()->input->get('jform', array(), 'array'), array());
            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
            $this->setRedirect($url_fail, false);
            return false;
        }

        $data['paperid'] = $linkid;
        $data['reviewerid'] = $data['rev1ewer'];

        $return = $model->save($data);


        if ($return === false) {
            $app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', $data);
            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
            JFactory::$application->enqueueMessage(JText::sprintf('Save failed', $model->getError()), 'Error');

            $this->setRedirect(JRoute::_($url_fail . $id, false));
            return false;
        }


        // Check in
        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', null);
        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_ITEM_SAVED_SUCCESSFULLY'));
        $this->setRedirect(JRoute::_($url_success, false));
        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', null);

    }

    public function save()
    {
        $app = JFactory::getApplication();
        $id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
        $url_success = 'index.php?option=com_confmgt&view=rev1ewersforpaperform';
        $url_fail = 'index.php?option=com_confmgt&view=rev1ewersforpaperform&layout=edit&id=' . $id;

        $this->save_common($url_success, $url_fail);
    }

    public function update_save()
    {
        $app = JFactory::getApplication();
        $id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
        $url_success = 'index.php?option=com_confmgt&view=rev1ewersforpaperform';
        $url_fail = 'index.php?option=com_confmgt&view=rev1ewersforpaperform&id=' . $id;

        $this->save_common($url_success, $url_fail);
    }

    function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=papers&layout=leader_default', false));
    }

    function update_cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=leader_default', false));
    }


    public function remove()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $app = JFactory::getApplication();
        $model = $this->getModel('Rev1ewersforPaperForm', 'ConfmgtModel');
        $linkid = $model->getLinkid();

        $data = JFactory::getApplication()->input->get('jform', array(), 'array');
        $return = $model->delete($data);

        if ($return === false) {
            $app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', $data);

            $id = (int)$app->getUserState('com_confmgt.edit.rev1ewersforpaper.id');
            $this->setMessage(JText::sprintf('Delete failed', $model->getError()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_confmgt&view=rev1ewersforpaperForm&layout=edit&id=' . $id, false));
            return false;
        }

        if ($return) {
            $model->checkin($return);
        }

        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.id', null);
        JFactory::$application->enqueueMessage(JText::_('COM_CONFMGT_ITEM_DELETED_SUCCESSFULLY'));
        $link = "index.php?option=com_confmgt&view=rev1ewersforpaperForm&layout=edit&linkid=".$linkid;
        $this->setRedirect(JRoute::_($link, false));

        $app->setUserState('com_confmgt.edit.rev1ewersforpaper.data', null);
    }


}