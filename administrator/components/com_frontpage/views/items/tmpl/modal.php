<?php
/**
* @version		$Id:modal.php 1 2015-08-08 11:00:56Z  $
* @copyright	Copyright (C) 2015, . All rights reserved.
* @license 		
*/

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$input     = JFactory::getApplication()->input;
$function  = $input->getCmd('function', 'jSelectItem');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_frontpage&view=items&layout=modal&tmpl=component&function='.$function);?>" method="post" name="adminForm" id="adminForm" class="form-inline">
	<fieldset class="filter clearfix">
		<div class="btn-toolbar">
			<div class="btn-group pull-left">
				<label for="filter_search">
					<?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>
				</label>
				<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" size="30" />
			</div>
			<div class="btn-group pull-left">
				<button type="submit" class="btn hasTooltip" data-placement="bottom" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
					<i class="icon-search"></i></button>
				<button type="button" class="btn hasTooltip" data-placement="bottom" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();">
					<i class="icon-remove"></i></button>
			</div>
			<input onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('0', '<?php echo $this->escape(addslashes(JText::_('SELECT_AN_ITEM'))); ?>', null, null);" class="btn" type="button" value="" />
			<div class="clearfix"></div>
		</div>
		<hr class="hr-condensed" />

	</fieldset>

	<table class="table table-striped table-condensed">
		<thead>
			<tr>				
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Title', 'a.title', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Alias', 'a.alias', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Gallery', 'a.gallery', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Image_credits', 'a.image_credits', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Video_credits', 'a.video_credits', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Created', 'a.created', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Ordering', 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Published', 'a.published', $listDirn, $listOrder ); ?>
				</th>
								<th class="title">
					<?php echo JHTML::_('grid.sort', 'Id', 'a.id', $listDirn, $listOrder ); ?>
				</th>
							</tr>
		</thead>
		<tfoot>
		<tr>
			<td colspan="9">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>

		<?php foreach ($this->items as $i => $item) : ?>
			<tr class="row<?php  echo $i % 2; ?>">
											<td>
					<a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->name)); ?>');">
						<?php echo $this->escape($item->title); ?></a>
				</td>
											 		
				<td><?php echo $item->alias; ?></td>
											 		
				<td><?php echo $item->gallery; ?></td>
											 		
				<td><?php echo $item->image_credits; ?></td>
											 		
				<td><?php echo $item->video_credits; ?></td>
											 		
				<td><?php echo $item->created; ?></td>
											 		
				<td><?php echo $item->ordering; ?></td>
											 		
				<td><?php echo $item->published; ?></td>
											 		
				<td><?php echo $item->id; ?></td>
										</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>