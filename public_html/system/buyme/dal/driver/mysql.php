<?php
include 'dal_interface.php';

class MySQL implements  DALInterface {
	private $connection;

	public function __construct($hostname, $username, $password, $database) {
		if (!$this->connection = mysql_connect($hostname, $username, $password)) {
			exit('Error: Could not make a database connection using ' . $username . '@' . $hostname);
		}

		if (!mysql_select_db($database, $this->connection)) {
			exit('Error: Could not connect to database ' . $database);
		}

		mysql_query("SET NAMES 'utf8'", $this->connection);
		mysql_query("SET CHARACTER SET utf8", $this->connection);
		mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $this->connection);
		mysql_query("SET SQL_MODE = ''", $this->connection);
	}

	public function executeQuery($sql) {
		$resource = mysql_query($sql, $this->connection);
		if ($resource) {
			$data;
			while ($row = mysql_fetch_assoc($resource)) {
				$data[] = $row;
			}
			return $data;
		} else {
			exit('Error: ' . mysql_error($this->connection) . '<br />Error No: ' . mysql_errno($this->connection) . '<br />' . $sql);
		}

	}


	function get ($table_name, $fields = '*', $where, $limit = '') {
		if($fields){
			$sql = 'SELECT ' . $fields . ' FROM ' . $table_name . ' ';
		}
		else{
			$sql = 'SELECT * FROM ' . $table_name . ' ';
		}
		if($where){
			$sql.=' WHERE '.$where;
		}
		if($limit){
			$sql.= ' LIMIT ' . $limit;
		}
		$results = $this->executeQuery($sql);
		return $results;
	}

	function get_one ($table_name, $fields, $id) {
		// $r = get ($table_name, $fields, 'id = '.$id);
		// return $rows[0];
		$results = $this->get($table_name,$fields,'id = '.$id, null);
		return $results[0];
	}

	function get_all ($table_name, $where = 1, $limit) {
		// $r = get ($table_name, null, $where, $limit);
		$results = $this->get($table_name,'*',$where, $limit);
		return $results;
	}

	function insert($table_name, $data) {
		$fields = array_keys($data);
		$values = array_values($data);
		var_export($fields);
		// We compose the query
		$sql = 'INSERT INTO '. $table_name .' ';
		// implode the column names, inserting "\", \"" between each (but not after the last one)
		// we add the enclosing quotes at the same time
		$sql .= '(' . implode(', ', $fields) . ') ';
		$sql .= ' VALUES ';
		// Same with the values
		$sql .= '("' . implode('","', $values) . '");';
		var_dump($sql);
		mysql_query($sql, $this->connection) or die(mysql_error());;
		$id = mysql_insert_id();
		if($id){
			return $id;
		}else{
			return 0;
		}

	}


	function edit ($table_name, $data , $where = 1) {
		$fields = array_keys($data);
		$values = array_values($data);
		$i=0;
		$sql='UPDATE  '.$table_name.' SET ';
		while($fields[$i]){
			if($i>0){
				$sql.=', ';
			}
			$sql.=$fields[$i].' = "' . $this->escape($values[$i]) . '"';
			$i++;
		}
		if($where){
			$sql.=' WHERE '.$where.' LIMIT 1;';
		}
		mysql_query($sql, $this->connection) or die(mysql_error());
		return true;
	}

	function delete ($table_name,$where) {
		$sql = 'DELETE FROM '.$table_name.' WHERE ' . $where ;
		$results = mysql_query($sql,$this->connection);
		return $results;
	}




	public function escape($value) {
		return mysql_real_escape_string($value, $this->connection);
	}

	public function countAffected() {
		return mysql_affected_rows($this->connection);
	}

	public function getLastId() {
		return mysql_insert_id($this->connection);
	}

	public function __destruct() {
		mysql_close($this->connection);
	}

}
?>