<?php
/**
 * @author		Dr Kaushal Keraminiyage
 * @copyright	Dr Kaushal Keraminiyage
 * @license		GNU General Public License version 2 or later
 */

defined("_JEXEC") or die("Restricted access");

class ConfmgrController extends JControllerLegacy
{
	/**
	 * The default view for the display method.
	 *
	 * @var    string
	 * @since  12.2
	 */
	protected $default_view = 'papers';

	/**
     * Method to display a view.
     *
     * @param   boolean If true, the view output will be cached
     * @param   array   An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return  JController	This object to support chaining.
     * @since   1.5
     */
    public function display($cachable = false, $urlparams = false)
	{
		JForm::addFormPath(JPATH_COMPONENT_ADMINISTRATOR . '/models/forms');
		JForm::addFieldPath(JPATH_COMPONENT_ADMINISTRATOR . '/models/fields');

        // Get the document object.
		$document	= JFactory::getDocument();

		// Set the default view name and format from the Request.
		$vName   = $this->input->getCmd('view', 'entrypage');
		$vFormat = $document->getType();
		$lName   = $this->input->getCmd('layout', 'entry_options');
		
		// Get the model and the view
		$model = $this->getModel($vName);
		$view = $this->getView($vName, $vFormat);
		
		// Push the model into the view (as default).
		$view->setModel($model, true);
		$view->setLayout($lName);
		
		// Push document object into the view.
		$view->document = $document;

		// Display the view
		$view->display();
    }
}
