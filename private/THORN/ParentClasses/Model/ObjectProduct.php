<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:12
 */

class ObjectProduct
{
    /**
     * @var
     */
    protected $sqlProductKeys = [];

    protected $sqlProductValues = [];

    /**
     * @var array
     * Foreign Key - Stock -> Product
     */
    public $productProperties_Common = [
        'model_number' => null,
    ];

    /**
     * @var array
     * Stock Table Fields
     */
    public $product_properties_Stock = [
        'price_ex_vat' => null,
        'vat' => null,
        'price_inc_vat' => null,
        'margin_percent' => null,
        'postage' => null,
        'sale_price' => null,
        'weight' => null,
        'EAN' => null,
        'warranty' => null,
        'supplier' => null,
        'supplier_number' => null,
    ];

    /**
     * @var array
     * Generic Product Fields
     */
    public $productProperties_Generic = [
        // categories
        'category' => 'components',
        //
        'category_type' => null,
        // generic
        'company' => null,
        'name' => null,
        'image_folder' => null,
        'color' => null,
        'ID' => null,
    ];

    public static $parentValidationArray = [
        'model_number', 'price_ex_vat', 'vat', 'price_inc_vat','margin_percent',
        'postage', 'sale_price', 'weight', 'EAN', 'warranty', 'supplier',
        'supplier_number', 'category_type', 'company', 'name',
        'image_folder', 'color', 'ID',
    ];

    /**
     * @param $productType
     * @return mixed
     * @throws Exception
     */
    public static function buildProduct($productType)
    {
        echo "PRODUCT BEING CREATED: PRODUCT TYPE: $productType<br>";

        $productClass = "ObjectProduct_" . ucfirst($productType);

        if (class_exists($productClass)) {

            return new $productClass(isset($arrSqlData), isset($arrSqlColumns));

        } else {

            throw new Exception ("PRODUCT DOES NOT EXIST");
        }
    }


    public static function validateModel($childProduct, $columnsToBeValidated)
    {
        echo "CHILD CLASS IS: $childProduct<br>";

        $productClass = "ObjectProduct_" . ucfirst($childProduct);

        echo "$productClass<br>";

        $parentValidationArray = self::$parentValidationArray;

        $childValidationArray = $productClass::returnProductPropertiesArray();

        $validationArray = array_merge($parentValidationArray, $childValidationArray);

        $validate = array_diff($validationArray, $columnsToBeValidated);

        if ($validate) {

            echo "THERE IS A PROBLEM FORMING THE MODEL. ERROR FOUND IN: ";

            foreach ($validate as $error) {

                echo $error . "<br>";
            }

            throw new Exception("TERMINATING PROGRAM - DIED IN MODEL VALIDATION");
        }

    }

    /**
     * GETTERS
     */

    /**
     * @return mixed
     */
    public function get_model_number()
    {
        return $this->productProperties_Common['model_number'];
    }

    /**
     * @return mixed
     */
    public function get_price_ex_vat()
    {
        return $this->productProperties_Common['price_ex_vat'];
    }

    /**
     * @return mixed
     */
    public function get_vat()
    {
        return $this->productProperties_Common['vat'];
    }

    /**
     * @return mixed
     */
    public function get_price_inc_vat()
    {
        return $this->productProperties_Common['price_inc_vat'];
    }

    /**
     * @return mixed
     */
    public function get_margin_percent()
    {
        return $this->productProperties_Common['margin_percent'];
    }

    /**
     * @return mixed
     */
    public function get_postage()
    {
        return $this->productProperties_Common['postage'];
    }

    /**
     * @return mixed
     */
    public function get_sale_price()
    {
        return $this->productProperties_Common['sale_price'];
    }

    /**
     * @return mixed
     */
    public function get_weight()
    {
        return $this->productProperties_Common['weight'];
    }

    /**
     * @return mixed
     */
    public function get_EAN()
    {
        return $this->productProperties_Common['EAN'];
    }

    /**
     * @return mixed
     */
    public function get_warranty()
    {
        return $this->productProperties_Common['warranty'];
    }

    /**
     * @return mixed
     */
    public function get_supplier()
    {
        return $this->productProperties_Common['supplier'];
    }

    /**
     * @return mixed
     */
    public function get_supplier_number()
    {
        return $this->productProperties_Common['supplier_number'];
    }

    /**
     * @return mixed
     */
    public function get_category()
    {
        return $this->productProperties_Generic['category'];
    }

    /**
     * @return mixed
     */
    public function get_category_type()
    {
        return $this->productProperties_Generic['category_type'];
    }

    /**
     * @return mixed
     */
    public function get_company()
    {
        return $this->productProperties_Generic['company'];
    }

    /**
     * @return mixed
     */
    public function get_name()
    {
        return $this->productProperties_Generic['name'];
    }

    /**
     * @return mixed
     */
    public function get_image_folder()
    {
        return $this->productProperties_Generic['image_folder'];
    }

    /**
     * @return mixed
     */
    public function get_color()
    {
        return $this->productProperties_Generic['color'];
    }

    /**
     * @return mixed
     */
    public function get_ID()
    {
        return $this->productProperties_Generic['ID'];
    }
}




/*
 *
 *
 *     mem_size varchar(10) NOT NULL,
    mem_denominator varchar(20) NOT NULL,
    mem_type varchar(20) NOT NULL,
    mem_connection varchar(20) NOT NULL,
    mem_speed varchar(20) NOT NULL,
    mem_oc_speed varchar(20),
    mem_pin varchar(20) NOT NULL,
    mem_profile boolean NOT NULL,
 *
 *
 */

