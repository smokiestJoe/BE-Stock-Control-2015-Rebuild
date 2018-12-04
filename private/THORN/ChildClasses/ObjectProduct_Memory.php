<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 20/11/2018
 * Time: 13:06
 */

class ObjectProduct_Memory extends ObjectProduct
{
    /**
     * @var array
     */
    private $productProperties_Product = [
        'mem_size' => null,
        'mem_denominator' => null,
        'mem_type' => null,
        'mem_connection' => null,
        'mem_speed' => null,
        'mem_oc_speed' => null,
        'mem_pin' => null,
        'mem_profile' => null,
    ];

    /**
     * @var array
     */
    public static $childValidationArray = [
        'mem_size', 'mem_denominator','mem_type', 'mem_connection',
        'mem_speed', 'mem_oc_speed', 'mem_pin', 'mem_profile',
    ];

    /**
     * @return array
     */
    public static function returnProductPropertiesArray()
    {
        echo "VALIDATING MEMORY<br>";

        return self::$childValidationArray;
    }

    /**
     * ObjectProduct_Memory constructor.
     */
    public function __construct($arrSqlData, $arrSqlColumns)
    {
        $this->sqlProductKeys = $arrSqlColumns;

        $this->sqlProductValues = $arrSqlData;

        $this->productProperties_Generic['category'] = 'components';

        $this->hydrateModel();

        echo "CREATED MEMORY<br>";
    }

    /**
     *
     */
    private function hydrateModel()
    {
        $this->productProperties = array_merge($this->productProperties_Product, $this->mergeParentArrays());

        foreach ($this->sqlProductKeys as $key) {

            $this->productProperties[$key] = $this->sqlProductValues[$key];
        }
    }

    /**
     *
     */
    public function modelTest()
    {
        foreach ($this->productProperties as $productKey => $productValue) {

            echo "KEY: $productKey => VALUE: $productValue<br>";
        }
    }

    /**
     * @return mixed
     */
    public function get_mem_size()
    {
        return $this->productProperties['mem_size'];
    }

    /**
     * @return mixed
     */
    public function get_mem_denominator()
    {
        return $this->productProperties['mem_denominator'];
    }

    /**
     * @return mixed
     */
    public function get_mem_type()
    {
        return $this->productProperties['mem_type'];
    }

    /**
     * @return mixed
     */
    public function get_mem_connection()
    {
        return $this->productProperties['mem_connection'];
    }

    /**
     * @return mixed
     */
    public function get_mem_speed()
    {
        return $this->productProperties['mem_speed'];
    }

    /**
     * @return mixed
     */
    public function get_mem_oc_speed()
    {
        return $this->productProperties['mem_oc_speed'];
    }

    /**
     * @return mixed
     */
    public function get_mem_pin()
    {
        return $this->productProperties['mem_pin'];
    }

    /**
     * @return mixed
     */
    public function get_mem_profile()
    {
        return $this->productProperties['mem_profile'];
    }
}
