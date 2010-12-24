<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @package  	PyroCMS
 * @subpackage  Categories
 * @category  	Module
 */
class Admin extends Admin_Controller
{
	/**
	 * Array that contains the validation rules
	 * @access protected
	 * @var array
	 */
	protected $validation_rules = array(
		array(
			'field'   => 'subject',
			'label'   => 'lang:news_title_label',
			'rules'   => 'trim|htmlspecialchars|required|max_length[100]'
			),
		array(
			'field'	=> 'slug',
			'label'	=> 'lang:news_slug_label',
			'rules' => 'trim'
		),
		array(
			'field'	=> 'content',
			'label'	=> 'lang:news_content_label',
			'rules' => 'trim'
		),
		/*array(
			'field'	=> 'tag',
			'label'	=> 'lang:news_slug_label',
			'rules' => 'trim|max_length[140]'
		),*/
		array(
			'field' => 'status',
			'label' => 'lang:news_status_label',
			'rules' => 'trim|numeric'
		)
	);

	/** 
	 * The constructor
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::Admin_Controller();
		
		$this->load->model('blog_m');
		$this->load->model('blog_categories_m');
		$this->load->model('blog_tag_m');
		$this->lang->load('blog');
		$this->lang->load('tag');
		$this->lang->load('categories');
		
		//$this->data->categories = array(0 => '');
		if ($categories = $this->blog_categories_m->get_all())
		{
			foreach($categories as $category)
			{
				$this->data->categories[$category->id] = $category->name;
			}
		}
		$this->template->append_metadata( css('news.css', 'news') )
				->set_partial('shortcuts', 'admin/partials/shortcuts');
	}
	
	/**
	 * Show all created news articles
	 * @access public
	 * @return void
	 */
	public function index()
	{
		// Create pagination links
		//$total_rows = $this->blog_m->count_by(array('show_future'=>TRUE, 'status' => 'all'));
		//$pagination = create_pagination('admin/blog/index', $total_rows);
		
		// Using this data, get the relevant results
		/*$blog = $this->blog_m->limit($pagination['limit'])->get_many_by(array(
			'show_future' => TRUE,
			'status' => 'all'
		));*/
		$blog = $this->blog_m->get_all();
		$blog_cat;$blog_tag;
		foreach ($blog as $temp_blog){
			$blog_cat[$temp_blog->id] = $this->blog_categories_m->get_by_post($temp_blog->id);
			$blog_tag[$temp_blog->id] = $this->blog_tag_m->get_by_post($temp_blog->id);
		}
		
		$this->template
			->title($this->module_details['name'])
			//->set('pagination', $pagination)
			->set('blog', $blog)
			->set('blog_cat',$blog_cat)
			->set('blog_tag',$blog_tag)
			->build('admin/index', $this->data);
	}
	
	/**
	 * Create new article
	 * @access public
	 * @return void
	 */
	public function create()
	{
		$this->load->library('form_validation');
		
		//append the check slug callback function to rules array
		$this->validation_rules[1]['rules'] .= '|callback__check_slug';
		$this->form_validation->set_rules($this->validation_rules);
		if ($this->form_validation->run())
		{
			$this->load->helper('date');
			$id = $this->blog_m->insert(array(
				'user_id'		=> $this->user->id,
				'subject'			=> $this->input->post('subject'),
				'slug'			=> $this->input->post('slug'),
				'content'			=> $this->input->post('content'),
				'status'		=> $this->input->post('status'),
				'created_date'	=> now(),
				'modified_date'	=> now(),
				),
				$this->input->post('selected_cat')
			);
			
			if($id)
			{
				$this->cache->delete_all('blog_m');
				$this->session->set_flashdata('success', sprintf($this->lang->line('blog_article_add_success'), $this->input->post('subject')));
			}
			else
			{
				$this->session->set_flashdata('error', $this->lang->line('blog_article_add_error'));
			}
			
			// Redirect back to the form or main page
			$this->input->post('btnAction') == 'save_exit' ? redirect('admin/blog') : redirect('admin/blog/edit/'.$id);
			
		}

		else
		{
			// Go through all the known fields and get the post values
			foreach($this->validation_rules as $key => $field)
			{
				$post->$field['field'] = set_value($field['field']);
			}
		}
		
		$this->template
			->title($this->module_details['name'], lang('blog_create_title'))
			->append_metadata( $this->load->view('fragments/wysiwyg', $this->data, TRUE) )
			->append_metadata( js('news_form.js', 'news') )
			->set('post', $post)
			->build('admin/form');
	}
	
	/**
	 * Edit news article
	 * @access public
	 * @param int $id the ID of the news article to edit
	 * @return void
	 */
	public function edit($id = 0)
	{
		$id OR redirect('admin/blog');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->validation_rules);
			
		$post = $this->blog_m->get($id);
		$post_cat = $this->blog_categories_m->get_cat_id_by_post($post->id);
		foreach($post_cat as $cat){
			$selected_cat[]=$cat->id;
		}

		if ($this->form_validation->run())
		{
			$this->load->helper('date');
			$result = $this->blog_m->update($id, array(
					'subject'			=> $this->input->post('title'),
					'slug'			=> $this->input->post('slug'),
					'content'			=> $this->input->post('body'),
					'status'		=> $this->input->post('status'),
					'modified_date'	=> now(),
				),
				$this->input->post('selected_cat')
				);
			
			if ($result)
			{
				$this->session->set_flashdata(array('success'=> sprintf($this->lang->line('blog_edit_success'), $this->input->post('subject'))));
			}
			
			else
			{
				$this->session->set_flashdata(array('error'=> $this->lang->line('blog_edit_error')));
			}
			
			// Redirect back to the form or main page
			$this->input->post('btnAction') == 'save_exit'
				? redirect('admin/blog')
				: redirect('admin/blog/edit/'.$id);
		}
		
