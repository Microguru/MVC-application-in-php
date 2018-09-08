
<?php include_once "header.html";?>
<?php $id= $_GET['book_id']; ?>





<div class='right-button-margin'>
    <a href='index' class='btn btn-primary pull-right'>";
        <span class='glyphicon glyphicon-list'></span> Read Book;</a></div>


<?php $id = isset($_GET['book_id']) ? $_GET['book_id'] : die('ERROR: missing ID.');?>

<?php $stmt=index::test();

?>
<?php
$stmt->book_id = $id;
$result=$stmt->readOne();
?>

<?php
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
?>

<?php
//echo "<br/ >";
//if($stmt->idExit())
//{
//echo "match ";
//}
//else
//{
//
//echo "redirect to home page";
//
//sleep(10);
//header("Location: http://localhost/book1/index.php");
//die;
//}



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
        echo "<td>Type</td>";
        echo "<td>";

            $stmt->readName();
            echo $stmt->type;
            echo "</td>";
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
    echo "<tr>";
        echo "<td>price</td>";

        echo "<td>{$stmt->price}</td>";
        echo "</tr>";


    echo "</table>";


?>
</body>
</html>
