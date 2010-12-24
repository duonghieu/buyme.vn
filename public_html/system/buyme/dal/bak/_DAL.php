<?php

include 'connect.php';
/**
 * A base model to provide the basic CRUD
 * actions for all models that inherit from it.
 *
 * @package CodeIgniter
 * @subpackage BM_Model
 * @author Tri Si <http://buyme.vn>
 */
class DAL {
	/**
	 * The data connection to use
	 * @var array
	 */
	protected $db_group_name;

	/**
	 *
	 */
	protected static $DB = null;

	/**
	 * Constructor method
	 * @access public
	 * @return void
	 */
	public function __construct() {
		//$db_group_name='local'
		//$this->_connection($db_group_name);
		// connect to the DB if needed
		if ( is_null(self::$DB) ) {
			$dsn = app_AppConfig::getDSN();
			$db_user = app_AppConfig::getDBUser();
			$db_pass = app_AppConfig::getDBPassword();
			 
			self::$DB = new PDO($dsn, $db_user, $db_pass);
			 
			self::$DB->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
	}


	/**
	 * Wrapper to __construct for when loading
	 * class is a superclass to a regular controller,
	 * i.e. - extends Base not extends Controller.
	 *
	 * @return void
	 * @author
	 */
	public function BM_Data($db_group_name='local') {
		$this->_connection($db_group_name);
	}




	private function _connection($url) {
		// Check if MySQLi support is present in PHP
		if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
			_db_error_page('Unable to use the MySQLi database because the MySQLi extension for PHP is not installed. Check your <code>php.ini</code> to see how you can enable it.');
		}

		$url = parse_url($url);

		// Decode url-encoded information in the db connection string
		$url['user'] = urldecode($url['user']);
		// Test if database url has a password.
		$url['pass'] = isset($url['pass']) ? urldecode($url['pass']) : '';
		$url['host'] = urldecode($url['host']);
		$url['path'] = urldecode($url['path']);
		if (!isset($url['port'])) {
			$url['port'] = NULL;
		}

		$connection = mysqli_init();
		@mysqli_real_connect($connection, $url['host'], $url['user'], $url['pass'], substr($url['path'], 1), $url['port'], NULL, MYSQLI_CLIENT_FOUND_ROWS);

		if (mysqli_connect_errno() > 0) {
			_db_error_page(mysqli_connect_error());
		}

		// Force MySQL to use the UTF-8 character set. Also set the collation, if a
		// certain one has been set; otherwise, MySQL defaults to 'utf8_general_ci'
		// for UTF-8.
		if (!empty($GLOBALS['db_collation'])) {
			mysqli_query($connection, 'SET NAMES utf8 COLLATE ' . $GLOBALS['db_collation']);
		}
		else {
			mysqli_query($connection, 'SET NAMES utf8');
		}

		return $connection;
	}

	private function close_connection()	{
		self::$DB->close();
	}

	static function get_dbconfig($table) {

	}

	/**
	 * Similar to get_by(), but returns a result array of
	 * many result objects.
	 *
	 * @param string $key The key to search by
	 * @param string $val The value of that key
	 * @return array
	 * @author
	 */
	public function select($primary_value){
		self::$DB->where($this->primary_key, $primary_value);
		return self::$DB->get_all();
	}

	/**
	 * Get a single record by creating a WHERE clause with
	 * a value for your primary key
	 *
	 * @param string $primary_value The value of your primary key
	 * @return object
	 * @author
	 */
	public function select_one($primary_value){
		return self::$DB->where($this->primary_key, $primary_value)
		->get($this->table)
		->row();
	}

	/**
	 * Get all records in the database
	 *
	 * @param   string  Type object or array
	 * @return  mixed
	 * @author  Jamie Rumbelow
	 */
	public function select_all($type = 'array') {
		if ($type == 'array')
		{
			return self::$DB->get($this->table)->result_array();
		}
		return self::$DB->get($this->table)->result();
	}


	/**
	 * Insert a new record into the database,
	 * calling the before and after create callbacks.
	 * Returns the insert ID.
	 *
	 * @param array $data Information
	 * @return integer
	 * @author
	 */
	public function insert($data){
		self::$DB->insert($this->table, $data);
		return self::$DB->insert_id();
	}

	/**
	 * Similar to insert(), just passing an array to insert
	 * multiple rows at once. Returns an array of insert IDs.
	 *
	 * @param array $data Array of arrays to insert
	 * @return array
	 * @author
	 */
	public function insert_multi($data) {
		$ids = array();

		foreach ($data as $row)
		{
			self::$DB->insert($this->table, $row);
			$ids[] = self::$DB->insert_id();
		}
		return $ids;
	}

	/**
	 * Update a record, specified by an ID.
	 *
	 * @param integer $id The row's ID
	 * @param array $array The data to update
	 * @return bool
	 * @author
	 */
	public function update($primary_value, $data){
		return self::$DB->where($this->primary_key, $primary_value)
		->set($data)
		->update($this->table);
	}

	/**
	 * Updates many records, specified by an array
	 * of IDs.
	 *
	 * @param array $primary_values The array of IDs
	 * @param array $data The data to update
	 * @return bool
	 */
	public function update_multi($data){
		try{
			foreach ($data as $key->$value){
				self::$DB->where($this->primary_key, $key)
				->set($value)
				->update($this->table);
			}
			return true;
		}
		catch (Exception $e) {

		}
	}

	/**
	 * Delete a row from the database table by the
	 * ID.
	 *
	 * @param integer $id
	 * @return bool
	 */
	public function delete($id){
		return self::$DB->where($this->primary_key, $id)
		->delete($this->table);
	}