		// Go through all the known fields and get the post values
		foreach(array_keys($this->validation_rules) as $field)
		{
			if (isset($_POST[$field])) $post->$field = $this->form_validation->$field;
		}    	

		
		// Load WYSIWYG editor
		$this->template
			->title($this->module_details['name'], sprintf(lang('blog_edit_title'), $post->subject))
			->append_metadata( $this->load->view('fragments/wysiwyg', $this->data, TRUE) )
			->append_metadata( js('news_form.js', 'post') )
			->set('post', $post)
			->set('selected_cat', $selected_cat)
			->build('admin/form');
	}	
	
	/**
	* Preview news article
	* @access public
	* @param int $id the ID of the news article to preview
	* @return void
	*/
	public function preview($id = 0)
	{
		$article = $this->blog_m->get($id);

		$this->template
			->set_layout('modal', 'admin')
			->set('post', $post)
			->build('admin/preview');
	}
	
	/**
	 * Helper method to determine what to do with selected items from form post
	 * @access public
	 * @return void
	 */
	public function action()
	{
		switch($this->input->post('btnAction'))
		{
			case 'publish':
				$this->publish();
			break;
			case 'delete':
				$this->delete();
			break;
			default:
				redirect('admin/news');
			break;
		}
	}
	
	/**
	 * Publish news article
	 * @access public
	 * @param int $id the ID of the news article to make public
	 * @return void
	 */
	public function publish($id = 0)
	{
		// Publish one
		$ids = ($id) ? array($id) : $this->input->post('action_to');
		
		if ( ! empty($ids))
		{
			// Go through the array of slugs to publish
			$post_subject = array();
			foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				if ($post = $this->blog_m->get($id) )
				{
					$this->blog_m->publish($id);
					
					// Wipe cache for this model, the content has changed
					$this->cache->delete('blog_m');				
					$post_subject[] = $post->subject;
				}
			}
		}
	
		// Some articles have been published
		if ( ! empty($post_subject))
		{
			// Only publishing one article
			if ( count($post_subject) == 1 )
			{
				$this->session->set_flashdata('success', sprintf($this->lang->line('blog_publish_success'), $post_subject[0]));
			}			
			// Publishing multiple articles
			else
			{
				$this->session->set_flashdata('success', sprintf($this->lang->line('blog_mass_publish_success'), implode('", "', $post_subject)));
			}
		}		
		// For some reason, none of them were published
		else
		{
			$this->session->set_flashdata('notice', $this->lang->line('blog_publish_error'));
		}
		
		redirect('admin/blog');
	}
	
	/**
	 * Delete news article
	 * @access public
	 * @param int $id the ID of the news article to delete
	 * @return void
	 */
	public function delete($id = 0)
	{
		// Delete one
		$ids = ($id) ? array($id) : $this->input->post('action_to');
		
		// Go through the array of slugs to delete
		if ( ! empty($ids))
		{
			$post_subject = array();
			foreach ($ids as $id)
			{
				// Get the current page so we can grab the id too
				if ($post = $this->blog_m->get($id) )
				{
					$this->blog_m->delete($id);
					
					// Wipe cache for this model, the content has changed
					$this->cache->delete('blog_m');				
					$post_subject[] = $post->subject;
				}
			}
		}
		
		// Some pages have been deleted
		if ( ! empty($post_subject))
		{
			// Only deleting one page
			if ( count($post_subject) == 1 )
			{
				$this->session->set_flashdata('success', sprintf($this->lang->line('blog_delete_success'), $post_subject[0]));
			}			
			// Deleting multiple pages
			else
			{
				$this->session->set_flashdata('success', sprintf($this->lang->line('blog_mass_delete_success'), implode('", "', $post_subject)));
			}
		}		
		// For some reason, none of them were deleted
		else
		{
			$this->session->set_flashdata('notice', lang('blog_delete_error'));
		}
		
		redirect('admin/blog');
	}
	
	/**
	 * Callback method that checks the slug of an article
	 * @access public
	 * @param string slug The Slug to check
	 * @return bool
	 */
	public function _check_slug($slug = '')
	{
		if ( ! $this->blog_m->check_slug($slug))
		{
			$this->form_validation->set_message('_check_slug', lang('news_already_exist_error'));
			return FALSE;
		}
		
		return TRUE;
	}
	
	/**
	 * method to fetch filtered results for news list
	 * @access public
	 * @return void
	 */
	public function ajax_filter()
	{
		$category = $this->input->post('f_category');
		$status = $this->input->post('f_status');
		$keywords = $this->input->post('f_keywords');
	
		$post_data = array();
	
		if ($status == 'live' OR $status == 'draft')
		{
			$post_data['status'] = $status;
		}
	
		if ($category != 0)
		{
			$post_data['category_id'] = $category;
		}
	
		//keywords, lets explode them out if they exist
		if ($keywords)
		{
			$post_data['keywords'] = $keywords;
		}
		$results = $this->news_m->search($post_data);
	
		//set the layout to false and load the view
		$this->template
			->set_layout(FALSE)
			->set('news', $results)
			->build('admin/index');
	}
	
}