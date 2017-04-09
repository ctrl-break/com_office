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
    protected function getListQuery()
    {
        $query = parent::getListQuery();

        $query->select('off.id, off.title, off.address, off.note, off.phones, off.email, off.coords, cat.title as city');

        $query->from('#__office as off');

        $query->join('INNER', 'fk7qs_categories AS cat ON off.catid = cat.id ');

        $query->where('off.published = 1');
        $query->order('city ASC');

        return $query;
    }
}
