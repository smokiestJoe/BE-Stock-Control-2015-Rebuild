<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 23/11/2018
 * Time: 14:19
 */

class MapperObjectProduct extends AbstractMapper
{
    /**
     * @var
     */
    private $pdo;

    /**
     * @var
     */
    private $objectClass;

    /**
     * @var
     */
    private $tableName;

    /**
     * @var string
     */
    private $primarySql = '';

    /**
     * @var
     */
    private $stockAndProductTableColumns;

    /**
     * @var null
     */
    protected $arguments;

    /**
     * @var
     */
    private $queryType;

    /**
     * @var
     */
    private $sqlData;

    /**
     * @var array
     */
    private $arrReturnObjects = [];

    /**
     * MapperObjectProduct constructor.
     * @param $pdo
     * @param $objectClass
     * @param $tableName
     * @param $queryType
     * @param $stockAndProductTable
     * @param $primarySql
     * @param null $arguments
     */
    public function __construct($pdo, $objectClass, $tableName, $queryType, $stockAndProductTable, $primarySql, $arguments = null)
    {
        $this->pdo = $pdo;

        $this->objectClass = $objectClass;

        $this->tableName = $tableName;

        $this->queryType = $queryType;

        $this->stockAndProductTableColumns = $stockAndProductTable;

        $this->primarySql = $primarySql;

        $this->arguments = $arguments;
    }

    /**
     * @return array
     */
    public function findByAllProductType()
    {
        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql);

        return $this->mapToModel();
    }

    /**
     * @param $modelNumber
     * @return array
     */
    public function findByProductModelNumber($modelNumber)
    {
        $modelNumber = strtoupper($modelNumber);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.model_number = '$modelNumber'");

        return $this->mapToModel();
    }

    /**
     * @param $productName
     * @return array
     */
    public function findByProductName($productName)
    {
        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.name LIKE '%$productName%'");

        return $this->mapToModel();
    }

    /**
     * @param $companyName
     * @return array
     */
    public function findByProductCompany($companyName)
    {
        $companyName = ucfirst($companyName);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND b.company LIKE '%$companyName%'");

        return $this->mapToModel();
    }

    /**
     * @param $supplierName
     * @return array
     */
    public function findBySupplierName($supplierName)
    {
        $supplierName = ucfirst($supplierName);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND a.supplier LIKE '%$supplierName%'");

        return $this->mapToModel();
    }

    /**
     * @param $supplierNumber
     * @return array
     */
    public function findBySupplierNumber($supplierNumber)
    {
        $supplierNumber = strtoupper($supplierNumber);

        $this->sqlData = $this->pdo->pdoConnection->query($this->primarySql . "AND a.supplier_number = '$supplierNumber'");

        return $this->mapToModel();
    }

    /**
     * @return array
     */
    protected function mapToModel()
    {
        $arrSqlData = $this->sqlData->fetchAll();

        $arrSqlColumns = $this->stockAndProductTableColumns;

        /* CALL STATIC VALIDATION ON THE OBJECT PRODUCT */
        $this->objectClass::validateModel($this->tableName, $this->stockAndProductTableColumns);

        //$productCounter = 0;

        foreach ($arrSqlData as $arrObjectProperties) {

            /* CREATE NEW INSTANCE OF MODEL AND HYDRATE */
           $this->arrReturnObjects[] = $this->objectClass::buildProduct($this->tableName, $arrObjectProperties, $arrSqlColumns);
        }
        return $this->arrReturnObjects;
    }

}
