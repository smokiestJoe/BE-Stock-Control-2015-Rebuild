<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 17:56
 */

class HtmlPageMetaTagBuilder extends HtmlPageAbstract
{
    private $arrMetaTags = [];

    public function __construct()
    {
        $this->buildHtmlMetaTags();
    }

    private function buildHtmlMetaTags()
    {
        foreach ($this->htmlHeadMetaData as $name => $content) {

            $this->arrMetaTags[] = "<meta name='" . $name . "' content='" . $content ."' />";
        }
    }

    public function getMetaTagArray()
    {
        return $this->arrMetaTags;
    }
}
