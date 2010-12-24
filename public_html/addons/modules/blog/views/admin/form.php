<?php if ($this->method == 'create'): ?>
<h3><?php echo lang('blog_create_title');?></h3>				
<?php else: ?>
<h3><?php echo sprintf(lang('blog_edit_title'), $post->subject);?></h3>
<?php endif; ?>

<?php echo form_open(uri_string(), 'class="crud"'); ?>

	<div class="tabs">

		<ul class="tab-menu">
			<li><a href="#news-content-tab"><span><?php echo lang('blog_content_label');?></span></a></li>
			<li><a href="#news-options-tab"><span><?php echo lang('blog_options_label');?></span></a></li>
		</ul>

		<div id="news-content-tab">

			<ol>

				<li>
					<label for="subject"><?php echo lang('blog_title_label');?></label>
					<?php echo form_input('subject', htmlspecialchars_decode($post->subject), 'maxlength="140"'); ?>
					<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
				</li>

				<li class="even">
					<label for="slug"><?php echo lang('blog_slug_label');?></label>
					<?php echo form_input('slug', $post->slug, 'maxlength="160" class="width-20"'); ?>
					<span class="required-icon tooltip"><?php echo lang('required_label');?></span>
				</li>

				<li>
					<label for="status"><?php echo lang('blog_status_label');?></label>
					<?php echo form_dropdown('status', array('0'=>lang('blog_draft_label'), '1'=>lang('blog_live_label')), $post->status) ?>
				</li>

				<li>
					<?php echo form_textarea(array('id'=>'content', 'name'=>'content', 'value' =>  stripslashes($post->content), 'rows' => 50, 'class'=>'wysiwyg-advanced')); ?>
				</li>

			</ol>
		</div>

		<!-- Options tab -->
		<div id="news-options-tab">

			<ol>
				<li>
					<label for="category_id"><?php echo lang('blog_category_label');?></label>
					<?php echo form_multiselect('selected_cat[]', $categories,(!empty($selected_cat))?$selected_cat:'' ) ?>
					[ <?php echo anchor('admin/blog/categories/create', lang('blog_new_category_label'), 'target="_blank"'); ?> ]
					
				</li>

			</ol>

		</div>

	</div>

<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel') )); ?>

<?php echo form_close(); ?>