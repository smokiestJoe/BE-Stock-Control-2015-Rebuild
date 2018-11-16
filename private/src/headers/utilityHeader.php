<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:47
 */


require_once __DIR__ . "/../../utilityFunctions/StandardiseCompany.php";
require_once __DIR__ . "/../../utilityFunctions/ImageReassigner.php";


// DETANGLERS:
require_once __DIR__ . "/../../utilityFunctions/detangle/Detangler.php";
require_once __DIR__ . "/../../utilityFunctions/detangle/DetanglerProductAbstract.php";

require_once __DIR__ . "/../../utilityFunctions/detangle/components/MemoryDetangler.php";
require_once __DIR__ . "/../../utilityFunctions/detangle/components/CaseFanDetangler.php";
require_once __DIR__ . "/../../utilityFunctions/detangle/components/GraphicsCardDetangler.php";
require_once __DIR__ . "/../../utilityFunctions/detangle/components/MotherboardDetangler.php";