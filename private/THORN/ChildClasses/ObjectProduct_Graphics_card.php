<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 28/11/2018
 * Time: 16:48
 */

class ObjectProduct_Graphics_card extends ObjectProduct
{
    public function __construct($arrData, $arrColumns)
    {
        $this->sqlProductKeys = $arrData;

        $this->sqlProductValues = $arrColumns;

        $this->productProperties_Generic['category'] = 'components';

        echo "CREATED GRAPHICS CARD<br>";
    }
}