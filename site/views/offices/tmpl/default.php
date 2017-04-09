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
<div class="office_box">

<?php echo JText::_('COM_OFFICE_MAIN_TITLE'); ?>

<form class="com_office" action="" method="post">
  <select class="office_choise" name="">
      <option value="">Пункт 1</option>
      <option value="">Пункт 2</option>
  </select>
  <div class="showmap">
    <label for="showmap">
      <input type="checkbox" name="showmap"> Показать на карте
    </label>
  </div>
</form>



<table class="table offices">
<?php foreach ($this->offices as $value):  ?>
      <tr>
      <td class="w05">
        <img src="/media/com_office/images/dot.png" alt="">
      </td>
      <td class="w65 addr_col">
          <p><strong><?php echo $value->title;?></strong></p>
          <p><?php echo $value->city;?> <?php echo $value->address;?></p>
          <?php if( !is_null($value->note)) : ?>
            <p><?php echo $value->note;?></p>
          <?php endif; ?>
      </td>
      <td class="w3 cont_col">
          <p><?php echo $value->phones;?></p>
          <?php if( !is_null($value->email)) : ?>
            <p><?php echo $value->email;?></p>
          <?php endif; ?>
      </td>
      </tr>
<?php endforeach; ?>
</table>

<div class="mapbox">

</div>

</div>
