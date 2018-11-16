<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 16/11/2018
 * Time: 09:35
 */

abstract class DetanglerProductAbstract
{
    /**
     * @var string
     */
    protected $nonRefinedModelName = "";

    /**
     * @var string
     */
    public $modelNumber = "";

    /**
     * @var string
     */
    protected $pdo = "";

    /**
     * @var string
     */
    protected $category = "";

    /**
     * @var
     */
    protected $prefix = "";

    /**
     * @var
     */
    protected $suffix = "";

    /**
     * @var string
     */
    protected $productName = "";

    /**
     * @return mixed
     */
    abstract protected function detangleProduct();

    /**
     * @return mixed
     */
    abstract protected function getName();

    /**
     * @return mixed
     */
    abstract protected function getSpecs();

    /**
     * @return mixed
     */
    abstract protected function updateTable();

    /**
     *
     */
    protected function setupProductDetangler()
    {
        echo "<br><br>RAW STRING IS $this->nonRefinedModelName<br>";

        $cut = strpos ($this->nonRefinedModelName, '-');

        $this->setPrefix($cut);

        $this->setSuffix($cut);
    }

    /**
     * @param $cut
     */
    protected function setPrefix($cut)
    {
        $this->prefix = substr($this->nonRefinedModelName, 0, $cut);

        echo "<br>THE PREFIX IS: $this->prefix<br>";
    }

    /**
     * @param $cut
     */
    protected function setSuffix($cut)
    {
        $this->suffix = substr($this->nonRefinedModelName, $cut + 1);

        echo "<br>THE SUFFIX IS: $this->suffix<br><br>";
    }
}