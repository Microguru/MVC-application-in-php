<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 13/8/18
 * Time: 10:57 AM
 */

$id = isset($_GET['book_id']) ? $_GET['book_id'] : die('ERROR: missing ID.');
include_once "header.html";

$stmt=index::test();
$stmt->book_id=$id;
$stmt->readOne();
echo $id;
?>
    <!-- 'update product' form will be here -->
<?php    echo "<div class='right-button-margin'>";
echo "<a href='index' class='btn btn-default pull-right'>Read Books</a>";
echo "</div>";
?>
<?php
echo "<br/ >";
if($stmt->idExit())
{

}
else
{

    echo "redirect to home page";

    sleep(10);
    header("Location: http://localhost/book1/index.php");
    die;
}
?>




<?php
// if the form was submitted
if($_POST){

    // set product property values
    $stmt->type_id = $_POST['type_id'];
    $stmt->name = $_POST['name'];
    $stmt->isbn = $_POST['isbn'];
    $stmt->publisher = $_POST['publisher'];
    $stmt->author = $_POST['author'];
    $stmt->price = $_POST['price'];

    if($stmt->update()){
        var_dump($stmt->update());
        echo "<div class='alert alert-success alert-dismissable'>";
        echo "Product was updated.";
        echo "</div>";
    }

    // if unable to update the product, tell the user
    else{

        echo "<div class='alert alert-danger alert-dismissable'>";
        echo "Unable to update product.";
        echo "</div>";
    }


}
?>

    <form action="<?php echo "update_book.php"."?book_id={$id}"?>" method="post">
        <table class='table table-hover table-responsive table-bordered'>


            <tr>
                <td>book_id</td>
                <td><input type='text' name='book_id' value="<?=$stmt->book_id?>" class='form-control' disabled /></td>
            </tr>

            <tr>
                <td>name</td>
                <td><input type='text' name='name' value="<?=$stmt->name?>" class='form-control' /></td>
            </tr>

            <tr>
                <td>isbn</td>
                <td><input name='isbn'  value="<?=$stmt->isbn?>" class='form-control'></td>
            </tr>

            <tr>




                <td>Category</td>
                <td>
                    <?php

                    $stm = $stmt->read();

                    echo "<select class='form-control' name='type_id'>";
                    echo "<option>Select category...</option>";

                    while ($row_category = $stm->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);
                        echo "<option value='{$type_id}'>{$type}</option>";
                    }

                    echo "</select>";
                    ?>

                </td>
            </tr>

            <tr>
                <td>author</td>
                <td><input name='author' value="<?=$stmt->author?>" class='form-control'></input></td>
            </tr>
            <tr>
                <td>publisher</td>
                <td><input name='publisher'  value="<?=$stmt->publisher?>" class='form-control'></input></td>
            </tr>
            <tr>
                <td>price</td>
                <td><input name='price' value="<?=$stmt->price?>" class='form-control'></input></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                </td>
            </tr>

        </table>
    </form>







</body>
</html>
