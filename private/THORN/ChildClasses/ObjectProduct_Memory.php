<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 20/11/2018
 * Time: 13:06
 */

class ObjectProduct_Memory
{
    public $productProperties_Memory = [
        'mem_size' => null,
        'mem_denominator' => null,
        'mem_type' => null,
        'mem_connection' => null,
        'mem_speed' => null,
        'mem_oc_speed' => null,
        'mem_pin' => null,
        'mem_profile' => null,
    ];

    public function __construct()
    {
        echo "CREATED MEMORY<br>";
    }

    public function retrieveID()
    {
        echo "ID IS CAKE<br>";
        // return new self($cake);
    }
}
