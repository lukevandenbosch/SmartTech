<?php
/**
 * Created by PhpStorm.
 * User: Peter Robinson/Luke
 * Date: 12/13/2017
 * Time: 12:25 PM
 */

class MySQLConnection
{
    var $_host = "db-mysql.zenit";    // Host name.
    var $_db_user = "uli705_081a34";  // MySQL username.
    var $_db_password = "11111111";     // MySQL password.
    var $_database = "uli705_173a20";   // Database name.
    var $_port = "3306";   // Database Port.
    var $_dbh = null;


/*
    public function __construct($host, $db_user, $db_password, $database)
    {
        $this->_host = $host;
        $this->_db_user = $db_user;
        $this->_db_password = $db_password;
        $this->_database = $database;
        $this->_dbh = null;
        echo "Host: $host";
    }
*/

    public function __construct($connection ="default")
    {
        //'zenit.senecac.on.ca', 'uli705_173a29', 'crtw9356', 'uli705_173a29'
        if($connection =="peter")
        {
            $this->_host = "db-mysql.zenit";
            $this->_db_user = "uli705_173a20";
            $this->_port = "3306";
            $this->_db_password = "csHE3669";
            $this->_database = "li705_173a20";
            $this->_dbh = null;

        }else if($connection =="luke") {
            $this->_host = "db-mysql.zenit";
            $this->_db_user = "uli705_173a29";
            $this->_port = "3306";
            $this->_db_password = "crtw9356";
            $this->_database = "li705_173a29";
            $this->_dbh = null;

        }else
        {
            $this->_host = "50.62.177.37";
            $this->_db_user = "senecauli";
            $this->_port = "3306";
            $this->_db_password = "P@ssw0rd";
            $this->_database = "smarttech";
            $this->_dbh = null;
        }

    }

    public function OpenConnection()
    {

        // Connect to database server.
        $con = mysqli_connect($this->_host, $this->_db_user, $this->_db_password, $this->_database);

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {

            $this->_dbh = $con;
            //print_r($this->_dbh);
        }
        return $this->_dbh;
    }



    public function Select_Query($query)
    {
        print "$query";
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
        $rows_affected = mysqli_query( $this->_dbh,$query);
        if ($rows_affected) {
            //get rows affected
           return  mysqli_affected_rows($this->_dbh);
        }
        return null;
    }

}
