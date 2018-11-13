<?php
/**
 * Created by PhpStorm.
 * User: Josep
 * Date: 29/10/2018
 * Time: 11:34
 */

class HtmlPageGlobalScriptBuilder extends HtmlPageAbstract
{
    private $arrScriptTags = [];

    private $strScriptTag = "";

    public function __construct()
    {
        $this->buildHtmlScriptTags();
    }

    private function buildHtmlScriptTags()
    {
        foreach ($this->htmlScriptLinks as $tagType) {

            $this->strScriptTag = "";

            if (in_array('global', $tagType['call'])) {

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

    public function getScriptTagArray()
    {
        return $this->arrScriptTags;
    }
}
