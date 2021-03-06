<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_office
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
//var_dump($listDirn);
?>
<form action="index.php?option=com_office&view=offices" method="post" id="adminForm" name="adminForm">
	<div id="j-sidebar-container" class="span2">
	    <?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<div class="row-fluid">
			<div class="span6">
				<?php echo JText::_('COM_OFFICE_OFFICES_FILTER'); ?>
				<?php
					echo JLayoutHelper::render(
						'joomla.searchtools.default',
						array('view' => $this)
					);
				?>
			</div>
		</div>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_OFFICE_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="20%">
				<?php echo JHtml::_('grid.sort', 'COM_OFFICE_OFFICES_NAME', 'title', $listDirn, $listOrder); ?>
			</th>

			<th width="10%">
				<?php echo JText::_('COM_OFFICE_POSTCODE'); ?>
			</th>

			<th width="10%">
				<?php echo JHtml::_('grid.sort', 'COM_OFFICE_CITY', 'catid', $listDirn, $listOrder); ?>
			</th>

			<th width="20%">
				<?php echo JText::_('COM_OFFICE_ADDRESS'); ?>
			</th>

			<th width="20%">
				<?php echo JText::_('COM_OFFICE_PHONES'); ?>
			</th>
			<th width="10%">
				<?php echo JText::_('COM_OFFICE_EMAIL'); ?>
			</th>

			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_OFFICE_PUBLISHED', 'published', $listDirn, $listOrder); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.sort', 'COM_OFFICE_ID', 'id', $listDirn, $listOrder); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.sort', 'COM_OFFICE_SORT', 'sort', $listDirn, $listOrder); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_office&task=office.edit&id=' . $row->id);
				?>
					<tr>
						<td><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_OFFICE_EDIT_OFFICE'); ?>">
								<?php echo $row->title; ?>
							</a>
						</td>
						<td>
								<?php echo $row->postcode; ?>
						</td>
						<td>
								<?php echo OfficeHelper::getCategoryName($row->catid); ?>
						</td>
						<td>
								<?php echo $row->address; ?>
						</td>
						<td>
								<?php echo $row->phones; ?>
						</td>
						<td>
								<?php echo $row->email; ?>
						</td>
						<td align="center">
							<?php echo JHtml::_('jgrid.published', $row->published, $i, 'offices.', true, 'cb'); ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
						<td align="center">
							<?php echo $row->sort; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
