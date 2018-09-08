<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 8/8/18
 * Time: 10:44 PM
 */

include_once "Database.php";
class book extends Database {



    private $table_name = "book_list";


    public $book_id;
    public $type_id;
    public $name;
    public $price;
    public $publisher;
    public $author;
    public $isbn;

    public function __construct(){
        parent::getConnection();


    }


    function create(){

        $query = "INSERT INTO  " . $this->table_name ." ". " SET
                    book_id=:book_id, type_id=:type_id, name=:name, isbn=:isbn, publisher=:publisher,author=:author,price=:price";
        $stmt = $this->conn->prepare($query);


        $this->book_id=htmlspecialchars(strip_tags($this->book_id));
        $this->type_id=htmlspecialchars(strip_tags($this->type_id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->isbn=htmlspecialchars(strip_tags($this->isbn));
        $this->publisher=htmlspecialchars(strip_tags($this->publisher));
        $this->author=htmlspecialchars(strip_tags($this->author));
        $this->price=htmlspecialchars(strip_tags($this->price));



        $stmt->bindParam(":book_id", $this->book_id);
        $stmt->bindParam(":type_id", $this->type_id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":publisher", $this->publisher);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":price",$this->price);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
    function readAll(){

        $query = "SELECT
               book_id,type_id,name,isbn,author,publisher,price
            FROM ". " $this->table_name ";


        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
//        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    }
    function readOne(){

        $query = "SELECT
                book_id,type_id,name,isbn,publisher,author,price
            FROM
                " . $this->table_name . "
            WHERE
              book_id = $this->book_id";

        $stmt = $this->conn->prepare( $query );

        $stmt->execute();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->book_id = $row['book_id'];
        $this->type_id = $row['type_id'];
        $this->name = $row['name'];
        $this->isbn = $row['isbn'];
        $this->publisher=$row['publisher'];
        $this->author=$row['author'];
        $this->price=$row['price'];
    }


    function update(){

        $query = "UPDATE
                " . $this->table_name . "
            SET
                  type_id=:type_id, name=:name, isbn=:isbn, publisher=:publisher,author=:author,price=:price
            WHERE
               book_id =:book_id";



        $stmt = $this->conn->prepare($query);



        $this->type_id=htmlspecialchars(strip_tags($this->type_id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->isbn=htmlspecialchars(strip_tags($this->isbn));
        $this->publisher=htmlspecialchars(strip_tags($this->publisher));
        $this->author=htmlspecialchars(strip_tags($this->author));
        $this->price=htmlspecialchars(strip_tags($ts->price));
        $this->book_id=htmlspecialchars(strip_tags($this->book_id));



        $stmt->bindParam(":type_id", $this->type_id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":isbn", $this->isbn);
        $stmt->bindParam(":publisher", $this->publisher);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":book_id", $this->book_id);

        if($stmt->execute()){
            return true;
        }

        return false;

    }

    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE book_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->book_id);

        if($result = $stmt->execute()){
            return true;
        }
        else
        {
            return false;
        }
    }
    function idExit()
    {
        $query ="select book_id from " . $this-> table_name. " where book_id=".$this->book_id;

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
            return true;

        }
        return false;

    }

}

