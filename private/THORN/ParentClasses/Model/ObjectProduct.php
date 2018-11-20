<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:12
 */

class ObjectProduct
{
    public $productProperties_Generic = [
        // stock_control
        'model_number' => null,
        'price_ex_vat' => null,
        'price_inc_vat' => null,
        'margin_percent' => null,
        'postage' => null,
        'sale_price' => null,
        'weight' => null,
        'EAN' => null,
        'warranty' => null,
        'supplier' => null,
        'supplier_number' => null,
        // categories
        'category' => null,
        //
        'category_type' => null,
        // generic
        'company' => null,
        'name' => null,
        'image_folder' => null,
        'color' => null,
        'ID' => null,
    ];

    private $productType;

    public function __construct($productType)
    {
        echo "CREATING PRODUCT OBJECT<br>";
    }

    public function retrieveID()
    {
        echo "ID IS CAKE<br>";
       // return new self($cake);
    }
}




/*
 *
 *
 *     mem_size varchar(10) NOT NULL,
    mem_denominator varchar(20) NOT NULL,
    mem_type varchar(20) NOT NULL,
    mem_connection varchar(20) NOT NULL,
    mem_speed varchar(20) NOT NULL,
    mem_oc_speed varchar(20),
    mem_pin varchar(20) NOT NULL,
    mem_profile boolean NOT NULL,
 *
 *
 */

