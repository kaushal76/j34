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
 * View class for reviews
 *
 * @package  CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtViewRev1ews extends JViewLegacy
{
    protected $items_completed;
    protected $items_pending;
    protected $pagination;
    protected $state;
    protected $params;

    /**
     * Display the view
     */
    public function display($tpl = null)
    {
        $app = JFactory::getApplication();

        $this->state = $this->get('State');
        $this->abs_items_pending = $this->get('AbstractItemsPending');
        $this->full_items_pending = $this->get('FullpaperItemsPending');
        $this->items_completed = $this->get('ItemsCompleted');
        $this->pagination = $this->get('Pagination');
        $this->params = $app->getParams('com_confmgt');


        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        parent::display($tpl);
    }

}
