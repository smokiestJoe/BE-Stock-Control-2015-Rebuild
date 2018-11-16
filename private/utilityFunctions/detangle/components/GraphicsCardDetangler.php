<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 15/11/2018
 * Time: 09:51
 */

class GraphicsCardDetangler extends DetanglerProductAbstract
{
    /**
     * @var
     */
    private $color;

    /**
     * @var
     */
    private $memSize;

    /**
     * @var
     */
    private $memType;

    /**
     * @var
     */
    private $memClock;

    /**
     * @var
     */
    private $ocClock;

    /**
     * @var
     */
    private $lowProfile;

    /**
     * GraphicsCardDetangler constructor.
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
        $cut = strpos ($this->prefix, 'Graphics Card');
        $this->productName = substr($this->prefix, 0, $cut);

        echo "<br>THE PRODUCT NAME IS $this->productName<br>";
    }

    /**
     * @return mixed|void
     */
    protected function getSpecs()
    {
        $cut = strpos ($this->prefix, 'LP');

        if ($cut == '') {

            $this->lowProfile = 0;


        } else {

            $this->lowProfile = 1;

        }

        $specs = explode('-', $this->suffix);

        $this->color = "undefined";
        $this->memSize = $specs[0];
        $this->memType = $specs[1];
        $this->memClock = $specs[2];

        if (isset($specs[3]) && $specs[3] != "Low Profile") {

            $this->ocClock = $specs[3];

        } else {

            $this->ocClock = "undefined";
        }
    }

    /**
     * @return mixed|void
     */
    protected function updateTable()
    {
        $sql = "UPDATE $this->category SET name=?, color=?, memory_size=?, memory_type=?, clock_speed=?, oc_clock_speed=?, low_profile=? WHERE model_number=?";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$this->productName, $this->color, $this->memSize, $this->memType, $this->memClock, $this->ocClock, $this->lowProfile, $this->modelNumber]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }
}
