<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 26/11/2018
 * Time: 10:43
 */

class ObjectProductStatements
{
    private $sql = '';

    private $tableName = '';

    private $pdo;

    private $productCategoryTypeColumnNames;

    private $productStockControlColumnNames;

    private $arrCombinedStockAndProduct = [];

    private $arrProductCategoryTypeColumnNames = [];
    
    private $arrProductStockControlColumnNames = [];

    private $strSQLProductCategoryTypeColumnNames = '';

    private $strSQLProductStockControlColumnNames = '';



    public function __construct($command, $pdo, $tableName)
    {
        /* DB Connection */
        $this->pdo = $pdo;

        $this->tableName = $tableName;

        /* Returns a comma separated string of the column Names */
        $this->getAllProductStockControlColumns();

        /* Returns a comma separated string of the column Names */
        $this->getAllProductCategoryTypeColumns();

        $this->determinePrimarySql($command);
    }

    public function determinePrimarySql($command)
    {
        if ($command == 'create') {

            $this->generateCreateSql();

        } elseif ($command == 'read') {

            $this->generateReadSql();

        } elseif ($command == 'update') {

            $this->generateUpdateSql();

        } elseif ($command == 'delete') {

            $this->generateDeleteSql();
        }
    }

    public function getPrimarySql()
    {
        return $this->sql;
    }


    public function generateCreateSql()
    {
        $this->sql = "YOU ARE NOW IN A CREATE STATEMENT<br>";
    }

    public function generateReadSql()
    {
        $this->sql = "      
            SELECT $this->strSQLProductCategoryTypeColumnNames, $this->strSQLProductStockControlColumnNames
            FROM $this->tableName b, stock_control a
            WHERE b.model_number = a.model_number   
        ";
    }

    public function generateUpdateSql()
    {
        $this->sql =  "YOU ARE NOW IN A UPDATE STATEMENT<br>";
    }

    public function generateDeleteSql()
    {
        $this->sql =  "YOU ARE NOW IN A DELETE STATEMENT<br>";
    }

    /**/

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
    }

    private function setAllProductCategoryColumnSql()
    {
        foreach ($this->arrProductCategoryTypeColumnNames as $column) {

            $this->strSQLProductCategoryTypeColumnNames .= 'b.' . $column . ',';
        }

        $this->strSQLProductCategoryTypeColumnNames = rtrim($this->strSQLProductCategoryTypeColumnNames, ",");
    }

//    public function getArrayCombinedStockAndProduct()
//    {
//        $this->arrCombinedStockAndProduct = array_unique(array_merge($this->arrProductCategoryTypeColumnNames, $this->arrProductStockControlColumnNames));
//
//        return $this->arrCombinedStockAndProduct;
//    }

}