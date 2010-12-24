<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_m extends MY_Model
{

	public $table = 'bm_blog';
	
	function insert($input = array(),$categories_id ) {
		$this->load->helper('date');
		$input['created_date'] = now();
		$input['modified_date'] = now();
		$id = parent::insert($input);
		foreach($categories_id as $value){
			$category_id = (int)$value;
			//$this->db->insert_string('bm_blog_category_blog', array($category_id,$id));
			$this->db->query("INSERT INTO bm_blog_category_blog VALUE(".$category_id.",".$id.")");
		} 
		
		return $id;
	}


	function update($id, $input,$categories_id) {
		$this->update_cat_blog_relation($id,$categories_id);
		$this->load->helper('date');
		$input['modified_date'] = now();
		return parent::update($id, $input);
	}
	function update_cat_blog_relation($id,$categories_id) {
		//tatca(id)
		//timtrong tatca
		 
	}
	
	function delete($id = 0) {
		return parent::delete($id);
	}

	function search($keyword = ''){
	
		if ($keyword)
		{
			$matches = array();
			if (strstr($keyword, '%'))
			{
				preg_match_all('/%.*?%/i', $keyword, $matches);
			}

			if ( ! empty($matches[0]))
			{
				foreach($matches[0] as $match)
				{
					$phrases[] = str_replace('%', '', $match);
				}
			}
			else
			{
				$temp_phrases = explode(' ', $keywords);
				foreach($temp_phrases as $phrase)
				{
					$phrases[] = str_replace('%', '', $phrase);
				}
			}

			$counter = 0;
			foreach($phrases as $phrase)
			{
				if ($counter == 0)
				{
					$this->db->like('blog.name', $phrase);
				}
				else
				{
					$this->db->or_like('blog.name', $phrase);
				}

				$this->db->or_like('blog.description', $phrase);
				//$this->db->or_like('bm_user.username', $phrase);
				$counter++;
			}
		}
		return $this->get_all();
	}
	
	function get_by_category($cat_id){
		$this->db->where('bc.category_id',$cat_id);
		return $this->get_all();
	}
	
	function get_by_date($date){
		 
	}
	
	function get_by_author($author_id){
		$this->db->where('bm_blog.user_id',$author_id);
		return $this->get_all(); 
	}
	
	function get_by_id($id){
		$this->db->where($this->table.'.id',$id);
		return $this->get_all();  
	}
	
	function get_by_slug($slug){
		$this->db->where($this->table.'.slug',$slug);
		return $this->get_all(); 
	}
	
	function get_by_tag($tag){
		$this->db->where('bt.name',$tag);
		return $this->get_all();  
	}

	function publish($id = 0) {
		return parent::update($id, array('status' => 1));
	}
	function unpublish($id = 0) {
		return parent::update($id, array('status' => 0));
	}


	function get_all()
	{
		$this->db->select('DISTINCT bm_blog.*,u.username AS author');//,c.id AS category_id,c.name AS category_name');
		$this->db->join('users AS u','bm_blog.user_id = u.id');
		$this->db->join('bm_blog_category_blog AS bc','bm_blog.id = bc.blog_id');
		$this->db->join('bm_blog_category AS c','bc.category_id = c.id');
		$this->db->order_by('created_date', 'DESC');
		 
		return $this->db->get($this->table)->result();
	}

	
	
	
	
	
	
	
	
	
	
	function get_many_by($params = array())
	{
		$this->load->helper('date');

		if ( ! empty($params['category']))
		{
			if (is_numeric($params['category']))  $this->db->where('c.id', $params['category']);
			else  				 				 $this->db->where('c.slug', $params['category']);
		}
		 
		if ( ! empty($params['month']))
		{
			$this->db->where('MONTH(FROM_UNIXTIME(created_on))', $params['month']);
		}
		 
		if ( ! empty($params['year']))
		{
			$this->db->where('YEAR(FROM_UNIXTIME(created_on))', $params['year']);
		}
		 
		// Is a status set?
		if ( ! empty($params['status']) )
		{
			// If it's all, then show whatever the status
			if ($params['status'] != 'all')
			{
				// Otherwise, show only the specific status
				$this->db->where('status', $params['status']);
			}
		}
		 
		// Nothing mentioned, show live only (general frontend stuff)
		else
		{
			$this->db->where('status', 'live');
		}
		 
		// By default, dont show future articles
		if ( ! isset($params['show_future']) || (isset($params['show_future']) && $params['show_future'] == FALSE))
		{
			$this->db->where('created_on <=', now());
		}

		// Limit the results based on 1 number or 2 (2nd is offset)
		if (isset($params['limit']) && is_array($params['limit'])) $this->db->limit($params['limit'][0], $params['limit'][1]);
		elseif (isset($params['limit'])) $this->db->limit($params['limit']);
		 
		return $this->get_all();
	}

	function count_by($params = array())
	{
		$this->db->join('news_categories c', 'news.category_id = c.id', 'left');
		 
		if ( ! empty($params['category']))
		{
			if (is_numeric($params['category']))  $this->db->where('c.id', $params['category']);
			else  				 				 $this->db->where('c.slug', $params['category']);
		}
		 
		if ( ! empty($params['month']))
		{
			$this->db->where('MONTH(FROM_UNIXTIME(created_on))', $params['month']);
		}
		 
		if ( ! empty($params['year']))
		{
			$this->db->where('YEAR(FROM_UNIXTIME(created_on))', $params['year']);
		}
		 
		// Is a status set?
		if ( ! empty($params['status']) )
		{
			// If it's all, then show whatever the status
			if ($params['status'] != 'all')
			{
				// Otherwise, show only the specific status
				$this->db->where('status', $params['status']);
			}
		}
		 
		// Nothing mentioned, show live only (general frontend stuff)
		else
		{
			$this->db->where('status', 'live');
		}

		return $this->db->count_all_results('news');
	}



	// -- Archive ---------------------------------------------

	function get_archive_months()
	{
		$this->load->helper('date');
		 
		$this->db->select('UNIX_TIMESTAMP(DATE_FORMAT(FROM_UNIXTIME(t1.created_on), "%Y-%m-02")) AS `date`', FALSE);
		$this->db->distinct();
		$this->db->select('(SELECT count(id) FROM news t2
							WHERE MONTH(FROM_UNIXTIME(t1.created_on)) = MONTH(FROM_UNIXTIME(t2.created_on)) 
								AND YEAR(FROM_UNIXTIME(t1.created_on)) = YEAR(FROM_UNIXTIME(t2.created_on)) 
								AND status = "live"
								AND created_on <= '.now().'
						   ) as article_count');

		$this->db->where('status', 'live');
		$this->db->where('created_on <=', now());
		$this->db->having('article_count >', 0);
		$this->db->order_by('t1.created_on DESC');
		$query = $this->db->get('news t1');

		return $query->result();
	}

	// DIRTY frontend functions. Move to views
	function get_news_fragment($params = array())
	{
		$this->load->helper('date');
		 
		$this->db->where('status', 'live');
		$this->db->where('created_on <=', now());

		$string = '';
		$this->db->order_by('created_on', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get('news');
		if ($query->num_rows() > 0) {
			$this->load->helper('text');
			foreach ($query->result() as $blogs) {
				$string .= '<p>' . anchor('news/' . date('Y/m') . '/'. $blogs->slug, $blogs->title) . '<br />' . strip_tags($blogs->intro). '</p>';
			}
		}
		return $string ;
	}

	function check_slug($slug = '')
	{
		return parent::count_by('slug', $slug) == 0;
	}

	 
}