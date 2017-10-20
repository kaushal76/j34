<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// No direct access.
defined('_JEXEC') or die;


/**
 * Model class for a Review
 *
 * @package CONFMGT
 *
 * @since version 3.8.0
 */

class ConfmgtModelRev1ew extends JModelItem {

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState() {
        $app = JFactory::getApplication('com_confmgt');

        // Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.rev1ew.id');
        } else {
            $id = JFactory::getApplication()->input->get('rev_id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.rev1ew.id', $id);
        }
        $this->setState('rev1ew.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('rev1ew.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }

    /**
     * Method to get the paperID
     * @return bool/mixed
     * @since version 3.8.0
     */

    public function getLinkid()
    {
        $linkid = JFactory::getApplication()->input->get('linkid');
        if (!$linkid) {
            throw new Exception(JText::_('JERROR_NO_PAPERID'),404);
        } else {
            return $linkid;
        }
    }

    /**
     * Method to get an ojbect.
     *
     * @param	integer	The id of the object to get.
     *
     * @return	mixed	Object on success, false on failure.
     */
    public function getData($id = null) {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('rev1ew.id');
            }

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
            } elseif ($error = $table->getError()) {
                JFactory::$application->enqueueMessage($error);
            }
        }

        
		if ( isset($this->_item->created_by) ) {
			$this->_item->created_by = JFactory::getUser($this->_item->created_by)->name;
		}

        return $this->_item;
    }


    /**
     * @param null $id
     * Method to get the paper object
     *
     * @return bool|object
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function getPaper($id = null)
    {
        $this->_paperItem = false;

        if (empty($id)) {
            $id = $this->getLinkid();
        }

        $table = $this->getTable('Paper', 'ConfmgtTable');
        if ($table->load($id)) {
            $id = $table->id;
            $canEdit = AclHelper::isAuthor($id);

            if (!$canEdit) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 500);
            }

            $abstract_table = $this->getTable('Abstract', 'ConfmgtTable');
            $fullpaper_table = $this->getTable('Fullpaper', 'ConfmgtTable');

            $properties = $table->getProperties(1);

            if ($table->abstract_id > 0) {
                if (!$abstract_table->load($table->abstract_id)) {
                    JFactory::$application->enqueueMessage('Could not load abstract data');
                    return false;
                }else{
                    $properties['abstract'] = $abstract_table->abstract;
                }
            }

            if ($table->fullpaper_id > 0) {
                if (!$fullpaper_table->load($table->fullpaper_id)) {
                    JFactory::$application->enqueueMessage('Could not load abstract data');
                    return false;
                }else{
                    $properties['full_paper'] = $fullpaper_table->full_paper;
                }
            }

            $this->_paperItem = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');
            if (isset($this->_paperItem->full_paper)) {
                $this->_paperItem->full_paper_download = $this->_FullPaperDownloadBtn($this->_paperItem->full_paper);
            }
        } elseif ($error = $table->getError()) {
            JFactory::$application->enqueueMessage($error);
        }
        return $this->_paperItem;
    }

    /**
     * Get the table object
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     *
     * @since version 3.8.0
     */
    public function getTable($type = 'Rev1ew', $prefix = 'ConfmgtTable', $config = array()) {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkin($id = null) {
        // Get the id.
        $id = (!empty($id)) ? $id : (int) $this->getState('rev1ew.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    JFactory::$application->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to check out an item for editing.
     *
     * @param	integer		The id of the row to check out.
     * @return	boolean		True on success, false on failure.
     * @since	1.6
     */
    public function checkout($id = null) {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int) $this->getState('rev1ew.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    JFactory::$application->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }


    /**
     * Method to publish a review
     *
     * @param $id
     * @param $state
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function publish($id, $state) {
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;
        return $table->store();
    }


    /**
     * Method to delete a review
     *
     * @param $id
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function delete($id) {
        $table = $this->getTable();
        return $table->delete($id);
    }

    /**
     * Generate the download Btn
     *
     * @param $filename
     *
     * @return string
     *
     * @since version 3.8.0
     */
    private function _FullPaperDownloadBtn ($filename)
    {
        $html =  "<div style=\"display:inline\">";
        $html = $html. "<form id=\"form-download\"";
        $html = $html." action=\"".JRoute::_('index.php')."\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html.JHtml::_('form.token');
        $html = $html."<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html."<input type=\"hidden\" name=\"task\" value=\"paper.downloadfullpaper\" />";
        $html = $html."<input type=\"hidden\" name=\"filename\" value=\"".$filename."\" />";
        $html = $html."<button class=\"btn btn-default\" type=\"submit\">";
        $html = $html."<i class=\"icon-download\"></i>";
        $html =	$html.JText::_("Download");
        $html = $html."</button></form></div>";
        return $html;

    }

}
