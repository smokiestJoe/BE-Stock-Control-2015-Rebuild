<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 14/11/2018
 * Time: 13:28
 */

class CaseFanDetangler extends DetanglerProductAbstract
{
    /**
     * @var
     */
    private $fanSize;

    /**
     * @var
     */
    private $lowNoise;

    /**
     * @var
     */
    private $highPressure;

    /**
     * @var
     */
    private $speed;

    /**
     * @var
     */
    private $pack;

    /**
     * @var
     */
    private $color;

    /**
     * @var
     */
    private $LED;

    /**
     * CaseFanDetangler constructor.
     * @param $nonRefinedModelName
     * @param $modelNumber
     * @param $pdo
     * @param $category
     */
    public function __construct($nonRefinedModelName, $modelNumber, $pdo, $category)
    {
        $this->nonRefinedModelName = $nonRefinedModelName;

        $this->modelNumber = $modelNumber;

        $this->pdo = $pdo;

        $this->category = $category;

        $this->detangleProduct();
    }

    /**
     * @return mixed|void
     */
    protected function detangleProduct()
    {
        $this->setupProductDetangler();

        $this->getName();

        $this->getSpecs();

        $this->updateTable();
    }

    /**
     * @return mixed|void
     */
    protected function getName()
    {
        $cut = strpos($this->prefix, 'Case Fan');

        $prefix = substr($this->nonRefinedModelName, 0, $cut);
        $this->productName = trim($prefix);
    }

    /**
     * @return mixed|void
     */
    protected function getSpecs()
    {
        $rawSpecification = explode('-', $this->suffix);

        $this->fanSize = $rawSpecification[0];

        if (strpos($rawSpecification[1], "Low Noise") !== false) {

            $this->lowNoise = 1;

        } else {

            $this->lowNoise = 0;
        }

        if (strpos($rawSpecification[1], "High Pressure") !== false
            || strpos($rawSpecification[2], "High Pressure") !== false) {

            $this->highPressure = 1;

        } else {

            $this->highPressure  = 0;
        }

        $this->speed = preg_replace('/\D/', '', $rawSpecification[1]);

        if ($this->speed == '') {

            $this->speed = preg_replace('/\D/', '', $rawSpecification[2]);
        }

        if (isset($rawSpecification[3])) {

            $pack = $rawSpecification[3];

            $spec = explode(' ', $rawSpecification[2]);

            if (strpos($rawSpecification[2], "LED") !== false) {

                $this->color = $spec[0];

                $this->LED = 1;

            } else {

                $this->color = "undefined";

                $this->LED = 0;
            }

        } else {

            $pack = $rawSpecification[2];

            $this->color = "undefined";

            $this->LED = 0;
        }

        $pack = explode(' ', $pack);

        $this->pack = $pack[0];
    }

    /**
     * @return mixed|void
     */
    protected function updateTable()
    {
        $sql = "UPDATE $this->category SET name=?, fan_size=?, low_noise=?, high_pressure=?, speed=?, pack_size=?, color=?, LED=? WHERE model_number=?";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$this->productName, $this->fanSize, $this->lowNoise, $this->highPressure, $this->speed, $this->pack, $this->color, $this->LED, $this->modelNumber]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }
}
