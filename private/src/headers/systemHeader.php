<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 10:44
 */
error_reporting(E_ALL); ini_set('display_errors', '1');


/* CLASSES: Requires for DataSource page loading */
require_once __DIR__ . "/../../dataSource/PdoSingleton.php";

// Page Build Classes
require_once  __DIR__ . "/htmlPageHeader.php";

// Page Content Classes
require_once  __DIR__ . "/contentHeader.php";

// Model Classes
require_once  __DIR__ . "/ProductModelsHeader.php";

// Utility Detangle
require_once  __DIR__ . "/utilityHeader.php";
