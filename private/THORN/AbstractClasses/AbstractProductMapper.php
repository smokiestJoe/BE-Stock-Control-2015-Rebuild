<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 23/11/2018
 * Time: 14:18
 */

abstract class AbstractProductMapper
{
    protected $object;

    protected $arguments = '';

    abstract function findByAllProductType();

    abstract function findByProductModelNumber($modelNumber);

    abstract function findByProductName($productName);

    abstract function findByProductCompany($companyName);

    abstract function findBySupplierName($supplierName);

    abstract function findBySupplierNumber($supplierNumber);
}