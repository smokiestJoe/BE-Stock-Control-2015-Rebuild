<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 18/11/2018
 * Time: 11:12
 */

class ObjectProduct extends AbstractObject
{
    /**
     * @var
     */
    protected $sqlProductKeys = [];

    /**
     * @var array
     */
    protected $sqlProductValues = [];

    /**
     * @var array
     */
    protected $productProperties = [];

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
    protected $product_properties_Stock = [
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
    protected $productProperties_Generic = [
        // categories
        'category' => null,
        //
        'category_type' => null,
        // generic
        'company' => null,
        'name' => null,
        'image_folder' => null,
        'color' => null,
        'ID' => null,
    ];

    /**
     * @var array
     */
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
    public static function buildProduct($productType, $arrSqlData, $arrSqlColumns)
    {
        echo "PRODUCT BEING CREATED: PRODUCT TYPE: $productType<br>";

        $productClass = "ObjectProduct_" . ucfirst($productType);

        if (class_exists($productClass)) {

            return new $productClass($arrSqlData, $arrSqlColumns);

        } else {

            throw new Exception ("PRODUCT DOES NOT EXIST");
        }
    }

    /**
     * @param $childProduct
     * @param $columnsToBeValidated
     * @throws Exception
     */
    public static function validateModel($childProduct, $columnsToBeValidated)
    {
        echo "CHILD CLASS IS: $childProduct<br>";

        $productClass = "ObjectProduct_" . ucfirst($childProduct);

        echo "$productClass<br>";

        $parentValidationArray = self::$parentValidationArray;

        $childValidationArray = $productClass::returnProductPropertiesArray();

        $validationArray = array_merge($parentValidationArray, $childValidationArray);

        $validateDifference = array_diff($validationArray, $columnsToBeValidated);

        if ($validateDifference) {

            echo "THERE IS A PROBLEM FORMING THE MODEL. ERROR FOUND IN: ";

            foreach ($validateDifference as $error) {

                echo $error . "<br>";
            }

            throw new Exception("TERMINATING PROGRAM - DIED IN MODEL VALIDATION");
        }
    }

    /**
     * @return array
     */
    protected function mergeParentArrays()
    {
        $parentArray = array_merge($this->productProperties_Common, $this->product_properties_Stock);

        $parentArray = array_merge($parentArray, $this->productProperties_Generic);

        return $parentArray;
    }

    /**
     * GETTERS
     */

    /**
     * @return mixed
     */
    public function get_model_number()
    {
        return $this->productProperties['model_number'];
    }

    /**
     * @return mixed
     */
    public function get_price_ex_vat()
    {
        return $this->productProperties['price_ex_vat'];
    }

    /**
     * @return mixed
     */
    public function get_vat()
    {
        return $this->productProperties['vat'];
    }

    /**
     * @return mixed
     */
    public function get_price_inc_vat()
    {
        return $this->productProperties['price_inc_vat'];
    }

    /**
     * @return mixed
     */
    public function get_margin_percent()
    {
        return $this->productProperties['margin_percent'];
    }

    /**
     * @return mixed
     */
    public function get_postage()
    {
        return $this->productProperties['postage'];
    }

    /**
     * @return mixed
     */
    public function get_sale_price()
    {
        return $this->productProperties['sale_price'];
    }

    /**
     * @return mixed
     */
    public function get_weight()
    {
        return $this->productProperties['weight'];
    }

    /**
     * @return mixed
     */
    public function get_EAN()
    {
        return $this->productProperties['EAN'];
    }

    /**
     * @return mixed
     */
    public function get_warranty()
    {
        return $this->productProperties['warranty'];
    }

    /**
     * @return mixed
     */
    public function get_supplier()
    {
        return $this->productProperties['supplier'];
    }

    /**
     * @return mixed
     */
    public function get_supplier_number()
    {
        return $this->productProperties['supplier_number'];
    }

    /**
     * @return mixed
     */
    public function get_category()
    {
        return $this->productProperties['category'];
    }

    /**
     * @return mixed
     */
    public function get_category_type()
    {
        return $this->productProperties['category_type'];
    }

    /**
     * @return mixed
     */
    public function get_company()
    {
        return $this->productProperties['company'];
    }

    /**
     * @return mixed
     */
    public function get_name()
    {
        return $this->productProperties['name'];
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
