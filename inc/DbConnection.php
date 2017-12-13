<?php
/**
 * Created by PhpStorm.
 * User: Peter Robinson/Luke
 * Date: 12/13/2017
 * Time: 12:25 PM
 */

class DbConnection
{
    var $_host = "db-mysql.zenit";    // Host name.
    var $_db_user = "uli705_081a34";  // MySQL username.
    var $_db_password = "11111111";     // MySQL password.
    var $_database = "uli705_173a20";   // Database name.
    var $_dbh = null;



    public function __construct($host, $db_user, $db_password, $database)
    {
        $this->_host = $host;
        $this->_db_user = $db_user;
        $this->_db_password = $db_password;
        $this->_database = $database;
        $this->_dbh = null;
    }
/*
    public function __construct()
    {

        $this->_host = "db-mysql.zenit";
        $this->_db_user = "uli705_081a34";
        $this->_db_password = "11111111";
        $this->_database = "uli705_173a20";
        $this->_dbh = null;
    }
*/
    public function OpenConnection()
    {
        $dbh = mysql_connect($this->_host, $this->_db_user, $this->_db_password);
        if ($dbh) {
            $this->_dbh = $dbh;
            mysql_select_db($this->_database);
        }
        return $dbh;
    }

    public function Select_Query($query)
    {
        $rows = null;
        $result = mysql_query($query, $this->dbh);
        if ($result) {
            $rows = mysql_fetch_array($result);
            return $rows;
        }
        return null;
    }
    public function ExecuteUpdateInsertDelete($query)
    {
        $rows = null;
        $rows_affect = mysql_query($query, $this->dbh);
        if ($rows_affect) {
           return  $rows_affect;
        }
        return null;
    }

}
