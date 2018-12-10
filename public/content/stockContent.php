<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 16/11/2018
 * Time: 15:56
 */

function stockContent()
{
    ?>

    <div id="stockSidebar" class="col-md-1">

        <p>SIDEBAR</p>

        <button id="stockOptionCreateButton">CREATE</button>

        <br>

        <button id="stockOptionReadButton">READ</button>

        <br>

        <button id="stockOptionUpdateButton">UPDATE</button>

        <br>

        <button id="stockOptionDeleteButton">DELETE</button>

        <br>

    </div>

    <div id="stockContentWrapper" class="col-md-11">

        <div id="stockContent">

            <p>CONTENT</p>

        </div>

    </div>

    <?php

    // REPO
    $products = RepositoryFactory::build('product', 'memory')->read()->findByAllProductType();

//
//    $products = RepositoryFactory::build('product', 'memory')->read()->findByProductModelNumber('CMK16GX4M4A2400C14R');
//
//
//    $products = RepositoryFactory::build('product', 'memory')->read()->findByProductName('dominator');
//
//
//    $products = RepositoryFactory::build('product', 'memory')->read()->findByProductCompany('corsair');
//
//
//    $products = RepositoryFactory::build('product', 'memory')->read()->findBySupplierName('Exertis');
//
//
//    $products = RepositoryFactory::build('product', 'memory')->read()->findBySupplierNumber('COR-VS1GSDS333');

    foreach ($products as $product) {

        echo $product->modelTest();
    }


//var_dump($products);

}
