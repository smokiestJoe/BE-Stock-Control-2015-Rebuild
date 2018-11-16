<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:03
 */

function utilitiesContent()
{
    $pdoConnection = PdoSingleton::Instance();

    if (! $pdoConnection) {
        echo "There was an error connecting - Process halted.<br>";
    }

    /* Note the category passed in should match the spelling in the table "stocked_products" */

    // Memory
    #new Detangler($pdoConnection, 'Memory');

    // Case Fan
    #new Detangler($pdoConnection, 'Case Fan');

    // Graphics Card
    #new Detangler($pdoConnection, 'Graphics Card');

    // Motherboard
    // -- new Detangler($pdoConnection, 'Motherboard');

}
