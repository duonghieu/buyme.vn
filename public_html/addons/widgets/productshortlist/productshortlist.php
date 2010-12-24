<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package 		Buyme
 * @subpackage 		Product short list widget
 * @author			Trisi - Buyme Dev Team
 *
 * Show product short list
 */

require_once (BLL_PATH.'product.php');
class Widget_ProductShortList extends Widgets
{
	public $title = 'Product Sort List';
	public $description = 'Tạo danh sách ngắn các sản phẩm theo các tiêu chí khác nhau.';
	public $author = 'Trisi';
	public $website = 'http://dev.buyme.vn/';
	public $version = '1.0';

	public $fields = array(array(
								'field'   => 'heading',
								'label'   => 'Tên danh sách',
								'rules'   => 'required'
								),
							array(
								'field'   => 'type',
								'label'   => 'Loại danh sách',
								'rules'   => 'required'
								),
							array(
								'field'   => 'limit',
								'label'   => 'Số lượng sản phẩm',
								'rules'   => 'required'
								)
							);


	public function run($options)
	{
		if(empty($options['type']))
		{
			return ;
		}
		$db = new Product();
		$product_short_list = $db->get_product_short_list($options['type'],'0,'.$options['limit']);
		return array('heading'=>$options['heading'],'product_short_list'=>$product_short_list);
	}

}