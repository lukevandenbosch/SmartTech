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


/*
    public function DbConnection($host, $db_user, $db_password, $database)
    {
        $this->_host = $host;
        $this->_db_user = $db_user;
        $this->_db_password = $db_password;
        $this->_database = $database;
        $this->_dbh = null;
        echo "Host: $host";
    }
*/

    public function DbConnection()
    {
        /*
        $this->_host = "db-mysql.zenit";
        $this->_db_user = "uli705_081a34";
        $this->_db_password = "11111111";
        $this->_database = "uli705_173a20";
        $this->_dbh = null;
        */


        $this->_host = "50.62.177.37";
        $this->_db_user = "senecauli";
        $this->_port = "3306";
        $this->_db_password = "P@ssw0rd";
        $this->_database = "smarttech";
        $this->_dbh = null;

    }

    public function OpenConnection()
    {

        // Connect to database server.
        $con = mysqli_connect($this->host, $this->db_user, $this->db_password, $this->database, $this->port);

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {

            $this->_dbh = $con;
        }
        return $this->dbh;
    }



    public function Select_Query($query)
    {
        $rows = null;
        $result =mysqli_query($this->_dbh,$query);

        if ($result) {
            $rows = mysqli_fetch_assoc($result);
            return $rows;
        }
        return null;
    }
    public function ExecuteUpdateInsertDelete($query)
    {
        $rows = null;
        $rows_affect = mysqli_query($query, $this->dbh);
        if ($rows_affect) {
            //get rows affected
           return  mysqli_affected_rows($this->dbh);
        }
        return null;
    }

}
