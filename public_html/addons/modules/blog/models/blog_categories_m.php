<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Categories model
 *
 * @package		PyroCMS
 * @subpackage	Categories Module
 * @category	Modules
 * @author		Phil Sturgeon - PyroCMS Dev Team
 */
class Blog_categories_m extends MY_Model
{
	/**
	 * Insert a new category into the database
	 * @access public
	 * @param array $input The data to insert
	 * @return string
	 */
	public $table='bm_blog_category';
	
	function get_by($parent_id)
    {
    	//$this->db->select('*');
       	//$this->db->where('parent_id',$parent_id);
        return $this->db->get()->result();
    }
    
    function get_by_post($post_id)
    {
		$this->db->select('bm_blog_category.*');//,c.id AS category_id,c.name AS category_name');
		$this->db->join('bm_blog_category_blog AS bc','bc.category_id = bm_blog_category.id');
		$this->db->where('bc.blog_id',$post_id);
        return $this->db->get($this->table)->result();
    }
	
    function get_cat_id_by_post($post_id)
    {
		$this->db->select('bm_blog_category.id');//,c.id AS category_id,c.name AS category_name');
		$this->db->join('bm_blog_category_blog AS bc','bc.category_id = bm_blog_category.id');
		$this->db->where('bc.blog_id',$post_id);
        return $this->db->get($this->table)->result();
    }
    
    
	public function insert($input = array())
    {
    	$this->load->helper('text');
    	parent::insert(array(
        	'name'=>$input['name'],
        	'description'=>$input['description'],
    		'parent_id'=>($input['category_id'])?$input['category_id']:0,
    		'position'=>($input['position'])?$input['position']:0
        ));
        
        return $input['name'];
    }
    
	/**
	 * Update an existing category
	 * @access public
	 * @param int $id The ID of the category
	 * @param array $input The data to update
	 * @return bool
	 */
    public function update($id, $input)
	{
		return parent::update($id, array(
            'name'	=> $input['name'],
            'description'	=> $input['description'],
			'position'=>($input['position'])?$input['position']:0,
		));
    }

	/**
	 * Callback method for validating the title
	 * @access public
	 * @param string $title The title to validate
	 * @return mixed
	 */
	public function check_title($name = '')
	{
		//var_dump(parent::count_by('name', $name));
		return parent::count_by('name', $name) == 0;
	}
	
	/**
	 * Insert a new category into the database via ajax
	 * @access public
	 * @param array $input The data to insert
	 * @return int
	 */
	public function insert_ajax($input = array())
	{
		$this->load->helper('text');
		return parent::insert(array(
				'name'=>$input['name'],
				//is something wrong with convert_accented_characters?
				//'slug'=>url_title(strtolower(convert_accented_characters($input['title'])))
				'description' => $input['description']
				));
	}
	
	
	
	public $list_categories;
	public function get_categories($parent_id = 0) {
		$this->db->where('parent_id',$parent_id);
		$this->db->order_by('position','ASC');
        $categories = $this->db->get($this->table)->result();
        foreach ($categories as $category){
        	$category->name=$category->name;
        	$this->list_categories[] = $category;
        	$this->get_categories($category->id);	
        }
	}
	public function get_list_categories($parent_id = 0) {
		$this->get_categories(0);
		return $this->list_categories;

	}
}