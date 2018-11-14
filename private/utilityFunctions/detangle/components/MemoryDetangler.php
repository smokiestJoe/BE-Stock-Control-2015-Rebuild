<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:47
 */


class MemoryDetangler
{
    private $nonRefinedModelName = "";

    private $modelNumber = "";

    private $pdo = "";

    private $category = "";

    public function __construct($nonRefinedModelName, $modelNumber, $pdo, $category)
    {
        $this->nonRefinedModelName = $nonRefinedModelName;

        $this->modelNumber = $modelNumber;

        $this->pdo = $pdo;

        $this->category = $category;

        $this->detangleProduct();
    }

    private function detangleProduct()
    {
        $cut2 = strpos($this->nonRefinedModelName , '(');

        // EXTRACT THE PRODUCT NAME
        $prefix  = substr($this->nonRefinedModelName, 0, $cut2);
        $productName  = preg_replace('!\d+!', '', $prefix);
        $productName = trim(preg_replace('/GB/', '', $productName));

        // REFINE STRING 2
        $suffix = substr($this->nonRefinedModelName, $cut2);
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
        $ocSpeed = "undefined";

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

        $sql = "UPDATE $this->category SET name=?, color=?, mem_size=?, mem_denominator=?, mem_type=?, mem_connection=?, mem_speed=?, mem_oc_speed=?, mem_pin=?, mem_profile=? WHERE model_number=?";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$productName, $color, $size, $denominator, $type, $connection, $speed, $ocSpeed, $pin, $bit, $this->modelNumber]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }
}
