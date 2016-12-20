<?php

class DB_Functions {

<<<<<<< HEAD
    var $db;
	public $con;
=======
    private $db;

>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
<<<<<<< HEAD
        $this->con = $this->db->connect();
=======
        $this->db->connect();
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password, $phone, $location, $bg_group) {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
<<<<<<< HEAD
        $result = mysqli_query($this->con,"INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at, phone, b_group, location) VALUES('$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW(),'$phone','$bg_group','$location')");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysqli_insert_id($this->con); // last inserted id
            $result = mysqli_query($this->con,"SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysqli_fetch_array($result);
=======
        $result = mysql_query("INSERT INTO users(unique_id, name, email, encrypted_password, salt, created_at, phone, b_group, location) VALUES('$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW(),'$phone','$bg_group','$location')");
        // check for successful store
        if ($result) {
            // get user details 
            $uid = mysql_insert_id(); // last inserted id
            $result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            return mysql_fetch_array($result);
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {
<<<<<<< HEAD
        $result = mysqli_query($this->con,"SELECT * FROM users WHERE email = '$email'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysqli_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysqli_fetch_array($result);
=======
        $result = mysql_query("SELECT * FROM users WHERE email = '$email'") or die(mysql_error());
        // check for result 
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            $result = mysql_fetch_array($result);
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
            $salt = $result['salt'];
            $encrypted_password = $result['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                return $result;
            }
        } else {
            // user not found
            return false;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
<<<<<<< HEAD
        $result = mysqli_query($this->con,"SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysqli_num_rows($result);
=======
        $result = mysql_query("SELECT email from users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
        if ($no_of_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
