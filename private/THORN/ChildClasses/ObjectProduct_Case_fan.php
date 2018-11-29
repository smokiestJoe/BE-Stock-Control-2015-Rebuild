<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 28/11/2018
 * Time: 16:50
 */

class ObjectProduct_Case_fan extends ObjectProduct
{
    public function __construct($arrData, $arrColumns)
    {
        $this->sqlProductKeys = $arrData;

        $this->sqlProductValues = $arrColumns;

        echo "CREATED CASE FAN<br>";
    }
}