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

    public $object;

    private $pdo;

    private $sqlColumnNames;

    private $tableName;

    private $primarySql;

    private $productCategoryTypeColumnNames;

    private $productStockControlColumnNames;

    private $arrProductCategoryTypeColumnNames = [];

    private $arrProductStockControlColumnNames = [];

    private $strSQLProductCategoryTypeColumnNames = '';

    private $strSQLProductStockControlColumnNames = '';

    private $arrCombinedStockAndProduct = [];

    private $arrMapperObject = [
        'ObjectProduct' => 'MapperObjectProduct',
        'ObjectOrder' => 'MapperObjectOrder',
        'ObjectCustomer' => 'MapperObjectCustomer',
    ];

    private $sqlStatements = '';


    public function __construct($class, $type = null)
    {
        $this->pdo = PdoSingleton::Instance();

        $this->objectClass = $class;

        $this->sqlStatements = $this->objectClass . 'Statements';

        $this->setupTableName($type);



       // $this->getMapper();



//        $this->getAllProductCategoryTypeColumns();
//
//        $this->getAllProductStockControlColumns();

        //$this->execute();

        //$this->query();
    }

    private function setupTableName($type)
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

    private function getMapper($argument)
    {
        if (array_key_exists($this->objectClass, $this->arrMapperObject))
        {
            return new $this->arrMapperObject[$this->objectClass]($this->pdo, $this->tableName, $this->primarySql, $argument);
        }
    }

    public function initialiseObject()
    {
        if ($this->objectClass == 'ObjectProduct') {

            $this->objectClass::buildProduct($this->tableName);

        } elseif ($this->objectClass == 'ObjectOrder' || $this->objectClass == 'ObjectCustomer') {

            return new $this->objectClass();

        } else {

            throw new Exception("FATAL ERROR: Unknown Object used - Died in Repository.");
        }
    }


//    public function query()
//    {
//        $this->sqlColumnNames = $this->pdo->pdoConnection->query("
//
//            SELECT $this->strSQLProductCategoryTypeColumnNames, $this->strSQLProductStockControlColumnNames
//            FROM $this->tableName b, stock_control a
//            WHERE b.model_number = a.model_number
//
//        ");
//
//        $this->sqlColumnNames->fetch();
//
//        $finalArray = $this->getArrayCombinedStockAndProduct();
//
//        echo "
//            <table>
//                <thead>
//                    <tr>
//        ";
//            foreach ($finalArray as $header) {
//
//                echo "<th>$header</th>";
//
//            }
//        echo "
//                    </tr>
//                </thead>
//                <tbody>
//        ";
//
//        foreach ($this->sqlColumnNames as $row) {
//
//            echo "<tr>";
//
//            foreach ($finalArray as $columnName) {
//
//                echo "<td> $row[$columnName] </td>";
//            }
//
//            echo "</tr>";
//
//
//        }
//
//        echo "
//                </tbody>
//            </table>
//        ";
//    }

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
        $primarySql = new $this->sqlStatements('create', $this->pdo, $this->tableName);

        echo $primarySql->getPrimarySql();

    }

    public function read($argument = null) // PASS IN THE WHERE CONDITION
    {
      //  $this->sqlStatements::generateReadSql($argument);

        $primarySql = new $this->sqlStatements('read', $this->pdo, $this->tableName);

        $this->primarySql = $primarySql->getPrimarySql();

      //  echo $this->primarySql;

        $this->getMapper($this->pdo, $this->tableName, 'read', $this->primarySql, $argument);

        // IF NULL, QUERY (STRAIGHT SELECT)

        // IF NOT NULL, PREPARE (2 ARGUMENTS ALLOWED)

        // $this->initialiseObject();

        /**
         * GET ALL PRODUCTS / GET ALL ORDERS / GET ALL PRODUCTS
         * GET ALL ORDERS - DATE / GET ALL PRODUCTS - DATE
         * GET MODEL NUMBER / GET ORDER ID / GET CUSTOMER ID
         * GET MODEL NAME / GET CUSTOMER NAME
         */

        /*
         * Argument passed in can be a:
         * Model Number /ID
         * Date Range,
         * Name
         * Null = Nothing
         */

        // RERIEVE PRIMARY SQL ->

        // RETRIVE ARGUMNETS

        // RETRIAVE OBJECT CLASS

        // PASS TO MAPPER

        // PASS ARGUMENT TO MAPPER



    }

    public function update()
    {

    }

    public function delete()
    {

    }

//    private function getAllProductStockControlColumns()
//    {
//        $this->productStockControlColumnNames = $this->pdo->pdoConnection->query('SHOW columns FROM stock_control');
//
//        foreach ($this->productStockControlColumnNames as $row) {
//
//            $this->arrProductStockControlColumnNames[] = $row['Field'];
//        }
//
//        $this->setAllProductStockControlColumnSql();
//    }
//
//    private function getAllProductCategoryTypeColumns()
//    {
//        $this->productCategoryTypeColumnNames = $this->pdo->pdoConnection->query("SHOW columns FROM $this->tableName");
//
//        foreach ($this->productCategoryTypeColumnNames as $row) {
//
//            $this->arrProductCategoryTypeColumnNames[] = $row['Field'];
//        }
//
//        $this->setAllProductCategoryColumnSql();
//    }
//
//    private function setAllProductStockControlColumnSql()
//    {
//        foreach ($this->arrProductStockControlColumnNames as $column) {
//
//            $this->strSQLProductStockControlColumnNames .= 'a.' . $column . ',';
//        }
//
//        $this->strSQLProductStockControlColumnNames = rtrim($this->strSQLProductStockControlColumnNames, ",");
//
//       // echo $this->strSQLProductStockControlColumnNames . "<br>";
//    }
//
//    private function setAllProductCategoryColumnSql()
//    {
//        foreach ($this->arrProductCategoryTypeColumnNames as $column) {
//
//            $this->strSQLProductCategoryTypeColumnNames .= 'b.' . $column . ',';
//        }
//
//        $this->strSQLProductCategoryTypeColumnNames = rtrim($this->strSQLProductCategoryTypeColumnNames, ",");
//
//    //    echo $this->strSQLProductCategoryTypeColumnNames . "<br>";
//    }

//    public function getArrayCombinedStockAndProduct()
//    {
//        $this->arrCombinedStockAndProduct = array_unique(array_merge($this->arrProductCategoryTypeColumnNames, $this->arrProductStockControlColumnNames));
//
//        return $this->arrCombinedStockAndProduct;
//    }
}

