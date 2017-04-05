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

JFormHelper::loadFieldClass('list');

/**
 * Office Form Field class for the Office component
 *
 * @since  0.0.1
 */
class JFormFieldOffice extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Office';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__office.id as id,title,address,note,phones,email,#__categories.title as category,catid');
		$query->from('#__office');
		$query->leftJoin('#__categories on catid=#__categories.id');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		// var_dump($messages);

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->title .
				                      ($message->catid ? ' (' . $message->category . ')' : ''));
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
