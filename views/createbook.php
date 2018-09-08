<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 12/8/18
 * Time: 9:25 PM
 */?>

<?php include_once "header.html";?>
<?php $book=index::test();





?>


<?php
if($_POST['submit']){
    $book->book_id = $_POST['book_id'];
    $book->type_id = $_POST['type_id'];
    $book->name = $_POST['name'];
    $book->isbn = $_POST['isbn'];
    $book->publisher=$_POST['publisher'];
    $book->author=$_POST['author'];
    $book->price=$_POST['price'];
    if($book->create()){
        echo "<div class='alert alert-success'>Book was created.</div>";
        echo "<div class='right-button-margin'>";
        echo "<a href='index.php' class='btn btn-default pull-right'>Read Book</a>";
        echo "</div>";
    }
    else
    {
        echo "<div class='alert alert-danger'>Unable to create book.</div>";
    }
}
?>
    <form action="<?php echo"create_book.php";?>" method="post">

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>book_id</td>
                <td><input type='text' name='book_id' class='form-control' /></td>
            </tr>

            <tr>
                <td>name</td>
                <td><input type='text' name='name' class='form-control' /></td>
            </tr>

            <tr>
                <td>isbn</td>
                <td><input name='isbn' class='form-control'></input></td>
            </tr>

            <tr>
                <td>Type</td>
                <td>

                    <?php

                    $stmt = $book->read();

                    echo "<select class='form-control' name='type_id'>";
                    echo "<option>Select category...</option>";

                    while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);
                        echo "<option value='{$type_id}'>{$type}</option>";
                    }

                    echo "</select>";
                    ?>
                </td>
            </tr>


            <tr>
                <td>author</td>
                <td><input name='author' class='form-control'></input></td>
            </tr>
            <tr>
                <td>publisher</td>
                <td><input name='publisher' class='form-control'></input></td>
            </tr>
            <tr>
                <td>price</td>
                <td><input name='price' class='form-control'></input></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button name="submit" value="submit" type="submit" class="btn btn-primary">Create</button>
                </td>
            </tr>

        </table>
    </form>


<?="</body>"?>
<?="</html>"?>
