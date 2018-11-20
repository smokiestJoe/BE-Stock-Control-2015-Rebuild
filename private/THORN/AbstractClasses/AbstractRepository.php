<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 13:49
 */

abstract class AbstractRepository
{
    protected $object;

    abstract function create();

    abstract function read();

    abstract function update();

    abstract function delete();

}