<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 29/10/2018
 * Time: 11:34
 */

class HtmlPageLocalScriptBuilder extends HtmlPageAbstract
{
    private $arrScriptTags = [];

    private $strScriptTag = "";

    private $strPageName = "";

    public function __construct($strPageName)
    {
        $this->strPageName = $strPageName;

        $this->checkParentFlag();
    }

    private function checkParentFlag()
    {
        if (parent::$htmlPageLocalJavascript) {
//            echo "FLAG ON";
            $this->buildHtmlScriptTags();

            $this->resetParentFlag();
        }
    }

    private function buildHtmlScriptTags()
    {
        foreach ($this->htmlScriptLinks as $tagType) {

            $this->strScriptTag = "";

            if (in_array($this->strPageName, $tagType['call'])) {

                foreach ($tagType as $question => $answer) {

                    if ($question != 'call') {

                        $this->strScriptTag .= $question . "='" . $answer . "' ";
                    }
                }

                $this->strScriptTag = "<script " . $this->strScriptTag . "></script>";

                $this->arrScriptTags[] = $this->strScriptTag;
            }
        }
    }

    public function resetParentFlag()
    {
        parent::$htmlPageLocalJavascript = false;
    }

    public function getScriptTagArray()
    {
        return $this->arrScriptTags;
    }
}