	/**
	 * Delete many rows from the database table by
	 * an array of IDs passed.
	 *
	 * @param array $ids
	 * @return bool
	 */
	public function delete_multi($ids)
	{
		return self::$DB->where_in($this->primary_key, $primary_values)
		->delete($this->table);
	}

	/**
	 * Check rows from the database exist
	 * an ID passed.
	 *
	 * @param integer $id
	 * @return bool
	 */
	public function is_exist($id){
		//return $this->select_one($id);
	}

	public function count_all()
	{
		return $self::$DB->count_all($this->table);
	}


	protected function executeQuery ($query) {
		$st = self::$DB->query($query);
		if ( $st->columnCount()>0 ) {
			return $st->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return array();
		}
	}

	public function db_fetch_array($result) {
		if ($result) {
			return pg_fetch_assoc($result);
		}
	}

	public function db_fetch_object($result) {
		if ($result) {
			return pg_fetch_object($result);
		}
	}

}


class CDB_OCI8 extends DALAbstract {
	function CDB_OCI8($host, $user, $pass, $autocommit = true) {
		$this->Open ($host, $user, $pass, "", $autocommit);
	}

	function Open($host, $user, $pass, $db = "", $autocommit = true) {
		($this->_db_linkid = OCILogon($user, $pass, $host)) or die("Error on logon:
". OCIError());   
		$this->_auto_commit = $autocommit;
	}

	function Close() {
		OCIFreeStatement($this->_db_qresult);
		OCILogOff($this->_db_linkid) or die ("Error on logoff: ". OCIError());
	}

	function SelectDB($dbname) {
		echo "CDB_OCI8 does not support SelectDB";
		return 0;
	}

	function Query($querystr) {
		($result = ociparse($this->_db_linkid, $querystr))
		or die("Error in query: ". OCIError());
		if ($this->_auto_commit) {
			OCIExecute($result, OCI_COMMIT_ON_SUCCESS);
		}
		else {
			OCIExecute($result, OCI_DEFAULT);
		}
		 
		if ($result == 0) {
			return 0;
		}
		else {
			if ($this->_db_qresult)
			OCIFreeStatement($this->_db_qresult);
			$this->RowData = array();
			$this->_db_qresult = $result;
			$this->RowCount = OCIRowCount($this->_db_qresult);
			if (!$this->RowCount) {
				// The query was probably an INSERT/REPLACE etc.
				$this->RowCount = 0;
			}
			return 1;
		}
	}

	function SeekRow ($row = 0) {
		die ("CDB_OCI8 does not support SelectDB");
	}

	function ReadRow() {
		if(OCIFetchInto($this->_db_qresult, $this->RowData, OCI_ASSOC)) {
			$this->NextRowNumber++;
			return 1;
		}
		else {
			return 0;
		}
	}

	function Commit() {
		OCICommit($this->_db_linkid);
	}
	function Rollback() {
		OCIRollback($this->_db_linkid);
	}

	function _ident () {
		return "CDB_OCI8/1.0";
	}
}


class CDB_pgsql extends DALAbstract {
	var $_php_ver_major;
	var $_php_ver_minor;
	var $_php_ver_rel;
	function CDB_pgsql($host, $user, $pass, $db, $autocommit = true) {
		$this->Open( $host, $user, $pass, $db, $autocommit );
	}

	function Open ($host, $user, $pass, $db = "", $autocommit = true) {
		list( $this->_php_ver_major,
		$this->_php_ver_minor,
		$this->_php_ver_rel   ) = explode( ".", phpversion() );
		($this->_db_linkid = @pg_connect( "host=$host password=$pass dbname=$db user=$user" )) or
		die("Error on logon:");
	}

	function Close () {
		pg_freeresult( $this->_db_qresult );
		return pg_close( $this->_db_linkid );
	}

	function SelectDB ($dbname) {
		echo "CDB_pgsql does not support SelectDB";
		return 0;
	}

	function Query ($querystr) {
		if (!$this->_auto_commit) {
			@pg_exec( $this->_db_linkid, "BEGIN;" );
		}
		$result = pg_exec( $this->_db_linkid, $querystr );
		if ($result == 0) {
			return 0;
		} else {
			if ($this->_db_qresult)
			@pg_freeresult( $this->_db_qresult );
			$this->RowData = array();
			$this->_db_qresult = $result;
			$this->RowCount = @pg_numrows( $this->_db_qresult );
			if (!$this->RowCount) {
				// The query was probably an INSERT/REPLACE etc.
				$this->RowCount = 0;
			}
			$this->NextRowNumber = 0;
			return 1;
		}
	}

	function SeekRow ($row = 0) {
		$this->NextRowNumber = $row;
		return 1;
	}

	function ReadRow ($arrType = PGSQL_ASSOC) {
		if ($this->NextRowNumber >= $this->RowCount)
		return 0;
		if ($this->_php_ver_major > 3) {
			if ($this->RowData = pg_fetch_array( $this->_db_qresult, $this->NextRowNumber, $arrType )) {
				$this->NextRowNumber++;
				return 1;
			} else {
				return 0;
			}
		} else {
			if ($this->RowData = pg_fetch_array( $this->_db_qresult, $this->NextRowNumber )) {
				$this->NextRowNumber++;
				return 1;
			} else {
				return 0;
			}
		}
	}

	function Commit () {
		return $this->Query("COMMIT;");
	}

	function Rollback () {
		return $this->Query("ROLLBACK;");
	}

	function SetAutoCommit ($autocommit) {
		$this->_auto_commit = $autocommit;
	}

	function _ident () {
		return "CDB_pgsql/0.1";
	}
}


$news = new DAL();
var_dump($news);
?>
