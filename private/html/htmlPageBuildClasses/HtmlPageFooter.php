<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 28/10/2018
 * Time: 14:21
 */

class HtmlPageFooter extends HtmlPageAbstract
{
    private $strFooter;

    public function __construct()
    {
        $this->buildHtmlPageFooter();
    }

    private function buildHtmlPageFooter()
    {
       $this->strFooter = "
       
        <footer>
          
            <small> 2018 copyright &copy; ETG</small>

        </footer>
       
       ";
    }

    public function getHtmlPageFooter()
    {
        return $this->strFooter;
    }
}
