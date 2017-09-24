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


/**
 * View class for Abstract Review Outcome form
 *
 * @package     CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtViewAbrev1ewoutcomeform extends JViewLegacy
{

    protected $state;
    protected $item;
    protected $form;
    protected $params;
    protected $linkid;

    /**
     * Method to intiate the display
     *
     * @param null $tpl
     *
     *
     * @since version 3.8.0
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->paper = $this->get('Paper', 'Paper');
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
        $this->form = $this->get('Form');
        $this->linkid = $this->get('Linkid');
        $this->item = $this->get('Data');
        $this->rev1ewers = $this->get('rev1ewersData');
        $this->rev1ews = $this->get('rev1ewData');
        $this->authors = $this->get('authorsData');

        $this->paper->paper_created_by = JFactory::getUser($this->paper->paper_created_by)->name;
        $this->isAuthor = AclHelper::isAuthor($this->linkid);
        $this->isRev1ewer = AclHelper::isRev1ewer($this->linkid);

        //check if a super theme leader
        $this->isThemeleader = AclHelper::isSuperCoordinator();

        //if not a super theme leader
        if (!$this->isThemeleader) {

            //is it a student submission?
            if ($this->item->student_submission) {
                $this->isThemeleader = AclHelper::isStudentCoordinator();
            } else {
                //is it the theme leader for the given theme?
                $this->isThemeleader = AclHelper::isThemeleader($this->item->theme,$this->linkid);
            }
        }
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $authorised = $this->isThemeleader;

        if ($authorised !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }

        parent::display($tpl);
    }
}
