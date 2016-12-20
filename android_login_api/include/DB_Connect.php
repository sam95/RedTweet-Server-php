<?php
class DB_Connect {

    // constructor
    function __construct() {
        
    }

    // destructor
    function __destruct() {
        // $this->close();
    }

    // Connecting to database
    public function connect() {
        require_once 'include/Config.php';
        // connecting to mysql
<<<<<<< HEAD
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysqli_error());
        // selecting database
        mysqli_select_db($con, DB_DATABASE) or die(mysqli_error($con));
=======
        $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
        // selecting database
        mysql_select_db(DB_DATABASE) or die(mysql_error());
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9

        // return database handler
        return $con;
    }

    // Closing database connection
    public function close() {
<<<<<<< HEAD
        mysqli_close();
=======
        mysql_close();
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
    }

}

?>
