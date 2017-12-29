<?php
/**
 * Created by PhpStorm.
 * User: Peter Robinson/Luke
 * Date: 12/13/2017
 * Time: 12:25 PM
 */

//Declare generic class for storing  query results (rows)

class QueryResult {

    private $_results = array();

    //default constructor
    public function __construct(){}

    //setting field values
    public function __set($field,$value){
        $this->_results[$field] = $value;
    }

    //retrieving a field value by name
    public function __get($field){
        if (isset($this->_results[$field])){
            return $this->_results[$field];
        }
        else{
            return null;
        }
    }
}

/*
 * This is created  for the data access later to handle data access functionality.
 */
class MySQLConnection
{
    var $_host ;    // Host name.
    var $_db_user ; // MySQL username.
    var $_db_password ;    // MySQL password.
    var $_database ;   // Database name.
    var $_port ;   // Database Port.
    var $_dbh = null;

    public function __construct($connection ="default")
    {

        if($connection =="peter")
        {
            $this->_host = "db-mysql.zenit";
            $this->_db_user = "uli705_173a20";
            $this->_port = "3306";
            $this->_db_password = "csHE3669";
            $this->_database = "uli705_173a20";
            $this->_dbh = null;

        }else if($connection =="luke") {
            $this->_host = "db-mysql.zenit";
            $this->_db_user = "uli705_173a29";
            $this->_port = "3306";
            $this->_db_password = "crtw9356";
            $this->_database = "li705_173a29";
            $this->_dbh = null;

        }else if ($connection =="peter-public")
        {
            $this->_host = "50.62.177.37";
            $this->_db_user = "senecauli";
            $this->_port = "3306";
            $this->_db_password = "P@ssw0rd";
            $this->_database = "smarttech";
            $this->_dbh = null;
        }else //default
        {
            $this->_host = "db-mysql.zenit";
            $this->_db_user = "uli705_173a20";
            $this->_port = "3306";
            $this->_db_password = "csHE3669";
            $this->_database = "uli705_173a20";
            $this->_dbh = null;
        }

    }

    //This method is used to open a database connection
    public function OpenConnection()
    {

        // Connect to database server.
        $con = mysqli_connect($this->_host, $this->_db_user, $this->_db_password, $this->_database);


        // Check  if there are any connection errors
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {


            //setting the connection pointer
            $this->_dbh = $con;

        }
        return $this->_dbh;
    }



    public function Select_Query($query)
    {

        //This is a generic method that is used to execute select queries and return the results.
        $rows = null;
        $data =mysqli_query($this->_dbh,$query);

        //check if there is a  data within the resultset.
        if ($data) {

              //declare array to store results
             $results = array();

             //loop through resultset in order to store records in associative array.
            while ($row = mysqli_fetch_array($data)){

                //instaniate array object which will be used to stored record set.
                $result = new QueryResult();

                //assignment the returned rows to array using associative array.
                foreach ($row as $k=>$v){
                    $result->$k = $v;
                }

                //update the arrary object with the resultset.
                $results[] = $result;


        }
        return $results;

    }else //if thera are no results, then return null.
        {
            return null;
        }
    }

    /* This function is used to execute Insert and update and delete query
    and also returns the rows affected by the operation if any.
    */
    public function ExecuteUpdateInsertDelete($query)
    {
        $rows = null;

        //store execution results.
        $results = mysqli_query( $this->_dbh,$query);

        //there are results return the number of rows affected.
        if ($results) {
            //get rows affected
           return  mysqli_affected_rows($this->_dbh);
        }

        //if there are no results it returns null.
        return null;
    }

}
