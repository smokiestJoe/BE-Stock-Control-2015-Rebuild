<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:47
 */

class MemoryDetangler extends DetanglerProductAbstract
{
    /**
     * @var
     */
    private $color;

    /**
     * @var
     */
    private $size;

    /**
     * @var
     */
    private $denominator;

    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $connection;

    /**
     * @var
     */
    private $speed;

    /**
     * @var
     */
    private $ocSpeed;

    /**
     * @var
     */
    private $pin;

    /**
     * @var
     */
    private $lowProfile;

    /**
     * MemoryDetangler constructor.
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
        $cut = strpos($this->nonRefinedModelName , '(');
        $prefix  = substr($this->nonRefinedModelName, 0, $cut);
        $productName  = preg_replace('!\d+!', '', $prefix);
        $this->productName = trim(preg_replace('/GB/', '', $productName));
    }

    /**
     * @return mixed|void
     */
    protected function getSpecs()
    {
        // denominator
        $cut = strpos($this->prefix, '(');
        $cut2 = strpos($this->prefix , ')');
        $length = $cut2 - $cut - 3;

        $list = explode("-", $this->suffix);

        // memory Specs:
        $this->denominator = substr($this->prefix, $cut + 1, $length);
        $this->size = $list[0];
        $this->type = $list[2];
        $this->connection = $list[1];
        $this->speed = $list[3];
        $this->pin = $list[4];
        $this->ocSpeed = "undefined";

        if (isset($list[5])) {

            $this->color = $list[5];

        } else {

            $this->color = "";
        }

        if (strpos($this->prefix, 'Low Profile') !== false) {

            $this->lowProfile = 1;

        } else {

            $this->lowProfile = 0;
        }
    }

    /**
     * @return mixed|void
     */
    protected function updateTable()
    {
        $sql = "UPDATE $this->category SET name=?, color=?, mem_size=?, mem_denominator=?, mem_type=?, mem_connection=?, mem_speed=?, mem_oc_speed=?, mem_pin=?, mem_profile=? WHERE model_number=?";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$this->productName, $this->color, $this->size, $this->denominator, $this->type, $this->connection, $this->speed, $this->ocSpeed, $this->pin, $this->lowProfile, $this->modelNumber]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }

}
