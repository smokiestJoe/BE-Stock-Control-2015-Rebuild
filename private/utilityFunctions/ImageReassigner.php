<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 15:23
 */

class ImageReassigner
{
    private $baseLocation = "../../../public/";

    private $imageLocation = "assets/images/";

    private $oldPath = "";

    private $oldFile = "";

    private $newImageDir = "stock/";

    private $companyDir = "";

    private $categoryDir = "";

    private $newPath = "";

    private $dbFilePath = "";

    private $modelNumber = "";


    public function __construct($company, $category, $modelNumber, $oldPath)
    {
        $this->oldPath = $oldPath;

        $this->companyDir = $company . '/';

        $this->categoryDir = $category . '/';

        $this->modelNumber = $modelNumber . '/';

        $this->verifyOldDirectoryPath();
    }

    private function verifyOldDirectoryPath()
    {
        if (is_dir($this->baseLocation)) {

            echo "Old Image Directory Found. Continuing<br>";

            $this->verifyOldFileExists();

        } else {

            echo "Old Image Directory not Found. Aborting.<br>";
        }
    }

    private function verifyOldFileExists()
    {
        $this->oldFile = $this->baseLocation . $this->imageLocation . $this->oldPath;

        if (file_exists($this->oldFile)) {

            echo "The file $this->oldFile exists<br>";

            $this->checkForNewCompanyFolder();

        } else {

            echo "The file $this->oldFile does not exist<br>";
        }
    }

    private function checkForNewCompanyFolder()
    {
        $this->newPath = $this->baseLocation . $this->imageLocation . $this->newImageDir . $this->companyDir;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        $this->checkForNewCategoryFolder();
    }

    private function checkForNewCategoryFolder()
    {
        $this->dbFilePath = $this->imageLocation . $this->newImageDir . $this->companyDir . $this->categoryDir;

        $this->newPath = $this->baseLocation . $this->dbFilePath;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        $this->checkForNewModelFolder();
    }

    private function checkForNewModelFolder()
    {
        $this->dbFilePath = $this->imageLocation . $this->newImageDir . $this->companyDir . $this->categoryDir . $this->modelNumber;

        $this->newPath = $this->baseLocation . $this->dbFilePath;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        echo $this->dbFilePath ."<br>";
    }





    


    public function getImageDirectory()
    {
        return $this->dbFilePath;
    }


    // THEN:

    // COPY THE FILE OVER

    // THEN:

    // RENAME THE FILE TO THE MODEL NUMBER AND ADD A -1, -2, -3 RESPECTIVELY


}