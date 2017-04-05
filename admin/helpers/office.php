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
abstract class OfficeHelper extends JHelperContent
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_OFFICE_SUBMENU_MESSAGES'),
			'index.php?option=com_office',
			$submenu == 'offices'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_OFFICE_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_office',
			$submenu == 'categories'
		);

		// Set some global property
		$document = JFactory::getDocument();

		if ($submenu == 'categories')
		{
			$document->setTitle(JText::_('COM_OFFICE_ADMINISTRATION_CATEGORIES'));
		}
	}
}
