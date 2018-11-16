<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 15/11/2018
 * Time: 13:47
 */

class MotherboardDetangler extends DetanglerProductAbstract
{
    public function __construct($nonRefinedModelName, $modelNumber, $pdo, $category)
    {
        $this->nonRefinedModelName = $nonRefinedModelName;

        $this->modelNumber = $modelNumber;

        $this->pdo = $pdo;

        $this->category = $category;

        $this->detangleProduct();
    }

    protected function detangleProduct()
    {

    }

    protected function getName()
    {
        // TODO: Implement getName() method.
    }

    protected function getSpecs()
    {
        // TODO: Implement getSpecs() method.
    }

    protected function updateTable()
    {
        // TODO: Implement updateTable() method.
    }
}
