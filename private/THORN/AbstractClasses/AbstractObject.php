<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 19/11/2018
 * Time: 13:43
 */

abstract class AbstractObject
{
    abstract public static function validateModel($tableName, $columns);
}