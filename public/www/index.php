<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 09:57
 */

require_once __DIR__ . "/../../private/src/headers/systemHeader.php" ;

$htmlPage = new HtmlPageRenderer();

$htmlPage->renderHtmlPage("index");