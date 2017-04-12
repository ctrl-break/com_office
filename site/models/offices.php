<?php
/**
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Offices Model.
 *
 * @since  0.0.1
 */
class OfficeModelOffices extends JModelList
{
    /**
  	 * Constructor.
  	 *
  	 * @param   array  $config  An optional associative array of configuration settings.
  	 *
  	 * @see     JController
  	 * @since   1.6
  	 */
  	public function __construct($config = array())
  	{
  		if (empty($config['filter_fields']))
  		{
  			$config['filter_fields'] = array(
  				'city', 'a.city'
  			);
  		}

  		parent::__construct($config);
  	}

    protected function populateState ($ordering = null, $direction = null)
    {

          $mainframe =JFactory::getApplication();
  		    $city = $mainframe->getUserStateFromRequest( "office_choise", 'office_choise', 'all' );

            //$city = $this->getUserStateFromRequest($this->context . '.filter.city', 'filter_city');
          $this->setState('filter.city', $city);
    }

    protected function getListQuery()
    {
        $query = parent::getListQuery();

        $query->select('off.id, off.title, off.address, off.note, off.phones, off.email, off.coords, cat.title as city');

        $query->from('#__office as off');

        $query->join('INNER', '#__categories AS cat ON off.catid = cat.id ');

        $query->where('off.published = 1');

        // Filter: like / search
    		$filter = $this->getState('filter.city');

    		if (!empty($filter) && $filter != 'all')
    		{
    			$query->where('cat.title = "'.$filter.'"');
    		}

        $query->order('city ASC');

        //var_dump($query);
        return $query;
    }

    public function getAllItems()
    {
        // Initialize variables.
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

				$query->select('off.id, off.title, off.address, off.note, off.phones, off.email, off.coords, cat.title as city');

	      $query->from('#__office as off');

	      $query->join('INNER', '#__categories AS cat ON off.catid = cat.id ');

	      $query->where('off.published = 1');
	      $query->order('city ASC');

        $db->setQuery($query);

				return $db->loadObjectList();
    }

    public function getCities()
    {
        // Initialize variables.
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

				$query->select('DISTINCT cat.title as city');

	      $query->from('#__office as off');

	      $query->join('INNER', '#__categories AS cat ON off.catid = cat.id ');

	      $query->where('off.published = 1');
	      $query->order('city ASC');

        $db->setQuery($query);

				return $db->loadObjectList();
    }

}
