<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 12/8/18
 * Time: 9:18 PM
 */

class CreateBook extends Controller{


    function insert()
    {
        $book = new BookList();
        return $book;
    }
}