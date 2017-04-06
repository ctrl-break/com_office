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
 * Office component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class OfficeHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_OFFICE_SUBMENU_MESSAGES'),
			'index.php?option=com_office',
			$submenu == 'messages'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_OFFICE_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_office',
			$submenu == 'categories'
		);

		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-office ' .
										'{background-image: url(../media/com_office/images/tux-48x48.png);}');
		if ($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_OFFICE_ADMINISTRATION_CATEGORIES'));
		}
	}

		public static function getCategoryName($id = 0) {
			// Initialize variables.
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);

			// Create the base select statement.
			$query->select('title')
				  ->from($db->quoteName('#__categories'));

			$query->where($db->quoteName('id') . ' = ' . $db->quote($id) );

			$db->setQuery($query);
			//var_dump($query);
			return $db->loadResult();
		}
}
