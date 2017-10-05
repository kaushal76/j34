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
 * Model class for the paper
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
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
            throw new Exception(JText::_('JERROR_NO_PAPERID'), 404);
        } else {
            return $linkid;
        }
    }

    /**
     * Method to build a query to return a paper for a given paper id.
     * @return mixed
     *
     * @since version 3.8.0
     */

    private function _getQuery($id = null)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select($db->quoteName('a.id', 'paper_id'))
            ->select($db->quoteName('a.linkid', 'paper_linkid'))
            ->select($db->quoteName('a.title', 'paper_title'))
            ->select($db->quoteName('a.type', 'paper_type'))
            ->select($db->quoteName('a.abstract_id', 'paper_abstract_id'))
            ->select($db->quoteName('a.fullpaper_id', 'paper_fullpaper_id'))
            ->select($db->quoteName('a.cameraready_id', 'paper_cameraready_id'))
            ->select($db->quoteName('a.presentation_id', 'paper_presentation_id'))
            ->select($db->quoteName('a.type', 'paper_type'))
            ->select($db->quoteName('a.keywords', 'paper_keywords'))
            ->select($db->quoteName('a.state', 'paper_state'))
            ->select($db->quoteName('a.created_by', 'paper_created_by'))
            ->select($db->quoteName('a.theme', 'paper_theme'))
            ->select($db->quoteName('a.active', 'paper_active'))
            ->select($db->quoteName('a.student_submission', 'paper_student_submission'))
            ->select($db->quoteName('a.last_updated', 'paper_last_updated'))
            ->select($db->quoteName('b.id', 'fullpaper_id'))
            ->select($db->quoteName('b.linkid', 'fullpaper_linkid'))
            ->select($db->quoteName('b.full_paper', 'fullpaper_full_paper'))
            ->select($db->quoteName('b.created_by', 'fullpaper_created_by'))
            ->select($db->quoteName('b.full_review_outcome', 'fullpaper_full_review_outcome'))
            ->select($db->quoteName('b.full_review_comments', 'fullpaper_full_review_comments'))
            ->select($db->quoteName('b.state', 'fullpaper_state'))
            ->select($db->quoteName('b.last_updated', 'fullpaper_last_updated'))
            ->select($db->quoteName('b.mode', 'fullpaper_mode'))
            ->select($db->quoteName('c.id', 'abstract_id'))
            ->select($db->quoteName('c.linkid', 'abstract_linkid'))
            ->select($db->quoteName('c.abstract', 'abstract_abstract'))
            ->select($db->quoteName('c.created_by', 'abstract_created_by'))
            ->select($db->quoteName('c.abstract_review_outcome', 'abstract_abstract_review_outcome'))
            ->select($db->quoteName('c.abstract_review_comments', 'abstract_abstract_review_comments'))
            ->select($db->quoteName('c.state', 'abstract_state'))
            ->select($db->quoteName('c.checked_out', 'abstract_checked_out'))
            ->select($db->quoteName('c.checked_out_time', 'abstract_checked_out_time'))
            ->select($db->quoteName('c.last_updated', 'abstract_last_updated'))
            ->select($db->quoteName('c.mode', 'abstract_mode'))
            ->select($db->quoteName('d.id', 'presentation_id'))
            ->select($db->quoteName('d.linkid', 'presentation_linkid'))
            ->select($db->quoteName('d.presentation', 'presentation_presentation'))
            ->select($db->quoteName('d.created_by', 'presentation_created_by'))
            ->select($db->quoteName('d.bio', 'presentation_bio'))
            ->select($db->quoteName('d.type', 'presentation_type'))
            ->select($db->quoteName('d.last_updated', 'presentation_last_updated'))
            ->select($db->quoteName('e.id', 'camera_id'))
            ->select($db->quoteName('e.linkid', 'camera_linkid'))
            ->select($db->quoteName('e.camera_ready', 'camera_camera_ready'))
            ->select($db->quoteName('e.created_by', 'camera_created_by'))
            ->select($db->quoteName('e.camera_ready_abstract', 'camera_camera_ready_abstract'))
            ->select($db->quoteName('e.type', 'camera_type'))
            ->select($db->quoteName('e.last_updated', 'camera_last_updated'))
            ->from($db->quoteName('#__confmgt_papers', 'a'))
            ->join('LEFT', $db->quoteName('#__confmgt_fullpapers', 'b') . ' ON (' . $db->quoteName('a.fullpaper_id') . ' = ' . $db->quoteName('b.id') . ')')
            ->join('LEFT', $db->quoteName('#__confmgt_camerareadypapers', 'e') . ' ON (' . $db->quoteName('a.cameraready_id') . ' = ' . $db->quoteName('e.id') . ')')
            ->join('LEFT', $db->quoteName('#__confmgt_abstracts', 'c') . ' ON (' . $db->quoteName('a.abstract_id') . ' = ' . $db->quoteName('c.id') . ')')
            ->join('LEFT', $db->quoteName('#__confmgt_presentations', 'd') . ' ON (' . $db->quoteName('a.presentation_id') . ' = ' . $db->quoteName('d.id') . ')')
            ->where($db->quoteName('a.id') . ' = ' . $id);

        return $query;
    }

    /**
     * Method t return a Paper item.
     * @param null $id
     *
     * @return mixed
     *
     * @since version 3.8.0
     */

    public function getPaper($id = null)
    {

        $db = JFactory::getDbo();
        $user = JFactory::getUser();

        if (empty($id)) {
            $id = $this->getState('paper.id');

            if (empty($id)) {
                $id = $this->getLinkid();
            }
        }

        if ($id > 0) {
            $authorised = AclHelper::isAuthor($id);
        } else {
            $authorised = ($user->id > 0);
        }

        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }

        $query = $this->_getQuery($id);
        $db->setQuery($query);

        // If not authorsied, no results returned and throw an exception;
        if (!$authorised) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'), 500);
        }

        // Load the results as a list of stdClass objects (
        $paper = $db->loadObject();

        // Loading the Btns
        $paper->abstractBtn = null;
        $paper->full_paper_txt = null;
        $paper->fullPaperBtn = null;
        $paper->full_paper_download = null;
        $paper->cameraReadyBtn = null;
        $paper->cameraready_download = null;
        $paper->presentationBtn = null;
        $paper->presentation_download = null;

        $change_allowed = true;

        //Case of abstract review outcomes
        switch ($paper->abstract_abstract_review_outcome) {
            case 1:
                $paper->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_ACCEPT');
                if (empty($paper->fullpaper_full_paper)) {
                    $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'new');

                } else {
                    if ($change_allowed) {
                        $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'change');
                    }
                    $paper->full_paper_txt = $paper->fullpaper_full_paper;
                    $paper->full_paper_download = $this->_FullPaperDownloadBtn($paper->fullpaper_full_paper);
                }
                break;

            case 2:
                $paper->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_MINOR_CHANGE');
                $paper->abstractBtn = $this->_AbstractBtn($paper->paper_id, 'change');
                if (empty($paper->fullpaper_full_paper)) {
                    $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'new');
                } else {
                    if ($change_allowed) {
                        $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'change');
                    }
                    $paper->full_paper_download = $this->_FullPaperDownloadBtn($paper->fullpaper_full_paper);
                    $paper->full_paper_txt = $paper->fullpaper_full_paper;
                }
                break;

            case 3:
                $paper->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_RESUBMIT');
                $paper->abstractBtn = $this->_AbstractBtn($paper->paper_id, 'resubmit');
                break;

            case 4:
                $paper->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_REJECT');
                break;

            case '':
            default:
            case 0:
                $paper->abstract_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_OUTCOME_PENDING');
                if ($change_allowed) {
                    $paper->abstractBtn = $this->_AbstractBtn($paper->paper_id, 'change');
                }
                if (empty($paper->abstract_abstract_review_comments)) {
                    $paper->abstract_abstract_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_ABSTRACT_COMMENTS_PENDING');
                }
                break;
        }

        //Deal with the full paper review outcome
        switch ($paper->fullpaper_full_review_outcome) {
            case 1:
                $paper->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_ACCEPT');
                break;

            case 2:
                $paper->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_MINOR_CHANGE');
                break;

            case 3:
                $paper->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_RESUBMIT');
                $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'resubmit');
                break;

            case 4:
                $this->_item->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_REJECT');
                break;

            case '':
            default:
            case 0:
                if (empty($paper->fullpaper_full_paper)) {
                    $paper->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_NA');
                    $paper->fullpaper_full_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_COMMENTS_NA');
                } else {
                    $paper->full_review_outcome_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_OUTCOME_PENDING');
                    $paper->fullpaper_full_review_comments = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_COMMENTS_PENDING');
                    if ($change_allowed) {
                        $paper->fullPaperBtn = $this->_FullPaperBtn($paper->paper_id, 'change');
                    }
                }
                break;
        }

        //Deal with the camera ready papers
        if (empty($paper->camera_camera_ready)) {
            if (($paper->fullpaper_full_review_outcome == 1) || ($paper->fullpaper_full_review_outcome == 2)) {
                $paper->camera_ready_txt = JText::_('COM_CONFMGT_MODEL_PAPER_CAMERA_READY_PENDING');
                $paper->cameraReadyBtn = $this->_CameraReadyPaperBtn($paper->paper_id, 'new');
                $paper->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_NA');
            } else {
                $paper->camera_ready_txt = JText::_('COM_CONFMGT_MODEL_PAPER_CAMERA_READY_NA');
                $paper->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_NA');
            }
        } else {
            $paper->camera_ready_txt = $paper->camera_camera_ready;
            if ($change_allowed) {
                $paper->cameraReadyBtn = $this->_CameraReadyPaperBtn($paper->paper_id, 'change');
            }
            $paper->cameraready_download = $this->_CameraReadyDownloadBtn($paper->camera_camera_ready);
        }


        //Deal with the presentations
        if (!empty($paper->camera_camera_ready)) {
            if (empty($paper->presentation_presentation)) {
                $paper->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_PENDING');
                $paper->presentationBtn = $this->_PresentationBtn($paper->paper_id, 'new');
            } else {
                if ($change_allowed) {
                    $paper->PresentationBtn = $this->_PresentationBtn($paper->paper_id, 'change');
                }
                $paper->presentation_txt = $paper->presentation_presentation;
                $paper->presentation_download = $this->_PresentationDownloadBtn($paper->presentation_presentation);
            }
        } else {
            $paper->presentation_txt = JText::_('COM_CONFMGT_MODEL_PAPER_PRESENTATION_PENDING');
        }


        //If still the $this->item->full_paper is blank, it must be not due

        if (empty($paper->fullpaper_full_paper)) {
            if (($paper->abstract_abstract_review_outcome == 1) || ($paper->abstract_abstract_review_outcome == 2)) {
                $paper->full_paper_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_PENDING');
            } else {
                $paper->full_paper_txt = JText::_('COM_CONFMGT_MODEL_PAPER_FULLPAPER_NA');
            }
        }

        // Deal with submision types

        switch ($paper->paper_type) {
            case 1:
                $paper->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_ACADEMIC_PAPER');
                break;

            case 2:
                $paper->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_POLICY_NOTE');
                break;

            case 3:
                $paper->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_DOCTORAL_SCHOOL');
                break;

            case 4:
                $paper->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_POSTER');
                break;

            case 0:
            case '':
            default:
                $paper->type_txt = JText::_('COM_CONFMGT_MODEL_PAPER_TYPE_TXT_ACADEMIC_PAPER');
                break;
        }

        return $paper;
    }

    /**
     * Method to get the table object
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     *
     * @since version 3.8.0
     */
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
                    JFactory::$application->enqueueMessage($table->getError());
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Method to update the status of a paper
     * @param $id
     * @param $state
     *
     * @return bool
     *
     * @since version 3.8.0
     * @throws Exception
     */

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

    /**
     * Method to delete a paper
     * @param $id
     *
     * @return bool
     *
     * @since version 3.8.0
     * @throws Exception
     */
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

    /**
     * Private method to generate an abstract change or resubmit button
     * @param int $id
     * @param string $mode
     *
     * @return string
     *
     * @since version 3.8.0
     */
    private function _AbstractBtn($id = 0, $mode = 'change')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-abstract-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"id\" value=" . $id . " />";
        $html = $html . "<input type=\"hidden\" name=\"linkid\" value=" . $id . " />";
        $html = $html . "<input type=\"hidden\" name=\"jform['mode']\" value=\"" . $mode . "\" />";
        if ($mode == 'resubmit') {
            $html = $html . "<input type=\"hidden\" name=\"view\" value=\"abstractform\" />";
        } else {
            $html = $html . "<input type=\"hidden\" name=\"view\" value=\"paperform\" />";
        }
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        $html = $html . "<i class=\"icon-upload\"></i>";
        if ($mode == 'change') {
            $html = $html . JText::_("Change the abstract");
        } elseif ($mode == 'resubmit') {
            $html = $html . JText::_("Resubmit the abstract");
        }
        $html = $html . "</button></form></div>";


        return $html;


    }


    /**
     * Private method to generate a full paper submission button
     * @param int $id
     * @param string $mode
     *
     * @return string
     *
     * @since version 3.8.0
     */
    private function _FullPaperBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-fullpaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"fullpaperform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[linkid]\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[mode]\" value=\"" . $mode . "\" />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        $html = $html . "<i class=\"icon-upload\"></i>";
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

    /**
     * Private method to generate a Camera ready submit button
     * @param int $id
     * @param string $mode
     *
     * @return string
     *
     * @since version 3.8.0
     */
    private function _CameraReadyPaperBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-camerapaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"camerareadypaperform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[linkid]\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[mode]\" value=\"" . $mode . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"linkid\" value=" . $id . " />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        $html = $html . "<i class=\"icon-upload\"></i>";
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

    /**
     * Private method to submit a presentation submit button
     * @param int $id
     * @param string $mode
     *
     * @return string
     *
     * @since version 3.8.0
     */
    private function _PresentationBtn($id = 0, $mode = 'new')
    {
        $html = "<div style=\"display:inline\">";
        $html = $html . "<form id=\"form-camerapaper-resubmit-" . $id . "\"";
        $html = $html . " action=\"" . JRoute::_('index.php') . "\" method=\"post\" class=\"form-validate\" enctype=\"multipart/form-data\">";
        $html = $html . JHtml::_('form.token');
        $html = $html . "<input type=\"hidden\" name=\"option\" value=\"com_confmgt\" />";
        $html = $html . "<input type=\"hidden\" name=\"view\" value=\"presentationform\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[linkid]\" value=\"" . $id . "\" />";
        $html = $html . "<input type=\"hidden\" name=\"jform[mode]\" value=\"" . $mode . "\" />";
        $html = $html . "<button class=\"btn btn-default\" type=\"submit\">";
        $html = $html . "<i class=\"icon-upload\"></i>";
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


    /**
     * Private method to generate a full paper download button
     * @param $filename
     *
     * @return string
     *
     * @since version 3.8.0
     */
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

    /**
     * Private method to generate a camera ready paper download button
     * @param $filename
     *
     * @return string
     *
     * @since version 3.8.0
     */
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

    /**
     * Private method to generate a presentation download button
     * @param $filename
     *
     * @return string
     *
     * @since version 3.8.0
     */
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

    /**
     * Method to get previously Submitted Abstracts for a given paper
     * @param null $id
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
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

    /**
     * Method to get previously submitted full papers for a given paper
     * @param null $id
     *
     * @return mixed
     *
     * @since version 3.8.0
     */
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
