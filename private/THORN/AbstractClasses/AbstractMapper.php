<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 23/11/2018
 * Time: 14:18
 */

abstract class AbstractMapper
{
    protected $object;

    protected $sqlString = '';

    protected $arguments = '';

    abstract function create();

    abstract function read();

    abstract function update();

    abstract function delete();
}