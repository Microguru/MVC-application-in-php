
<?php
class ReadOne extends Controller
{

public function read()
{
$book = new BookList();
return $book;
}
}


