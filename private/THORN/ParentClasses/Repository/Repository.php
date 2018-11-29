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

    private $arrProductCategoryTypeColumnNames = [];

    private $strSQLProductCategoryTypeColumnNames = '';

    private $arrMapperObject = [
        'ObjectProduct' => 'ProductMapperObjectProduct',
        'ObjectOrder' => 'ProductMapperObjectOrder',
        'ObjectCustomer' => 'ProductMapperObjectCustomer',
    ];

    private $sqlStatements = '';


    public function __construct($class, $type = null)
    {
        $this->pdo = PdoSingleton::Instance();

        $this->objectClass = $class;

        $this->sqlStatements = $this->objectClass . 'Statements';

        $this->setupTableName($type);
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

    private function getMapper($queryType, $stockAndProductTable, $argument)
    {
        if (array_key_exists($this->objectClass, $this->arrMapperObject))
        {
            echo  gettype($this->primarySql) . '<br>' .  $this->primarySql . '<br>';

            return new $this->arrMapperObject[$this->objectClass]($this->pdo, $this->objectClass, $this->tableName, $queryType, $stockAndProductTable, $this->primarySql, $argument);
        }
    }

//    public function initialiseObject()
//    {
//        if ($this->objectClass == 'ObjectProduct') {
//
//            $this->objectClass::buildProduct($this->tableName);
//
//        } elseif ($this->objectClass == 'ObjectOrder' || $this->objectClass == 'ObjectCustomer') {
//
//            return new $this->objectClass();
//
//        } else {
//
//            throw new Exception("FATAL ERROR: Unknown Object used - Died in Repository.");
//        }
//    }

//    public function execute()
//    {
//        $this->sqlColumnNames = $this->pdo->pdoConnection->prepare("SELECT $this->strSQLProductCategoryTypeColumnNames FROM $this->tableName WHERE mem_type = ? AND name = ?");
//
//        $this->sqlColumnNames->execute(['DDR4', 'Dominator Platinum']);
//
//        $this->fetch();
//
//        echo "PDOStatement::errorInfo():<br>";
//
//        $arr = $this->sqlColumnNames->errorInfo();
//
//        print_r($arr)."<br><br>";
//    }
//
//    public function fetch()
//    {
//        $this->sqlColumnNames->fetch();
//
//        foreach ($this->sqlColumnNames as $row) {
//
//            foreach($this->arrProductCategoryTypeColumnNames as $columnName) {
//
//                echo $row[$columnName];
//            }
//            echo "<br>";
//        }
//    }

    // select (Everything, Conditional)

    // Insert (New)

    // Update (persistence)

    // Delete (single, multiple)

    public function create()
    {
        $queryType = 'create';

        $primarySql = new $this->sqlStatements($queryType, $this->pdo, $this->tableName);

        echo $primarySql->getPrimarySql();

    }

    public function read($argument = null) // PASS IN THE WHERE CONDITION
    {
        echo "CALL ONE: REPOSITORY READ <br><br>";
        $queryType = 'read';
      //  $this->sqlStatements::generateReadSql($argument);

        $primarySql = new $this->sqlStatements($queryType, $this->pdo, $this->tableName);

        $this->primarySql = $primarySql->getPrimarySql();

        $columnsAndData = $primarySql->getColumnsAndData();

       // echo  gettype($this->primarySql) . '<br>' .  $this->primarySql . '<br>';

        return $this->getMapper($queryType, $columnsAndData, $argument);

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
        $queryType = 'update';
    }

    public function delete()
    {
        $queryType = 'delete';
    }

}

