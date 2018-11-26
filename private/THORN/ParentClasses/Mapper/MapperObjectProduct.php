<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 23/11/2018
 * Time: 14:19
 */

class MapperObjectProduct extends AbstractMapper
{
    private $pdo;

    private $tableName;

    private $primarySql;

    protected $arguments;

    private $queryType;

    private $sqlColumnNames;

    public function __construct($pdo, $tableName, $queryType, $primarySql, $arguments = null)
    {
        $this->pdo = $pdo;

        $this->tableName = $tableName;

        $this->queryType = $queryType;

        $this->primarySql = $primarySql;

        $this->arguments = $arguments;

        echo "PRODUCT MAPPER ONLINE";

        // TEMPORARY

        $this->readQueryAll();
    }

    public function create()
    {
        // TODO: Implement create() method.
        echo "CREATING A PRODUCT OBJECT:<br>";
    }

    public function read()
    {
        // TODO: Implement read() method.
        echo "CREATING A PRODUCT OBJECT:<br>";
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function readQueryAll()
    {
        $this->sqlColumnNames = $this->pdo->pdoConnection->query($this->primarySql);

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

//    public function getArrayCombinedStockAndProduct()
//    {
//        $this->arrCombinedStockAndProduct = array_unique(array_merge($this->arrProductCategoryTypeColumnNames, $this->arrProductStockControlColumnNames));
//
//        return $this->arrCombinedStockAndProduct;
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
//
//
//
//
//            echo "<br>";
//
//
//        }
//    }

}