<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Categories model
 *
 * @package		PyroCMS
 * @subpackage	Categories Module
 * @category	Modules
 * @author		Phil Sturgeon - PyroCMS Dev Team
 */
class Blog_tag_m extends MY_Model
{
	/**
	 * Insert a new category into the database
	 * @access public
	 * @param array $input The data to insert
	 * @return string
	 */
	public $table='bm_blog_tag';

    function get_by_post($post_id)
    {
		$this->db->select('bm_blog_tag.*');//,c.id AS category_id,c.name AS category_name');
		$this->db->join('bm_blog_tag_blog AS bt','bt.tag_id = bm_blog_tag.id');
		$this->db->where('bt.blog_id',$post_id);
        return $this->db->get($this->table)->result();
    }
    
    
	public function insert($input = array())
    {
    	$this->load->helper('text');
    	parent::insert(array(
        	'name'=>$input['name'],
        	'description'=>$input['description'],
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
	
	
	
	protected  $list_categories;
	public function get_categories($parent_id = 0) {
		$list_categories[] = $categories;
		if($categories){
			foreach ($categories as $category){
				$list_categories[] = $category;
				//$this->get_categories($category->parent_id);
			}
		}
	}
	public function get_list_categories($parent_id = 0) {
		$this->list_categories = '';
		$this->get_categories($parent_id);
		return $this->list_categories;
	}
}