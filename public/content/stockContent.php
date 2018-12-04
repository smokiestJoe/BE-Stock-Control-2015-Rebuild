<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 16/11/2018
 * Time: 15:56
 */

function stockContent()
{
    // REPO
    $products = RepositoryFactory::build('product', 'memory')->read()->findByAllProductType();

//
//    $product = RepositoryFactory::build('product', 'memory')->read()->findByProductModelNumber('CMK16GX4M4A2400C14R');
//
//
//    $product = RepositoryFactory::build('product', 'memory')->read()->findByProductName('dominator');
//
//
//    $product = RepositoryFactory::build('product', 'memory')->read()->findByProductCompany('corsair');
//
//
//    $product = RepositoryFactory::build('product', 'memory')->read()->findBySupplierName('Exertis');
//
//
//    $product = RepositoryFactory::build('product', 'memory')->read()->findBySupplierNumber('COR-VS1GSDS333');

    foreach ($products as $product) {
        echo $product->modelTest();
    }


//var_dump($products);

}
