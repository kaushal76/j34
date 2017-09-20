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
 * Confmgt model.
 */
class ConfmgtModelPaper extends JModelItem
{

    /**
     * Method to auto-populate the model state.
     * Note. Calling getState in this method will result in recursion.
     * @since    1.6
     */

    protected function populateState()
    {

        // Load state from the request userState on edit or from the passed variable on default
        if (JFactory::getApplication()->input->get('layout') == 'edit') {
            $id = JFactory::getApplication()->getUserState('com_confmgt.edit.paper.id');
        } else {
            $id = JFactory::getApplication()->input->get('id');
            JFactory::getApplication()->setUserState('com_confmgt.edit.paper.id', $id);
        }
        $this->setState('paper.id', $id);
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
            throw new Exception(JText::_('JERROR_NO_PAPERID'));
        } else {
            return $linkid;
        }
    }

    /**
     * Method to get an object.
     * @param integer
     * @return mixed Object on success, false on failure.
     * TODO remove depreciated getError / setError methods
     */

    public function getData($id = null)
    {
        $user = JFactory::getUser();
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('paper.id');
            }

            if ($id > 0) {
                $authorised = AclHelper::isAuthor($id);
            } else {
                $authorised = ($user->id > 0);
            }

            if ($authorised !== true) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
            }
            $change_allowed = true;

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);

                // Download Buttons are not properties of the table, hence dealing with those seperately
                if (!isset ($properties['full_paper_download'])) {
                    $properties['full_paper_download'] = null;
                }

                if (!isset ($properties['cameraready_download'])) {
                    $properties['cameraready_download'] = null;
                }

                if (!isset ($properties['cameraReadyBtn'])) {
                    $properties['cameraReadyBtn'] = null;
                }

                if (!isset ($properties['presentation_download'])) {
                    $properties['presentation_download'] = null;
                }

                $this->_item = Joomla\Utilities\ArrayHelper::toObject($properties, 'JObject');

            } elseif ($error = $table->getError()) {
                $this->setError($error);
            }
        }

        if (isset($this->_item->created_by)) {
            $this->_item->created_by = JFactory::getUser($this->_item->created_by)->name;
        }

        $this->_item->abstractBtn = null;
        $this->_item->fullPaperBtn = null;
        $this->_item->full_paper_download = null;
        $this->_item->cameraReadyBtn = null;
        $this->_item->cameraready_download = null;
        $this->_item->presentationBtn = null;
        $this->_item->presentation_download = null;


        //Deal with the abstract review outcome
        switch ($this->_item->abstract_review_outcome) {
            case 1:
                $this->_item->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_ACCEPT');
                if (empty($this->_item->full_paper)) {
                    $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'new');

                } else {
                    if ($change_allowed) {
                        $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'change');
                    }
                    $this->_item->full_paper_txt = $this->_item->full_paper;
                    $this->_item->full_paper_download = $this->_FullPaperDownloadBtn($this->_item->full_paper);
                }

                break;

            case 2:
                $this->_item->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_MINOR_CHANGE');
                $this->_item->abstractBtn = $this->_AbstractBtn($this->_item->id, 'change');
                if (empty($this->_item->full_paper)) {
                    $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'new');
                } else {
                    if ($change_allowed) {
                        $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'change');
                    }
                    $this->_item->full_paper_download = $this->_FullPaperDownloadBtn($this->_item->full_paper);
                    $this->_item->full_paper_txt = $this->_item->full_paper;
                }
                break;

            case 3:
                $this->_item->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_RESUBMIT');
                $this->_item->abstractBtn = $this->_AbstractBtn($this->_item->id, 'resubmit');
                break;

            case 4:
                $this->_item->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_REJECT');
                break;

            case '':
            default:
            case 0:
                $this->_item->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_PENDING');
                if ($change_allowed) {
                    $this->_item->abstractBtn = $this->_AbstractBtn($this->_item->id, 'change');
                }
                if (empty($this->_item->abstract_review_comments)) {
                    $this->_item->abstract_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_COMMENTS_PENDING');
                }
                break;
        }

        //Deal with the full paper review outcome
        switch ($this->_item->full_review_outcome) {
            case 1:
                $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_ACCEPT');
                break;

            case 2:
                $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_MINOR_CHANGE');
                break;

            case 3:
                $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_RESUBMIT');
                $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'resubmit');
                break;

            case 4:
                $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_REJECT');
                break;

            case '':
            default:
            case 0:
                if (empty($this->_item->full_paper)) {
                    $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_NA');
                    $this->_item->full_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_COMMENTS_NA');
                } else {
                    $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_PENDING');
                    $this->_item->full_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_COMMENTS_PENDING');
                    if ($change_allowed) {
                        $this->_item->fullPaperBtn = $this->_FullPaperBtn($this->_item->id, 'change');
                    }
                }
                break;
        }

        //Deal with the camera ready papers
        if (empty($this->_item->camera_ready)) {
            if (($this->_item->full_review_outcome == 1) || ($this->_item->full_review_outcome == 2)) {
                $this->_item->camera_ready_txt = JText::_('COM_CONFMGT_MODEL_PAPER_CAMERA_READY_PENDING');
                $this->_item->cameraReadyBtn = $this->_CameraReadyPaperBtn($this->_item->id, 'new');
                $this->_item->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_NA');
            } else {
                $this->_item->camera_ready_txt = JText::_('COM_CONFMGT_MODEL_PAPER_CAMERA_READY_NA');
                $this->_item->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_NA');
            }
        } else {
            $this->_item->camera_ready_txt = $this->_item->camera_ready;
            if ($change_allowed) {
                $this->_item->cameraReadyBtn = $this->_CameraReadyPaperBtn($this->_item->id, 'change');
            }
            $this->_item->cameraready_download = $this->_CamerareadyDownloadBtn($this->_item->camera_ready);
        }


        //Deal with the presentations
        if (!empty($this->_item->camera_ready)) {
            if (empty($this->_item->presentation)) {
                $this->_item->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_PENDING');
                $this->_item->presentationBtn = $this->_PresentationBtn($this->_item->id, 'new');
            } else {
                if ($change_allowed) {
                    $this->_item->PresentationBtn = $this->_PresentationPaperBtn($this->_item->id, 'change');
                }
                $this->_item->presentation_txt = $this->_item->presentation;
                $this->_item->presentation_download = $this->_PresentationDownloadBtn($this->_item->presentation);
            }
        } else {
            $this->_item->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_PENDING');
        }


        //If still the $this->item->full_paper is blank, it must be not due

        if (empty($this->_item->full_paper)) {
            if (($this->_item->abstract_review_outcome == 1) || ($this->_item->abstract_review_outcome == 2)) {
                $this->_item->full_paper_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_PENDING');
            } else {
                $this->_item->full_paper_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_NA');
            }
        }

        // Deal with submision types

        switch ($this->_item->type) {
            case 1:
                $this->_item->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_ACADEMIC_PAPER');
                break;

            case 2:
                $this->_item->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_POLICY_NOTE');
                break;

            case 3:
                $this->_item->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_DOCTORAL_SCHOOL');
                break;

            case 4:
                $this->_item->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_POSTER');
                break;

            case '':
            default:
                $this->_item->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_ACADEMIC_PAPER');
                break;
        }


        return $this->_item;
    }

    public function getTable($type = 'Paper', $prefix = 'ConfmgtTable', $config = array())
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to check in an item.
     *
     * @param    integer        The id of the row to check out.
     * @return    boolean        True on success, false on failure.
     * @since    1.6
     */
    public function checkin($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('paper.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                if (!$table->checkin($id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to check out an item for editing.
     *
     * @param    integer        The id of the row to check out.
     * @return    boolean        True on success, false on failure.
     * @since    1.6
     */
    public function checkout($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('paper.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                if (!$table->checkout($user->get('id'), $id)) {
                    $this->setError($table->getError());
                    return false;
                }
            }
        }

        return true;
    }


    public function publish($id, $state)
    {
        $user = JFactory::getUser();
        if ($id > 0) {
            $authorised = AclHelper::isAuthor($id);
        } else {
            $authorised = ($user->id > 0);
        }
        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;
        return $table->store();
    }

    public function delete($id)
    {
        $user = JFactory::getUser();
        if ($id > 0) {
            $authorised = AclHelper::isAuthor($id);
        } else {
            $authorised = ($user->id > 0);
        }
        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }
        $table = $this->getTable();
        return $table->delete($id);
    }

    //Generate abstract button
    private function _AbstractBtn($id = 0, $mode = 'change')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-abstract-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['linkid']\" value=" . $id . " />";
        $html = $html . "<input type=\"hidden\" name=\"linkid\" value=" . $id . " />";
        $html = $html . "<input type=\"hidden\" name=\"jform['mode']\" value=\"" . $mode . "\" />";
        if ($mode == 'resubmit') {
            $html = $html . "<input type=\"hidden\" name=\"view\" value=\"abstractform\" />";
        } else {
            $html = $html . "<input type=\"hidden\" name=\"view\" value=\"paperform\" />";
        }
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        if ($mode == 'change') {
            $html = $html . JText::_("Change the abstract");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit the abstract");
        }
        $html = $html . "</button></form></div>";


        return $html;


    }


    //Generate full paper change button
    private function _FullPaperBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-fullpaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"fullpaperform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['linkid']\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['mode']\" value=\"" . $mode . "\" />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        if ($mode == 'change') {
            $html = $html . JText::_("Change");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit");
        } elseif ($mode == 'new') {
            $html = $html . JText::_("Upload");
        }
        $html = $html . "</button></form></div>";

        return $html;

    }

    //Generate camera ready paper change button
    private function _CameraReadyPaperBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-camerapaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"camerareadypaperform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['linkid']\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['mode']\" value=\"" . $mode . "\" />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        if ($mode == 'change') {
            $html = $html . JText::_("Change the Camera Ready paper");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit the Camera Ready paper");
        } elseif ($mode == 'new') {
            $html = $html . JText::_("Upload the Camera Ready paper");
        }
        $html = $html . "</button></form></div>";

        return $html;

    }

    //Generate presentation change button
    private function _PresentationBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-camerapaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"presentationform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['linkid']\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform['mode']\" value=\"" . $mode . "\" />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        if ($mode == 'change') {
            $html = $html . JText::_("Change presenation");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit the presenation");
        } elseif ($mode == 'new') {
            $html = $html . JText::_("Upload the presenation");
        }
        $html = $html . "</button></form></div>";

        return $html;

    }

    //Generate full paper change button
    private function _FullPaperBtnModal($id = 0, $mode = 'new')
    {
        ?>

        <?php
        $html = "<button data-toggle=\"modal\" class=\"btn btn-default\" style=\"display:inline\" type=\"button\" data-target=\"#FullPaperModal\" data-remote=\"" . JRoute::_('index.php?option=com_confmgt&amp;view=fullpaperform&amp;linkid=' . $id . '&amp;mode=' . $mode . '&amp;tmpl=component') . "\">";
        if ($mode == 'change') {
            $html = $html . JText::_("Change the full Paper");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit the full paper");
        } elseif ($mode == 'new') {
            $html = $html . JText::_("Upload the full paper");
        }
        $html = $html . "</button>";

        return $html;

    }

    //Generate presentation change button
    private function _FullPaperDownloadBtn($filename)
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-download\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"task\" value=\"paper.downloadfullpaper\" />";
        $html = $html . "<input type=\"hidden\" name=\"filename\" value=\"" . $filename . "\" />";
        $html = $html . "<button class=\"btn btn-default btn-sm\" type=\"submit\">";
        $html = $html . "<i class=\"icon-download\"></i>";
        $html = $html . JText::_("Download");
        $html = $html . "</button></form></div>";
        return $html;

    }

    private function _CameraReadyDownloadBtn($filename)
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-download\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"task\" value=\"paper.downloadfullpaper\" />";
        $html = $html . "<input type=\"hidden\" name=\"filename\" value=\"" . $filename . "\" />";
        $html = $html . "<button class=\"btn btn-default btn-sm\" type=\"submit\">";
        $html = $html . "<i class=\"icon-download\"></i>";
        $html = $html . JText::_("Download");
        $html = $html . "</button></form></div>";
        return $html;

    }

    private function _PresentationDownloadBtn($filename)
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-download\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"task\" value=\"paper.downloadfullpaper\" />";
        $html = $html . "<input type=\"hidden\" name=\"filename\" value=\"" . $filename . "\" />";
        $html = $html . "<button class=\"btn btn-default btn-sm\" type=\"submit\">";
        $html = $html . "<i class=\"icon-download\"></i>";
        $html = $html . JText::_("Download");
        $html = $html . "</button></form></div>";
        return $html;

    }

    public function getPreviousAbstracts($id = null)
    {
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // @todo - format the query with escape characters
        $query
            ->select('a.*')
            ->from('#__confmgt_abstracts as a');

        // Only the papers which are not archieved
        $query->where('a.state =1');
        $query->where('a.linkid =' . (int)$id);

        // Reset the query using our newly populated query object.
        $db->setQuery($query);

        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $results = $db->loadObjectList();

        return $results;
    }

    public function getPreviousFullPapers($id = null)
    {
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);
        $user = JFactory::getUser();

        // @todo - format the query with escape characters
        $query
            ->select('a.*')
            ->from('#__confmgt_fullpapers as a');

        // Only the papers which are not archieved
        $query->where('a.state =1');
        $query->where('a.linkid =' . (int)$id);

        // Reset the query using our newly populated query object.
        $db->setQuery($query);

        // Load the results as a list of stdClass objects (see later for more options on retrieving data).
        $results = $db->loadObjectList();

        return $results;
    }
}
