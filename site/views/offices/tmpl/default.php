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

$document = JFactory::getDocument();
$document->addStyleSheet('/media/com_office/css/com_office.css');
$document->addScript('/media/com_office/js/office.js');

?>

<?php echo JText::_('COM_OFFICE_MAIN_TITLE'); ?>

<form class="com_office" action="" method="post">
  <select class="office_choise" name="">
      <option>Пункт 1</option>
      <option>Пункт 2</option>
  </select>
</form>
