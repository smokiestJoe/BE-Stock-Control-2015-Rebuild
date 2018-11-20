<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 18/11/2018
 * Time: 13:47
 */

class Repository extends AbstractRepository
{
    public $objectClass;

    private $pdo;

    private $sqlColumnNames;

    private $tableName;

    private $productCategoryTypeColumnNames;

    private $productStockControlColumnNames;

    private $arrProductCategoryTypeColumnNames = [];

    private $arrProductStockControlColumnNames = [];

    private $strSQLProductCategoryTypeColumnNames = '';

    private $strSQLProductStockControlColumnNames = '';

    private $arrCombinedStockAndProduct = [];


    public function __construct($class, $type = null)
    {
        $this->pdo = PdoSingleton::Instance();

        $this->objectClass = $class;

        $this->setupType($type);

        $this->getAllProductCategoryTypeColumns();

        $this->getAllProductStockControlColumns();

        //$this->execute();

        $this->query();
    }

    private function setupType($type)
    {
        if ($this->objectClass == 'ObjectProduct') {

            $this->tableName = $type;

        } elseif ($this->objectClass == 'ObjectCustomer') {

            $this->tableName = 'customer';

        } elseif ($this->objectClass == 'ObjectOrder') {

            $this->tableName = 'order';

        } else {

            throw new Exception("FATAL ERROR: Unknown Object used - Died in Repository.");
        }
    }

    public function query()
    {
        $this->sqlColumnNames = $this->pdo->pdoConnection->query("

            SELECT $this->strSQLProductCategoryTypeColumnNames, $this->strSQLProductStockControlColumnNames 
            FROM $this->tableName b, stock_control a
            WHERE b.model_number = a.model_number
            
        ");

        $this->sqlColumnNames->fetch();

        $finalArray = $this->getArrayCombinedStockAndProduct();

        echo "
            <table>
                <thead>
                    <tr>
        ";
            foreach ($finalArray as $header) {

                echo "<th>$header</th>";

            }
        echo "              
                    </tr>
                </thead>
                <tbody>
        ";

        foreach ($this->sqlColumnNames as $row) {

            echo "<tr>";

            foreach ($finalArray as $columnName) {

                echo "<td> $row[$columnName] </td>";
            }

            echo "</tr>";


        }

        echo "
                </tbody>
            </table>
        ";
    }


    public function execute()
    {
        $this->sqlColumnNames = $this->pdo->pdoConnection->prepare("SELECT $this->strSQLProductCategoryTypeColumnNames FROM $this->tableName WHERE mem_type = ? AND name = ?");

        $this->sqlColumnNames->execute(['DDR4', 'Dominator Platinum']);

        $this->fetch();

        echo "PDOStatement::errorInfo():<br>";

        $arr = $this->sqlColumnNames->errorInfo();

        print_r($arr)."<br><br>";
    }

    public function fetch()
    {
        $this->sqlColumnNames->fetch();

        foreach ($this->sqlColumnNames as $row) {

            foreach($this->arrProductCategoryTypeColumnNames as $columnName) {

                echo $row[$columnName];
            }




            echo "<br>";


        }
    }

    // select (Everything, Conditional)

    // Insert (New)

    // Update (persistence)

    // Delete (single, multiple)

    public function create()
    {

    }

    public function read() // PASS IN THE WHERE CONDITION
    {
        // IF NULL, QUERY (STRAIGHT SELECT)

        // IF NOT NULL, PREPARE (2 ARGUMNETS ALLOWED)

        return new $this->objectClass($this->tableName);

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    private function getAllProductStockControlColumns()
    {
        $this->productStockControlColumnNames = $this->pdo->pdoConnection->query('SHOW columns FROM stock_control');

        foreach ($this->productStockControlColumnNames as $row) {

            $this->arrProductStockControlColumnNames[] = $row['Field'];
        }

        $this->setAllProductStockControlColumnSql();
    }

    private function getAllProductCategoryTypeColumns()
    {
        $this->productCategoryTypeColumnNames = $this->pdo->pdoConnection->query("SHOW columns FROM $this->tableName");

        foreach ($this->productCategoryTypeColumnNames as $row) {

            $this->arrProductCategoryTypeColumnNames[] = $row['Field'];
        }

        $this->setAllProductCategoryColumnSql();
    }

    private function setAllProductStockControlColumnSql()
    {
        foreach ($this->arrProductStockControlColumnNames as $column) {

            $this->strSQLProductStockControlColumnNames .= 'a.' . $column . ',';
        }

        $this->strSQLProductStockControlColumnNames = rtrim($this->strSQLProductStockControlColumnNames, ",");

       // echo $this->strSQLProductStockControlColumnNames . "<br>";
    }

    private function setAllProductCategoryColumnSql()
    {
        foreach ($this->arrProductCategoryTypeColumnNames as $column) {

            $this->strSQLProductCategoryTypeColumnNames .= 'b.' . $column . ',';
        }

        $this->strSQLProductCategoryTypeColumnNames = rtrim($this->strSQLProductCategoryTypeColumnNames, ",");

    //    echo $this->strSQLProductCategoryTypeColumnNames . "<br>";
    }

    public function getArrayCombinedStockAndProduct()
    {
        $this->arrCombinedStockAndProduct = array_unique(array_merge($this->arrProductCategoryTypeColumnNames, $this->arrProductStockControlColumnNames));

        return $this->arrCombinedStockAndProduct;
    }
}

/*
 *
 *
 *
 * $this->sqlStatement->fetch();

        foreach ($this->sqlStatement as $row)
        {
            // 1: Make Company & Category lowercase.
            $companyLowercase = strtolower($row['manufacturer']);
            $category = strtolower($row['type']);
            $category = str_replace(' ', '_', $category);
            $this->category = $category;

            // 2: Standardise Company
            $nonStandardisedCompany = new StandardiseCompany($companyLowercase);
            $company = $nonStandardisedCompany->getStandardisedCompany();

            // 3: RefineImagePath
            $imageLink = new ImageReassigner($companyLowercase, $category, $row['model_number'], $row['image_link']);
            $imageLink = $imageLink->getImageDirectory();

            // 4: Assign Common Variables
            $description = "undefined";
            $modelNumber = $row['model_number'];

            // 5: Generic Model Name Detangling
            $buffer = substr($row['model_name'],4);
            $cut = strpos($buffer, ' ');
            $nonRefinedModelName = substr($buffer, $cut);

            // 6: Common Inserts Performed
            $this->commonDatabaseInsert($modelNumber, $company, $imageLink, $description, $category);

            // 7: Pass off to class for individual product categories:
            $this->callProductDetangler($nonRefinedModelName, $modelNumber);
        }
 */
