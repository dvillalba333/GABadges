<?php

class DBCPanel {

	private $link;
	private static $instance;

	public function __construct() {
	}

	public static function singleton()
	{
		if (!isset(self::$instance)) {
			$className = __CLASS__;
			self::$instance = new $className;
		}
		return self::$instance;
	}

// ================================================================================
// ========= Database Functions
// ================================================================================
   /*
    * Init the connection
    */
    public function init() {
 	    	$this->init_connection(Config::DB_HOST_CPANEL,Config::DB_USER_CPANEL,Config::DB_PASS_CPANEL,Config::DB_NAME_CPANEL);
    }

    public function init_connection($dbhost,$dbuser,$dbpass,$dbname) {

		if (Config::DB_TYPE =='mysql') {
	
	        $this->link = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	        
            // Check connection
            if ($this->link->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
		    
			//$this->link = mysqli_connect($dbhost,$dbuser,$dbpass);
			//mysqli_select_db($dbname) or die('Could not select database');
		}
		if (Config::DB_TYPE =='mssql') {
			$this->link = mssql_connect($dbhost,$dbuser,$dbpass)
    			or die("Couldn't connect to SQL Server on $dbhost");
			mssql_select_db($dbname, $link)
			    or die("Couldn't open database $dbname");
		}
		
   }

/*
 * Closing connection
 */
   public function finish_connection() {
		if (Config::DB_TYPE =='mysql') mysqli_close($this->link);
		if (Config::DB_TYPE =='mssql') mssql_close($this->link);
   }   
   
   /*
    *  Function that retrieves the first limit results of the query
    */

   public function limit_query($query,$limit) {
		if (Config::DB_TYPE =='mysql') return 'SELECT ' . $query . ' limit '. $limit;
		if (Config::DB_TYPE =='mssql') return 'SELECT TOP ' . $limit . ' ' .$query;
   }

/*
 * Insert to the the function for the correct date
 */
   public function current_date() {
		if (Config::DB_TYPE =='mysql') return 'Now()';
		if (Config::DB_TYPE =='mssql') return 'GETDATE()';
   }


   /*
    * Functions that executes a query
    */
   public function execute_query($query) {
		if (Config::DB_TYPE == 'mysql') {
		    $result = mysqli_query($this->link,$query) or die('Query failed: ' . mysql_error());
			
		}
		if (Config::DB_TYPE == 'mssql') {
			$result = mssql_query($query);
		}
		return $result;	
   }

   
   public function num_rows($result) {
   		if (Config::DB_TYPE == 'mysql') {
			$number = mysqli_num_rows($result);
		}
		return $number;
   }
   
/*
 * Function that fetch results in an array
 */
   public function fetch_array($result) {
		if (Config::DB_TYPE == 'mysql') {
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
		}
		if (Config::DB_TYPE == 'mssql') {
			$row = mssql_fetch_array($result, MSSQL_NUM);
		}
		return $row;
   }

   public function fetch_row($result) {
		if (Config::DB_TYPE == 'mysql') {
			$row = mysqli_fetch_row($result);
		}
		if (Config::DB_TYPE == 'mssql') {
			$row = mssql_fetch_row($result);
		}
		return $row;
   }
/*
 * Function that refresh the space used
 */   
   public function free_result($result) {
	if (Config::DB_TYPE == 'mysql') {
			mysqli_free_result($result);
	}
	if (Config::DB_TYPE == 'mssql') {
			mssql_free_result($result);
	}
   }

   // Closing connection
   public function close() {
	//$this->finish_connection();
   }
   
   
   public function __destruct() {
   }
   
   }
?>