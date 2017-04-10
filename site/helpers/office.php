<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

abstract class OfficeHelper
{
    public static function getAllItems()
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
}
