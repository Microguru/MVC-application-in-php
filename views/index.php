
<?php $stmt=index::test();
$result=$stmt->readAll();?>

<?php include_once "header.html";?>
<div class='right-button-margin'>
    <a href='create_book' class='btn btn-default pull-right'>Create BOOK</a>
</div>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>book_id</th>
        <th>type_id</th>
        <th>name</th>
        <th>isbn</th>
        <th>publisher</th>
        <th>price</th>
        <th>author</th>
        <th>type</th>
    </tr>

    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {?>

        <?php extract($row);?>
           <?="<tr>"?>

            <?= "<td id='ht'>{$book_id} </td>"; ?>
            <?= "<td>{$type_id}</td>"; ?>

            <?= "<td>{$name}</td>"; ?>

            <?="<td>{$isbn}</td>";?>
            <?="<td>{$author}</td>";?>
            <?="<td>{$price}</td>";?>
            <?="<td>{$publisher}</td>";?>

            <?php
            echo "<td>";
                $stmt->type_id = $type_id;
                $stmt->readName();
                echo $stmt->type;
                echo "</td>"; ?>
            <?="<td>"?>


        <?="<a href='read_one?book_id={$book_id}' class='btn btn-info left-margin'>";?>
        <?="<span class='glyphicon glyphicon-list'></span> Read";?>
        <?="</a>";?>


        <?="<a href='update_book?book_id={$book_id}' class='btn btn-info left-margin'>";?>
        <?="<span class='glyphicon glyphicon-edit'></span> Edit";?>
        <?="</a>";?>


        <?="<a href='delete_book?book_id={$book_id}' class='btn btn-danger delete-object'>";?>
        <?="<span class='glyphicon glyphicon-remove'></span> Delete";?>
        <?="</a>";?>
        <?= "</td>  </tr>";?>



    <?php }?>
</table>



    </body>
    </html>