<?php echo form_open('admin/blog/action');?>

<?php if ( ! empty($blog)): ?>

	<table border="0" class="table-list">
		<thead>
			<tr>
				<th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
				<th><?php echo lang('blog_post_label');?></th>
				<th class="width-5"><?php echo lang('blog_author_label');?></th>
				<th class="width-10"><?php echo lang('blog_category_label');?></th>
				<th class="width-10"><span><?php echo lang('blog_actions_label');?></span></th>
				<th class="width-10"><?php echo lang('blog_date_label');?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="6">
					<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ($blog as $post): ?>
				<tr>
					<td><?php echo form_checkbox('action_to[]', $post->id);?></td>
					<td>
						<strong><?php echo $post->subject;?></strong>
						<div class="row-actions">
							<?php echo anchor('admin/blog/preview/' . $post->id, lang($post->status == 'live' ? 'blog_view_label' : 'blog_preview_label'), 'rel="modal-large" class="iframe" target="_blank"') . ' | '; ?>
							<?php echo anchor('admin/blog/edit/' . $post->id, lang('blog_edit_label'));?> |
							<?php echo anchor('admin/blog/delete/' . $post->id, lang('blog_delete_label'), array('class'=>'confirm')); ?>
						</div>
					</td>
					<td><?php echo $post->author;?></td>
					<td>
						<?php foreach ($blog_cat[$post->id] as $cat): ?>
							<?php echo anchor('admin/blog/categories/' . $cat->id, $cat->name),' ';?>
						<?php endforeach; ?>
					</td>
					<td>
						<?php foreach ($blog_tag[$post->id] as $tag): ?>
							<?php echo anchor('admin/blog/tag/' . $tag->id, $tag->name),' ';?>
						<?php endforeach; ?>
					</td>
					<td>
						<?php echo date('M d, Y', $post->created_date);?>
						<br />
						<?php echo lang('blog_status_'.$post->status.'_label');?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete', 'publish'))); ?>

<?php else: ?>
	<p><?php echo lang('blog_no_post');?></p>
<?php endif; ?>

<?php echo form_close();?>