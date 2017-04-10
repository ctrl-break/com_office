<?php
/**
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.framework');

JHtml::_('jquery.framework');


$document = JFactory::getDocument();
$document->addStyleSheet('/media/com_office/css/com_office.css');
$document->addScript('//api-maps.yandex.ru/2.1/?lang=ru-RU');
$document->addScript('/media/com_office/js/office.js');

?>
<div class="office_box">

<?php echo JText::_('COM_OFFICE_MAIN_TITLE'); ?>

<form class="com_office" action="index.php?option=com_office&view=offices" method="post" id="adminForm" name="adminForm">
  <select class="office_choise" name="office_choise">
      <option value="all">Все города</option>
    <?php foreach ($this->cities as $value):  ?>
      <option value="<?php echo $value->city; ?>"><?php echo $value->city; ?></option>
    <?php endforeach; ?>
  </select>

  <table class="table offices">
  <?php foreach ($this->offices as $value):  ?>
        <tr>
        <td class="w05">
          <img src="/media/com_office/images/dot.png" alt="">
        </td>
        <td class="w65 addr_col">
            <p><strong><?php echo $value->title; ?></strong></p>
            <p><?php echo $value->city; ?> <?php echo $value->address; ?></p>
            <?php if (!is_null($value->note)) : ?>
              <p><?php echo $value->note; ?></p>
            <?php endif; ?>
        </td>
        <td class="w3 cont_col">
            <p><?php echo $value->phones; ?></p>
            <?php if (!is_null($value->email)) : ?>
              <p><a href="mailto:<?php echo $value->email; ?>"><?php echo $value->email; ?></a></p>
            <?php endif; ?>
        </td>
        </tr>
  <?php endforeach; ?>
  </table>

  <div class="pagination">
    <?php  echo $this->pagination->getListFooter(); ?>
  </div>

</form>

<div class="clear"></div>

<div id="mapbox" style="width:auto;height:400px;"></div>

<script type="text/javascript">
ymaps.ready(function(){
	var mapbox = new ymaps.Map("mapbox", {
		center: [52.36006582, 54.17460632],
		zoom: 	4,
		behaviors: ['default', 'scrollZoom']
    },
    {
        searchControlProvider: 'yandex#search'
    }),

      clusterer = new ymaps.Clusterer({
      preset: 'islands#invertedBlueClusterIcons',
      groupByCoordinates: false,
      clusterDisableClickZoom: true,
      clusterHideIconOnBalloonOpen: false,
      geoObjectHideIconOnBalloonOpen: false
  }),

      getPointData = function (title, addr) {
      return {
          balloonContentHeader: title,
          balloonContentBody: addr,
          clusterCaption: title
      };
  },

      getPointOptions = function () {
      return {
          preset: 'islands#blueIcon'
      };
  },
  geoObjects = [];

<?php $count = 0; ?>
<?php foreach ($this->allOffices as $value): ?>
    geoObjects[<?php echo $count++; ?>] = new ymaps.Placemark([<?php echo $value->coords; ?>],
        getPointData('<?php echo $value->title; ?>', '<?php echo $value->city.' '.$value->address; ?>'),
        getPointOptions());
<?php endforeach; ?>

    clusterer.options.set({
        gridSize: 80,
        clusterDisableClickZoom: true
    });

    clusterer.add(geoObjects);
    mapbox.geoObjects.add(clusterer);
});
</script>


</div>
