<?php  defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Buyme
 *
 * @package		Buyme
 * @author		VDCO Buyme Dev Team
 * @link		http://buyme.vn
 * @since		Version 1.0
 * @filesource
 *
 * Buyme Product Definition
 *
 * @author		Trisi <dangtrisi@gmail.com>
 * @package		Buyme
 */

include DAL_PATH;
class Product extends Dal{

	/**
	 * Construct
	 *
	 * Loads the database
	 *
	 * @access	public
	 * @return	string
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Lấy một sản phẩm
	 *
	 * @access	public
	 * @return	bool
	 */
	public function get_one($id) {
		$results = parent::get_one('product_short_list', '*', $id);
		return $results;
	}

	/**
	 * Sửa sản phẩm
	 *
	 * @access	public
	 * @return	bool
	 */
	public function edit() {
	}

	
	/**
	 * Thêm sản phẩm mới
	 *
	 * @access	public
	 * @return	product id
	 */
	public function add() {
	}

	
	/**
	 * Xóa sản phẩm
	 *
	 * @access	public
	 * @return	bool
	 */
	public function delete() {
	}


	/**
	 * Kiểm tra sản phẩm đã tồn tại hay chưa
	 *
	 * @access	public
	 * @return	bool
	 */
	public function check_exist() {
	}


	/**
	 * Lấy sản phẩm giới thiệu
	 *
	 * @access	public
	 * @return	array
	 */
	public function get_product_short_list($type = 'featured', $limit = '0,12'){
		$results = parent::get_all('product_short_list', 'status = 1 and type = "'.$type.'"', $limit);
		return $results;
	}
}
?>