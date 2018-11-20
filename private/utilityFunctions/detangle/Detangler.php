<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 14/11/2018
 * Time: 13:05
 */

class Detangler
{
    /**
     * @var string
     */
    private $pdo = "";

    /**
     * @var string
     */
    private $searchCategory = "";

    /**
     * @var string
     */
    private $sqlStatement = "";

    /**
     * @var string
     */
    private $category = "";

    /**
     * @var array
     */
    private $detanglers = [
        'memory' => 'MemoryDetangler',
        'case_fan' => 'CaseFanDetangler',
        'graphics_card' => 'GraphicsCardDetangler',
        'motherboard' => 'MotherboardDetangler',
    ];

    /**
     * Detangler constructor.
     * @param $pdoConnection
     * @param $category
     */
    public function __construct($pdoConnection, $category)
    {
        $this->pdo = $pdoConnection;

        $this->searchCategory = $category;

        $this->executeSql();
    }

    /**
     *
     */
    private function executeSql()
    {
        $this->sqlStatement = $this->pdo->pdoConnection->prepare('SELECT * FROM stocked_products WHERE type = ?');

        $this->sqlStatement->execute([$this->searchCategory]);

        $this->fetchSql();
    }

    /**
     *
     */
    private function fetchSql()
    {
        $this->sqlStatement->fetch();

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
    }

    /**
     * @param $modelNumber
     * @param $company
     * @param $imageLink
     * @param $description
     * @param $category
     * @param $EAN
     */
    private function commonDatabaseInsert($modelNumber, $company, $imageLink, $description, $category)
    {
        $sql = "INSERT INTO $this->category (model_number, company, image_folder, description, category_type) VALUES (?,?,?,?,?)";

        $sqlStatement = $this->pdo->pdoConnection->prepare($sql);

        $sqlStatement->execute([$modelNumber, $company, $imageLink, $description, $category]);

        echo "PDOStatement::errorInfo():<br>";

        $arr = $sqlStatement->errorInfo();

        print_r($arr)."<br><br>";
    }

    /**
     * @param $nonRefinedModelName
     * @param $modelNumber
     */
    private function callProductDetangler($nonRefinedModelName, $modelNumber)
    {
        if (array_key_exists($this->category, $this->detanglers)) {

            $detanglerClass = $this->detanglers[$this->category];

            new $detanglerClass($nonRefinedModelName, $modelNumber, $this->pdo, $this->category);
        }
    }
}
