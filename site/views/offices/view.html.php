<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_office
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the Office Component
 *
 * @since  0.0.1
 */
class OfficeViewOffices extends JViewLegacy
{

	protected $offices = [];
	protected $allOffices = [];
	protected $cities = [];

	protected $state;

	/**
	 * Display the Office view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{

		$this->offices = $this->get('Items');

		$this->pagination	= $this->get('Pagination');

		$this->state = $this->get('State');

		$this->cities = $this->get('Cities');
		//var_dump($this->offices);

		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		if ($this->activeFilters['city'] === 'all') {
			$this->allOffices = $this->get('AllItems');
		} else {
			$model = $this->getModel();
			$this->allOffices = $model->getCityItems( $this->activeFilters['city'] );
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
}
