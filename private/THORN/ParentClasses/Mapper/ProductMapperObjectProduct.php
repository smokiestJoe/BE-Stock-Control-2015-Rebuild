<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 23/11/2018
 * Time: 14:19
 */

class ProductMapperObjectProduct extends AbstractProductMapper
{
    private $pdo;

    private $objectClass;

    private $tableName;

    private $primarySql = '';

    private $stockAndProductTableColumns;

    protected $arguments;

    private $queryType;

    private $sqlData;

    public function __construct($pdo, $objectClass, $tableName, $queryType, $stockAndProductTable, $primarySql, $arguments = null)
    {
        $this->pdo = $pdo;

        $this->objectClass = $objectClass;

        $this->tableName = $tableName;

        $this->queryType = $queryType;

        $this->stockAndProductTableColumns = $stockAndProductTable;

        $this->primarySql = $primarySql;

        $this->arguments = $arguments;

//        echo "PRODUCT MAPPER ONLINE";
//
//        echo gettype($this->primarySql);
//
//        echo $this->primarySql;
    }

    public function findByAllProductType()
    {
        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql);

        $this->mapToModel();
    }

    public function findByProductModelNumber($modelNumber)
    {
        $modelNumber = strtoupper($modelNumber);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.model_number = '$modelNumber'");

        $this->mapToModel();
    }

    public function findByProductName($productName)
    {
        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.name LIKE '%$productName%'");

        $this->mapToModel();
    }

    public function findByProductCompany($companyName)
    {
        $companyName = ucfirst($companyName);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.company LIKE '%$companyName%'");

        $this->mapToModel();
    }

    public function findBySupplierName($supplierName)
    {
        $supplierName = ucfirst($supplierName);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND a.supplier LIKE '%$supplierName%'");

        $this->mapToModel();
    }

    public function findBySupplierNumber($supplierNumber)
    {
        $supplierNumber = strtoupper($supplierNumber);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND a.supplier_number = '$supplierNumber'");

        $this->mapToModel();
    }


    private function mapToModel()
    {
        //        $this->sqlData = $this->pdo->pdoConnection->query("        SELECT b. *, a. *
//            FROM $this->tableName b, stock_control a
//            WHERE b.model_number = a.model_number ");

        //  $this->sqlData = $this->pdo->pdoConnection->query("SELECT * FROM memory");


        //  $this->sqlData->fetch();

        $arrSqlData = $this->sqlData->fetchAll();

        $arrData = [];
        $arrColumns = [];

        $arrSqlColumns = $this->stockAndProductTableColumns;

        //$cake = $this->objectClass::buildProduct($this->tableName, $arrData, $arrColumns);



        //     $cake->sayHello();
        $c = 0;
        echo "
            <table>
                <thead>
                    <tr>
        ";
        foreach ($arrSqlColumns as $header) {

            echo "<th>$header</th>";

        }
        echo "
                    </tr>
                </thead>
                <tbody>
        ";

        foreach ($arrSqlData as $row) {

            echo "<tr>";

            foreach ($arrSqlColumns as $columnName) {

                echo "<td> $row[$columnName] </td>";

            }

            $c++;

            echo "</tr>";


        }

        echo "
                </tbody>
            </table>
        ";

        echo "<br>THERE WERE $c <br> ";

        //    return $this->objectClass::buildProduct($this->tableName, $arrData, $arrColumns);
    }

}
