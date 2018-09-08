<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 10/8/18
 * Time: 3:16 PM
 */

class Index extends Controller
{

    public function test ()
    {
        $book = new BookList();
      return $book;
        //$stmt= $book->readAll();

        //return array($stmt,$stmt1);

    }

}
