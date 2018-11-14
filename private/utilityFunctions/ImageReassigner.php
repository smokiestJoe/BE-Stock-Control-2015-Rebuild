<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 15:23
 */

class ImageReassigner
{
    /**
     * @var string
     */
    private $baseLocation = "../../../public/";

    /**
     * @var string
     */
    private $imageLocation = "assets/images/";

    /**
     * @var string
     */
    private $oldDirectoryPath = "";

    /**
     * @var string
     */
    private $oldFilePath = "";

    /**
     * @var string
     */
    private $oldFile = "";

    /**
     * @var string
     */
    private $newImageDir = "stock/";

    /**
     * @var string
     */
    private $companyDir = "";

    /**
     * @var string
     */
    private $categoryDir = "";

    /**
     * @var string
     */
    private $newPath = "";

    /**
     * @var string
     */
    private $dbFilePath = "";

    /**
     * @var string
     */
    private $modelNumberDir = "";

    /**
     * @var string
     */
    private $modelNumber = "";


    /**
     * ImageReassigner constructor.
     * @param $company
     * @param $category
     * @param $modelNumber
     * @param $oldPath
     */
    public function __construct($company, $category, $modelNumber, $oldPath)
    {
        $this->oldDirectoryPath = $oldPath;

        $this->companyDir = $company . '/';

        $this->categoryDir = $category . '/';

        $this->modelNumberDir = $modelNumber . '/';

        $this->modelNumber = $modelNumber;


        $this->verifyOldDirectoryPath();
    }

    /**
     *
     */
    private function verifyOldDirectoryPath()
    {
        if (is_dir($this->baseLocation)) {

            echo "Old Image Directory Found. Continuing<br>";

            $this->verifyOldFileExists();

        } else {

            echo "Old Image Directory not Found. Aborting.<br>";
        }
    }

    /**
     *
     */
    private function verifyOldFileExists()
    {
        $this->oldFilePath = $this->baseLocation . $this->imageLocation . $this->oldDirectoryPath;

        if (file_exists($this->oldFilePath)) {

            echo "The file $this->oldFilePath exists<br>";

            $this->setOldFileName($this->oldFilePath);

            $this->checkForNewCompanyFolder();

        } else {

            echo "The file $this->oldFilePath does not exist<br>";
        }
    }

    /**
     *
     */
    private function checkForNewCompanyFolder()
    {
        $this->newPath = $this->baseLocation . $this->imageLocation . $this->newImageDir . $this->companyDir;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        $this->checkForNewCategoryFolder();
    }

    /**
     *
     */
    private function checkForNewCategoryFolder()
    {
        $this->dbFilePath = $this->imageLocation . $this->newImageDir . $this->companyDir . $this->categoryDir;

        $this->newPath = $this->baseLocation . $this->dbFilePath;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        $this->checkForNewModelFolder();
    }

    /**
     *
     */
    private function checkForNewModelFolder()
    {
        $this->dbFilePath = $this->imageLocation . $this->newImageDir . $this->companyDir . $this->categoryDir . $this->modelNumberDir;

        $this->newPath = $this->baseLocation . $this->dbFilePath;

        if (!is_dir($this->newPath)) {

            mkdir($this->newPath);
        }

        echo $this->dbFilePath ."<br>";

        $this->copyImageFile();
    }

    /**
     *
     */
    private function copyImageFile()
    {

        $fileExtension = explode('.' ,$this->oldFile);

        $fileExtension = $fileExtension[1];

        echo "THE FILE EXTENSION IS: " . $fileExtension . "<br>";

        $old = $this->oldFilePath;

        echo "THE OLD FILE PATH IS: " . $old . "<br>";

        $new = $this->baseLocation . $this->dbFilePath . $this->modelNumber . '-01.' . $fileExtension;

        echo "THE NEW FILE PATH IS: " . $new . "<br>";


        if (!copy($old, $new)) {

            echo "failed to copy $old <br>";

        } else {

            echo "copy was a success<br>";
        }
    }

    /**
     * @param $oldFile
     */
    private function setOldFileName($oldFile)
    {
        $paths = $list = explode("/", $oldFile);

        echo "OLD FILE:" . $paths[8] . "<br>";

        $this->oldFile = $paths[8];
    }

    /**
     * @return string
     */
    public function getImageDirectory()
    {
        return $this->dbFilePath;
    }
}
