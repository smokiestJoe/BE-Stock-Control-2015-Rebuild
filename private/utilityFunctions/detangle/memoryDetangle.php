<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:47
 */

function detangleComponentMemory($pdoConnection)
{
    $sqlStatement = $pdoConnection->pdoConnection->prepare('SELECT * FROM stocked_products WHERE type = ?');

    $sqlStatement->execute(['Memory']);

    $sqlStatement->fetch();

    foreach ($sqlStatement as $row)
    {
        // 1: STANDARDISE MANUFACTURER
        $company = standardiseCompany($row['manufacturer']);

        // 2: STANDARDISE CATEGORY
        $category = toLowercase($row['type']);

        // 3: RefineImagePath
        $imageLink = new ImageReassigner(toLowercase($company), $category, $row['model_number'], $row['image_link']);


        // REFINE STRING 1
        $buffer = substr($row['model_name'],4);
        $cut = strpos($buffer, ' ');
        $buffer = substr($buffer, $cut);
        $cut2 = strpos($buffer, '(');

        // EXTRACT THE PRODUCT NAME
        $prefix  = substr($buffer, 0, $cut2);
        $productName  = preg_replace('!\d+!', '', $prefix);
        $productName = trim(preg_replace('/GB/', '', $productName));

        // REFINE STRING 2
        $suffix = substr($buffer, $cut2);
        $cut3 = strpos($suffix, ')');
        $suffix2 = trim(substr($suffix, $cut3 + 2));

        // EXTRACT THE DENOMINATOR
        $denominator = substr($suffix, 1, $cut3 - 1);

        // EXTRACT THE REST
        $list = explode("-", $suffix2);

        $size = $list[1];
        $type = $list[3];
        $connection = $list[2];
        $speed = $list[4];
        $pin = $list[5];
        $EAN = "undefined";

        // ASSIGN ROWS TO VARIABLES
        $description = "undefined";
        $modelNumber = $row['model_number'];
        $image = $row['image_link']; // THIS NEEDS TO BE RETURNED CORRECTLY!
        $ocSpeed = "";

        if (isset($list[6])) {
            $color = $list[6];
        } else {
            $color = "";
        }

        $lp = $list[0];

        if (strpos($lp, 'Low Profile') !== false) {
            $bit = 1;
        } else {
            $bit = 0;
        }

        echo $modelNumber . "::" . $company . "::" .$productName. "::" . $image . "::" . $category . "::" . $description . "::" . $bit . "::" . $denominator . "::" . $size . "::" . $type . "::" . $connection . "::" . $speed . "::" . $pin . "::" . $color . "<br>";

        $sql = "INSERT INTO memory (model_number, company, name, image_folder, description, category, color, EAN, mem_size, mem_denominator, mem_type, mem_connection, mem_speed, mem_oc_speed, mem_pin, mem_profile) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $sqlStatement = $pdoConnection->pdoConnection->prepare($sql);
        
        $sqlStatement->execute([$modelNumber, $company, $productName, $image, $description, $category, $color, $EAN, $size, $denominator, $type, $connection, $speed, $ocSpeed, $pin, $bit ]);

        echo "\nPDOStatement::errorInfo():\n";
        $arr = $sqlStatement->errorInfo();
        print_r($arr);
    }
}

/**
 *
ID int NOT NULL AUTO_INCREMENT,
# model_number varchar(255) NOT NULL,
# company varchar(255) NOT NULL,
# name varchar(255) NOT NULL,
# image_folder varchar(255) NOT NULL,
description varchar(255) NOT NULL,
category varchar(255) NOT NULL,
# color varchar(20),
EAN varchar(255),
--
# mem_size varchar(10) NOT NULL,
# mem_denominator varchar(20) NOT NULL,
# mem_type varchar(20) NOT NULL,
# mem_connection varchar(20) NOT NULL,
# mem_speed varchar(20) NOT NULL,
mem_oc_speead varchar(20),
# mem_pin varchar(20) NOT NULL,
# mem_profile bit NOT NULL,
 *
 *
 *
 *
 *
 */