<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 10/8/18
 * Time: 4:43 PM
 */

class Database{

    private $host = "localhost";
    private $db_name = "book";
    private $username = "mike";
    private $password = "mttss";
    public $conn;


    public function getConnection(){

        $this->conn = null;

        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }


    }
}
