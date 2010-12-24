<?php 
interface DALInterface {
	function executeQuery($sql) ;
	
	function get ($table_name, $fields = '*', $where, $limit = '') ;
	
	function get_one ($table_name, $fields, $id) ;
	
	function get_all ($table_name, $where = 1, $limit);
	
	function edit ($table_name, $data , $where = 1) ;
	
	function delete ($table_name,$where);
	
	function insert ($table_name, $data);
}
?>