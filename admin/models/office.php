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
 * Office Model
 *
 * @since  0.0.1
 */
class OfficeModelOffice extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Office', $prefix = 'OfficeTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_office.office',
			'office',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}
	/**
	 * Method to get the script that have to be included on the form
	 *
	 * @return string	Script files
	 */
	public function getScript()
	{
		return 'administrator/components/com_office/models/forms/office.js';
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_office.edit.office.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}


	/*
		Get coordinates from yandex maps
	 */

	protected function prepareTable($form)
	{
		$cat = OfficeHelper::getCategoryName($form->catid);

		$addr = $cat . $form->address;

		$form->coords = "";

		$geocode = file_get_contents('https://geocode-maps.yandex.ru/1.x/?geocode=' . $addr );
		$xml = new SimpleXMLElement($geocode);

		$xml->registerXPathNamespace('ymaps', 'http://maps.yandex.ru/ymaps/1.x');
		$xml->registerXPathNamespace('gml', 'http://www.opengis.net/gml');

		$result = $xml->xpath('/ymaps:ymaps/ymaps:GeoObjectCollection/gml:featureMember/ymaps:GeoObject/gml:Point/gml:pos');

		$coords = explode(" ", $result[0]);

		$form->coords = $coords[1] . "," . $coords[0];

		$form->published = 1;
	}


}
