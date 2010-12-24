<?php
class DB {
	private $driver;
	public function __construct($connect='local') {
		require_once 'config.php';
		$driver = $dbconfig[$connect]['dbdriver'];
		$hostname = $dbconfig[$connect]['hostname'];
		$username = $dbconfig[$connect]['username'];
		$password = $dbconfig[$connect]['password'];
		$database = $dbconfig[$connect]['database'];
		//if (file_exists('dal/driver/' . $driver . '.php')) {
		require_once('driver/' . $driver . '.php');
		//} else {
		//	exit('Error: Could not load database file ' . $driver . '!');
		//}

		$this->driver = new $driver($hostname, $username, $password, $database);
	}

	public function executeQuery($sql) {
		return $this->driver->executeQuery($sql);
	}

	function get ($table_name, $fields, $where, $limit) {
		return $this->driver->get($table_name, $fields,$where,$limit);
	}

	function get_one ($table_name, $fields, $id) {
		return $this->driver->get_one($table_name, $fields, $id);
	}

	function get_all ($table_name, $where, $limit) {
		return $this->driver->get_all($table_name, $where, $limit);
	}

	function edit ($table_name,$data,$old_data, $where) {
		//su ly old data and news data chi cap nhat cac truong thay doi noi dung
		return $this->driver->edit($table_name, $data , $where);
	}

	function delete ($table_name,$where) {
		return $this->driver->delete($table_name,$where);
	}

	function insert ($table_name, $data) {
		return $this->driver->insert($table_name, $data);
	}


}
?>