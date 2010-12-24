<?php
class DALAbstract {
	
	protected $db = null;
	
	function DALAbstract () {
		die ("DALAbstract: Do not create instances of DALAbstract! Use a subclass.");
	}
	function open ($host, $user, $pass, $dbname = "", $autocommit = true) {}
	function close () {}
	
	function select_db ($dbname) {}
	
	function execute ($query_str) {}
	
	function get ($table_name, $primary_key = 0) {}
	
	function get_one ($table_name, $primary_key = 0) {}
	
	function get_all ($table_name, $primary_key = 0) {}
	
	function edit ($table_name, $primary_key ,$data  ) {}
	
	function delete ($table_name,$primary_key = 0) {}
	
	function insert ($table_name, $data) {}
	
	function Commit () {}
	
	function Rollback () {}
	
	function SetAutoCommit ($autocommit) {
		$this->_auto_commit = $autocommit;
	}

}


class msqli_dal extends DALAbstract {
	function msql_dal ($host, $user, $pass, $db = "") {
		if($this->db != null){
			if ($db != ""){
				$this->open ($host, $user, $pass,$dbname);
			}
		}
	}
	function open ($host, $user, $pass,$dbname) {
		$this->$db = mysqli_connect($host, $user, $pass,$dbname);
	}
	function close () {
		return mysqli_close ();
	}

	function  execute ($query_str) {
		$result = mysql_query ($query_str, $this->_db_linkid);
		if ($result == 0) {
			return 0;
		}
		else {
			if ($this->_db_qresult)
			@mysql_free_result($this->_db_qresult);
			$this->RowData = array();
			$this->_db_qresult = $result;
			$this->RowCount = @mysql_num_rows ($this->_db_qresult);
			if (!$this->RowCount) {
				// The query was probably an INSERT/REPLACE etc.
				$this->RowCount = 0;
			}
			return 1;
		}
	}
	function get ($table_name, $primary_key = 0) {
		if ((!mysql_data_seek ($this->_db_qresult, $row)) or ($row > $this->RowCount-1)) {

			printf ("SeekRow: Cannot seek to row %d\n", $row);
			return 0;
		}
		else {
			return 1;
		}
	}
	
	function get_one ($table_name, $primary_key = 0) {}
	
	function get_all ($table_name, $primary_key = 0) {}
	
	function insert ($table_name, $data) {}

	function edit ($table_name, $primary_key ,$data ) {
		if($this->RowData = mysql_fetch_array ($this->_db_qresult)) {
			$this->NextRowNumber++;
			return 1;
		}
		else {
			return 0;
		}
	}
	
	function delete ($table_name,$primary_key = 0) {
		
	}

	function Rollback () {
		echo "WARNING: Rollback is not supported by MySQL";
	}
}




class msql_dal extends DALAbstract {
	function msql_dal ($host, $user, $pass, $db = "") {
		$this->open ($host, $user, $pass);
		if ($db != "")
		$this->select_db($db);
	}
	function open ($host, $user, $pass, $autocommit = true) {
		$this->_db_linkid = mysql_connect ($host, $user, $pass);
	}
	function close () {
		@mysql_free_result($this->_db_qresult);
		return mysql_close ($this->_db_linkid);
	}
	function select_db ($dbname) {
		if (@mysql_select_db ($dbname, $this->_db_linkid) == true) {
			return 1;
		}
		else {
			return 0;
		}
	}
	function  execute ($query_str) {
		$result = mysql_query ($query_str, $this->_db_linkid);
		if ($result == 0) {
			return 0;
		}
		else {
			if ($this->_db_qresult)
			@mysql_free_result($this->_db_qresult);
			$this->RowData = array();
			$this->_db_qresult = $result;
			$this->RowCount = @mysql_num_rows ($this->_db_qresult);
			if (!$this->RowCount) {
				// The query was probably an INSERT/REPLACE etc.
				$this->RowCount = 0;
			}
			return 1;
		}
	}
	function get ($table_name, $primary_key = 0) {
		if ((!mysql_data_seek ($this->_db_qresult, $row)) or ($row > $this->RowCount-1)) {

			printf ("SeekRow: Cannot seek to row %d\n", $row);
			return 0;
		}
		else {
			return 1;
		}
	}
	
	function get_one ($table_name, $primary_key = 0) {}
	
	function get_all ($table_name, $primary_key = 0) {}
	
	function insert ($table_name, $data) {}

	function edit ($table_name, $primary_key ,$data ) {
		if($this->RowData = mysql_fetch_array ($this->_db_qresult)) {
			$this->NextRowNumber++;
			return 1;
		}
		else {
			return 0;
		}
	}
	
	function delete ($table_name,$primary_key = 0) {
		
	}

	function Rollback () {
		echo "WARNING: Rollback is not supported by MySQL";
	}
}



/*
 ##                                    Example
 ## $sql = new CDBMySQL("localhost", "username", "password", "dbname");
 ## $sql -> Query ("SELECT firstname, lastname FROM people");
 ## while ($sql -> ReadRow()) {
 ##   echo $sql -> RowData["lastname"] . ", ";
 ##   echo $sql -> RowData["firstname"] . "<br>";
 ## }
 */

?>
