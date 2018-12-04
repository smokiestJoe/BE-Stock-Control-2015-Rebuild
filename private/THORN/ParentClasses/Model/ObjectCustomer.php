<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:12
 */

class ObjectCustomer extends AbstractObject
{
    public static function validateModel($tableName, $columns)
    {
        // TODO: Implement validateModel() method.
    }

    public function __construct()
    {
        echo "CREATING CUSTOMER OBJECT<br>";
    }
}