<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 13/8/18
 * Time: 11:31 AM
 */


$stmt=index::test();

$id = isset($_GET['book_id']) ? $_GET['book_id'] : die('ERROR: missing ID.');
include_once "header.html";

?>
<div class='right-button-margin'>
<a href='index.php' class='btn btn-primary pull-right'>
<span class='glyphicon glyphicon-list'></span> Read Book</a></div>
<?php
$id = isset($_GET['book_id']) ? $_GET['book_id'] : die('ERROR: missing ID.');

$stmt->book_id=$id;
$stmt->readOne();
$stmt->delete();

?>
<?php

if($stmt->delete()){
echo "Object was deleted.";
}


else{
echo "Unable to delete object.";
}




if($_POST){


$stmt->book_id = $_GET['book_id'];
echo $_GET['book_id'];


echo "<br/ >";
if($stmt->idExit())
{

}
else
{

echo "redirect to home page";

sleep(5);
header("Location: http://localhost/book1/index.php");
die;
}




if($stmt->delete()){
echo "book was deleted.";
}

// if unable to delete the product
else{
echo "Unable to delete object.";
}
}

echo "<table class='table table-hover table-responsive table-bordered'>";

    echo "<tr>";
        echo "<td>Book_id</td>";
        echo "<td>{$stmt->book_id}</td>";
        echo "</tr>";

    echo "<tr>";
        echo "<td>Type_id</td>";
        echo "<td>{$stmt->type_id}</td>";
        echo "</tr>";

    echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>{$stmt->name}</td>";
        echo "</tr>";


    echo "<tr>";
        echo "<td>isbn</td>";
        echo "<td>{$stmt->isbn}</td>";
        echo "</tr>";



    echo "<tr>";
        echo "<td>Publisher</td>";
        echo "<td>{$stmt->publisher}</td>";
        echo "</tr>";

    echo "<tr>";
        echo "<td>Author</td>";
        echo "<td>{$stmt->author}</td>";
        echo "</tr>";
    //var_dump($stmt->price);

    echo "<tr>";
        echo "<td>price</td>";

        echo "<td>{$stmt->price}</td>";
        echo "</tr>";


    echo "</table>";

?>