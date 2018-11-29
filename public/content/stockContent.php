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
    $product = RepositoryFactory::build('product', 'memory')->read()->findByAllProductType();

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




//
   // $product->sayHello();
//
//
// //  $customer = RepositoryFactory::build('customer')->read();
//
// //   $order = RepositoryFactory::build('order')->read();
//
//
//    // OBJECT
//  //  $product = RepositoryFactory::build('product', 'memory');
//
//
//// MAPPER
//// $productMapper = RepositoryFactory::build('product', 'memory');
//
////  $orderMapper = RepositoryFactory::build('order');
//
//    // $customerMapper = RepositoryFactory::build('customer');
//
//
//     //   $order = RepositoryFactory::build('order');
//
//
//
//
//
//        // SHOW ME A MEMORY BY MODEL NUMBER
//
//        // SHOW ME ALL MEMORY
//
//        // SHOW ME ONLY DDR4 MEMORY
//
//        // SHOW ME ONLY DOMINATOR PLATINUM.



}
