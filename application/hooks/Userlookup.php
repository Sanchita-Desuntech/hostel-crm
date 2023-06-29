<?php defined('BASEPATH') or die('No direct script access allowed');

class Userlookup{

    protected $uri_username;
    protected $connection_method;
        
    protected $hostname;
    protected $username;
    protected $password;
    protected $database;

    public function __construct()
    {
        // Configure database connection
        include(APPPATH.'config/database'.EXT);
        $this->hostname = $db[$active_group]['hostname'];
        $this->username = $db[$active_group]['username'];
        $this->password = $db[$active_group]['password'];
        $this->database = $db[$active_group]['database'];
    }

    public function check_uri()
    {
         // First, we need get the uri segment to inspect
		 print_r($_SERVER['REQUEST_URI']);
		 
         $request_uri = explode('/',substr($_SERVER['REQUEST_URI'], 19));
         $this->uri_username = array_shift($request_uri);
         $connection_router = array_shift($request_uri);
         $this->connection_method = empty($connection_router) ? 'index' : $connection_router;
         // Connect to database, and check the user table
         mysql_connect($this->hostname, $this->username, $this->password) AND mysql_select_db($this->database);
         $res = mysql_query("SELECT user_id FROM so_user WHERE username='".$this->uri_username."'");
		 
	//echo "SELECT user_id FROM so_user WHERE username='".$this->uri_username."'";	 
		 
         if ($row = @mysql_fetch_object($res))
         {
                // If, there is a result, then we should modify server data
                // Below line means, we told CodeIgniter to load
                // 'User' controller on 'index', 'info' or any valid connection/method and we send 'id' parameter
             echo   $_SERVER['PATH_INFO'] = '/user/'.$this->connection_method.'/'.$row->user_id;
         }
         @mysql_free_result($res);
    }
}  