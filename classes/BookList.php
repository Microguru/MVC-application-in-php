<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 12/8/18
 * Time: 8:24 PM
 */

class BookList extends Database implements BookListInterface
{

    private $table_name = "book_list";
    private $table_namee="book_type";
    public $book_id;
    public $type_id;
    public $name;
    public $price;
    public $publisher;
    public $author;
    public $isbn;
    //public $type_id;
    public $type;
    public function __construct(){
        parent::getConnection();
    }

  public function create ()
  {
      // TODO: Implement create() method.
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
  public function delete ()
  {
      // TODO: Implement delete() method.
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
  public function read ()
  {
      // TODO: Implement read() method.

      $query = "SELECT  type_id, type FROM " . $this->table_namee ." ". "ORDER BY type_id";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
      return $stmt;

  }
  public function readAll ()
  {
      // TODO: Implement readAll() method.

      $query = "SELECT
               book_id,type_id,name,isbn,author,publisher,price
            FROM ". " $this->table_name ";


      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
//        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $stmt;
  }
  public function readName ()
  {
      // TODO: Implement readName() method.

      $query = "SELECT type FROM " . $this->table_namee . " WHERE type_id = ? limit 0,1";

      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(1, $this->type_id);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->type = $row['type'];

  }
  public function readOne ()
  {
      // TODO: Implement readOne() method.
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
  public function update ()
  {
      // TODO: Implement update() method.


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
      $this->price=htmlspecialchars(strip_tags($this->price));
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