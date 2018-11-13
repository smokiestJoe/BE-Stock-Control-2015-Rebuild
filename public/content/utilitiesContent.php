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

    if ($pdoConnection) {
        echo "Connected";
    }
}