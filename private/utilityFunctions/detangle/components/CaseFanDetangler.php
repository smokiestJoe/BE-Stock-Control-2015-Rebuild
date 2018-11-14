<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 14/11/2018
 * Time: 13:28
 */

class CaseFanDetangler
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
        echo $this->nonRefinedModelName ."<br>";

        $t = strpos($this->nonRefinedModelName, 'Case Fan');

        $prefix = substr($this->nonRefinedModelName, 0, $t);
        $productName = trim($prefix);

        $suffix = substr($this->nonRefinedModelName, $t);
        $suffix = substr($suffix, 9);

        echo "SUFFIX IS: $suffix-<br>";

        $rawSpecification = explode('-', $suffix);

        $fanSize = $rawSpecification[0];

        if (strpos($rawSpecification[1], "Low Noise") !== false) {

            $lowNoise = 1;

        } else {

            $lowNoise = 0;
        }

        if (strpos($rawSpecification[1], "High Pressure") !== false
            || strpos($rawSpecification[2], "High Pressure") !== false) {

            $HighPressure = 1;

        } else {

            $HighPressure  = 0;
        }

        $speed = preg_replace('/\D/', '', $rawSpecification[1]);

        if ($speed == '') {
            $speed = preg_replace('/\D/', '', $rawSpecification[2]);
        }

        if (isset($rawSpecification[3])) {
            // IF IT IS SET, THEN IT IS PACK SIZE
            $pack = $rawSpecification[3];

            $spec = explode(' ', $rawSpecification[2]);

            if (strpos($rawSpecification[2], "LED") !== false) {
                $color = $spec[0];
                $LED = 1;

            } else {

                $color = "undefined";
                $LED = 0;
            }

        } else {

            $pack = $rawSpecification[2];
            $color = "undefined";
            $LED = 0;
        }

        $pack = explode(' ', $pack);
        $pack = $pack[0];


        echo "PART 3 IS: $pack<br>";

        $sql = "UPDATE $this->category SET name=?, fan_size=?, low_noise=?, high_pressure=?, speed=?, pack_size=?, color=?, LED=? WHERE model_number=?";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$productName, $fanSize, $lowNoise, $HighPressure, $speed, $pack, $color, $LED, $this->modelNumber]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }
}
