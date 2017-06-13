<?php
/**
 *
 * Class SqlConnection
 * Connection class to mySQL Server
 *
 */
class SqlConnection {
	const HOST = "127.0.0.1";
	const PORT = "3306";
	const DATABASE = "grp2";
	const USER = "grp2";
	const PWD = "France2016";
	private static $instance;
	private $_conn;
	 
	/**
	 * Constructor
	 * @method __construct()
	 * @desc constructor
	 */
	private function __construct() {
		try {
			$this->_conn = new PDO ( 'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE, 
					self::USER, 
					self::PWD, 
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
		} catch ( PDOException $e ) {
			die ( CONNECTION_FAIL . ' : ' . $e->getMessage () );
		}
	}
	
	/**
	 * singleton method
	 * @method getInstance
	 * @return resource
	 */ 
	public static function getInstance() {
		if (! isset ( self::$instance ) || self::$instance == null) {
			$c = __CLASS__;
			self::$instance = new $c ();
		}
		return self::$instance;
	}
	
	/**
	 * @method getConn
	 * @return connection
	 */
	public function getConn() {
		return $this->_conn;
	}
	
	/**
	 * @method executeQuery
	 * @desc Method for the execution of SQL query
	 * @param query
	 * @return result
	 */
	public function executeQuery($query) {
		$result = $this->_conn->exec ( $query );
		$e = $this->_conn->errorInfo ();
		if ($e [1] != null) {
			if ($e [1] == 1062)
				return USER_EXIST;
			else
				die ( print_r ( $this->_conn->errorInfo (), true ) );
		}
		return $result;
	}
	
	/**
	 * @method selectDB
	 * @desc Method for the SELECT
	 * @param query
	 * @return result
	 */
	public function selectDB($query) {
		$result = $this->_conn->query ( $query ) or die ( print_r ( $this->_conn->errorInfo (), true ) );
	
		return $result;
	}
	
	/**
	 * @method editDB
	 * @desc Method for the UPDATE
	 * @param query
	 * @return boolean
	 */
	public function editDB($query) {
		if ($this->_conn->query ( $query ) == TRUE) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * @method deleteDB
	 * @desc Method for the DELETE
	 * @param query
	 * @return boolean
	 */
	public function deleteDB($query) {
		if ($this->_conn->query ( $query ) == true) {
			return true;
		} else {
			return false;
		}
	}
}
?>