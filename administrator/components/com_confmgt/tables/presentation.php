<?php

/**
 * @version     3.8.0
 * @package     com_confmgt
 * @copyright   Copyright (C) 2017. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Dr Kaushal Keraminiyage <admin@confmgt.com> - http://www.confmgt.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Table class for presentation
 *
 * @package CONFMGT
 *
 * @since version 3.8.0
 */
class ConfmgtTablePresentation extends JTable {

    /**
     * Constructor
     *
     * @param JDatabase A database connector object
     */
    public function __construct(&$db) {
        parent::__construct('#__confmgt_presentations', 'id', $db);
    }

    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param	array		Named array
     * @return	null|string	null is operation was satisfactory, otherwise returns an error
     * @see		JTable:bind
     * @since	1.5
     */
    public function bind($array, $ignore = '') {

		$input = JFactory::getApplication()->input;
		$task = $input->getString('task', '');

		//Support for file field: camera_ready
		$params = JFactory::getApplication()->getParams();
		
		$files = $input->files->get('jform');
		if(!empty($files['presentation'])){
			jimport('joomla.filesystem.file');
			$file = $files['presentation'];
			
			if (UploadHelper::checkFile($file, 5)) // file name and file size (in MB) as parameters 
			{
				$mime = UploadHelper::getMimetype($file['tmp_name'], $file['name']);
				$extsallowed = explode(',',$params->get('file_type_presentation'));
				
				$extOK =false;
				foreach ($extsallowed as $ext) {
					$intmime = UploadHelper::ext2mime($ext);			
					if ($mime == $intmime) {
						$extOK = true;
					}
					
				}
				if (!$extOK) {
					JFactory::$application->enqueueMessage(JText::_( 'This file type is not allowed. Only '.$params->get('file_type_presentation').' are allowed'),'error');
					return false;
				}
			}else{
                JFactory::$application->enqueueMessage( JText::_( 'File check failed'),'error');
				return false;
			}
			
			$filename = UploadHelper::changeFileName($file, 'presentation', $array['linkid']);
			$path = $params->get('upload_path').$filename;
			
			if (!UploadHelper::uploadFile($file,$path))
			{
                JFactory::$application->enqueueMessage(JText::_( 'Upload failed'),'error');
				return false;
			}
			
			$array['presentation'] = $filename;	 

		}

        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string) $registry;
        }

        if (isset($array['metadata']) && is_array($array['metadata'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['metadata']);
            $array['metadata'] = (string) $registry;
        }

        return parent::bind($array, $ignore);
    }


    /**
     * Method to overload the check function
     * @return bool
     *
     * @since version 3.8.0
     */
    public function check() {

        //If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder('linkid ='.$this->linkid.' AND created_by = '.$this->created_by);
        }

        return parent::check();
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkin rows that it can after adjustments are made.
     *
     * @param    mixed    An optional array of primary key values to update.  If not
     *                    set the instance property value is used.
     * @param    integer The publishing state. eg. [0 = unpublished, 1 = published]
     * @param    integer The user id of the user performing the operation.
     * @return    boolean    True on success.
     * @since    1.0.4
     */
    public function publish($pks = null, $state = 1, $userId = 0) {
        // Initialise variables.
        $k = $this->_tbl_key;

        // Sanitize input.
        Joomla\Utilities\ArrayHelper::toInteger($pks);
        $userId = (int) $userId;
        $state = (int) $state;

        // If there are no primary keys set check to see if the instance key is set.
        if (empty($pks)) {
            if ($this->$k) {
                $pks = array($this->$k);
            }
            // Nothing to set publishing state on, return false.
            else {
                JFactory::getApplication()->enqueueMessage(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'),'error');
                return false;
            }
        }

        // Build the WHERE clause for the primary keys.
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);

        // Determine if there is checkin support for the table.
        if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
            $checkin = '';
        } else {
            $checkin = ' AND (checked_out = 0 OR checked_out = ' . (int) $userId . ')';
        }

        // Update the publishing state for rows with the given primary keys.
        $this->_db->setQuery(
            ' UPDATE `' . $this->_tbl . '`' .
            ' SET `state` = ' . (int) $state .
            ' WHERE (' . $where . ')' .
            $checkin
        );
        try {
            $this->_db->execute();
        }catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage());
            return false;
        }

        // If checkin is supported and all rows were adjusted, check them in.
        if ($checkin && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin each row.
            foreach ($pks as $pk) {
                $this->checkin($pk);
            }
        }

        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }

        return true;
    }

    /**
     * Method to delete a record
     *
     * @param null $pk
     *
     * @return bool
     *
     * @since version 3.8.0
     */
    public function delete($pk = null) {
        $this->load($pk);
        $result = parent::delete($pk);
        if ($result) {
        }
        return $result;
    }
	
}
