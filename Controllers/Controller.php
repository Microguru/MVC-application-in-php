<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 10/8/18
 * Time: 3:18 PM
 */
class Controller extends BookList{
    public static function CreateView($viewName){

        //echo "View Create";
        require_once("views/$viewName.php");
    }


}