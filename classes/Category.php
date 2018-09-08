<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 12/8/18
 * Time: 8:08 PM
 */

include_once "Database.php";
class Category extends Database {


    private $conn;
    private $table_name = "book_type";


    public $type_id;
    public $type;

    public function __construct(){
        parent::getConnection();
    }

    function read(){
        //select all data
        $query = "SELECT  type_id, type FROM " . $this->table_name ." ". "ORDER BY type_id";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }



    function readName(){

        $query = "SELECT type FROM " . $this->table_name . " WHERE type_id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->type_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->type = $row['type'];
    }
}
