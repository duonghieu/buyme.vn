<?php if ($this->method == 'create'): ?>
<h3><?php echo lang('cat_create_title');?></h3>

<?php else: ?>
<h3><?php echo sprintf(lang('cat_edit_title'), $category->name);?></h3>

<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), 'class="crud" id="categories"'); ?>

<fieldset>
	<ol>
		<li class="even">
		<label for="name"><?php echo lang('cat_title_label');?></label>
		<?php echo  form_input('name', $category->name); ?>
		<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
		</li>
		<li class="even">
			<label for="description"><?php echo lang('cat_desc_label');?></label>
			<?php echo  form_input('description', $category->description); ?>
		</li>
		<li class="even">
			<label for="position"><?php echo lang('cat_position_label');?></label>
			<?php echo  form_input('position', $category->position); ?>
		</li>
		<li class="even">
			<label for="category_id"><?php echo lang('blog_category_label');?></label>
			<select name="category_id">
				<option value="0">No parent category</option>
				 <?php foreach($parent_category as $parent): ?>
				 	<option value="<?php echo $parent->id; ?>"  <?php echo (!empty($category->parent_id) && $category->parent_id==$parent->id)?'selected="selected"':'';?>>			
						<?php echo $parent->name; ?>
					</option>
				<?php endforeach;?>
			</select>
		</li>
	</ol>

	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
</fieldset>

<?php echo form_close(); ?>