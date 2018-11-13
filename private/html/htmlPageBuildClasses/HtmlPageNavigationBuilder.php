<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 27/10/2018
 * Time: 10:43
 */

class HtmlPageNavigationBuilder extends HtmlPageAbstract
{
    private $strPageName = "";

    private $strNavLiList = "";

    private $strNavUlList = "";

    public function __construct($strPageName)
    {
        $this->strPageName = $strPageName;

        $this->buildNavigationBar();
    }

    private function buildNavigationBar()
    {
        foreach ($this->pages as $page) {

           if ($page['name'] == $this->strPageName && $this->strPageName != 'services') {

               $this->strNavLiList .= "<div class=\"col-md-2 navTab\"><h3>" . $page['navlink']['name'] . "</h3></div>";

           } else {

               $this->strNavLiList .= "<div class=\"col-md-2 navTab\"><h3><a href='" . $page['navlink']['link'] .  "'>" . $page['navlink']['name'] . "</a></h3></div>";
           }
        }

        $this->strNavUlList =  "<div class=\"col-md-1 spacer\"></div>" .  $this->strNavLiList . "<div class=\"col-md-1 spacer\"></div>" ;
    }

    public function getNavigationBar()
    {
        return $this->strNavUlList;
    }
}
