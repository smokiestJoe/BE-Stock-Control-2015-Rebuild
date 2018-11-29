<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 26/11/2018
 * Time: 10:43
 */

class ObjectProductStatements extends AbstractStatements
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

    private $arrQueryCall = [
        'create' => 'generateCreateSql',
        'read' => 'generateReadSql',
        'update' => 'generateUpdateSql',
        'delete' => 'generateDeletSql',
    ];

    public function __construct($command, $pdo, $tableName)
    {
        /* DB Connection */
        $this->pdo = $pdo;

        /* Table Name for search i.e. memory, graphics card etc... */
        $this->tableName = $tableName;

        /* Returns a comma separated string of the column Names */
        $this->getAllProductStockControlColumns();

        /* Returns a comma separated string of the column Names */
        $this->getAllProductCategoryTypeColumns();

        $this->determinePrimarySql($command);
    }

    private function determinePrimarySql($command)
    {
        if (array_key_exists($command, $this->arrQueryCall)) {

            $executeMemberFunction = $this->arrQueryCall[$command];
            $this->$executeMemberFunction();

        } else {

            throw new Exception ("SOMETHING WENT VERY WRONG - DIED IN PRODUCT STATEMENT");
        }
    }

    public function getPrimarySql()
    {
        return $this->sql;
    }

    protected function generateCreateSql()
    {
        $this->sql = "YOU ARE NOW IN A CREATE STATEMENT<br>";
    }

    protected function generateReadSql()
    {
        $this->sql = "      
            SELECT $this->strSQLProductCategoryTypeColumnNames, $this->strSQLProductStockControlColumnNames
            FROM $this->tableName b, stock_control a
            WHERE b.model_number = a.model_number 
        ";
    }

    protected function generateUpdateSql()
    {
        $this->sql =  "YOU ARE NOW IN A UPDATE STATEMENT<br>";
    }

    protected function generateDeleteSql()
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

        $this->productStockControlColumnNames = null;

        $this->setAllProductStockControlColumnSql();
    }

    private function getAllProductCategoryTypeColumns()
    {
        $this->productCategoryTypeColumnNames = $this->pdo->pdoConnection->query("SHOW columns FROM $this->tableName");

        foreach ($this->productCategoryTypeColumnNames as $row) {

            $this->arrProductCategoryTypeColumnNames[] = $row['Field'];
        }

        $this->productCategoryTypeColumnNames = null;

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

    public function getColumnsAndData()
    {
        $this->arrCombinedStockAndProduct = array_unique(array_merge($this->arrProductCategoryTypeColumnNames, $this->arrProductStockControlColumnNames));

        return $this->arrCombinedStockAndProduct;
    }

}