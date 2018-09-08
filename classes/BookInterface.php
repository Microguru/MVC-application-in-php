<?php
/**
 * Created by PhpStorm.
 * User: manish
 * Date: 12/8/18
 * Time: 8:17 PM
 */
interface BookInterface
{
    public function readAll();
    public function readOne();
    public function create();
    public function update();
    public function delete();


}