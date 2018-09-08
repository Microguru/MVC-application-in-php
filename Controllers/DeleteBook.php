<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 13/8/18
 * Time: 11:30 AM
 */

class DeleteBook extends Controller
{

    public function delete()
    {
        $book = new BookList();
        return $book;

    }
}