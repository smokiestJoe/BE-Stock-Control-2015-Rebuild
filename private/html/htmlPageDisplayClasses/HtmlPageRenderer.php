<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 12:08
 */

class HtmlPageRenderer
{
    public function renderHtmlPage($strPageName)
    {
        $objBuildHtmlPage = new HtmlPageBuilder();

        $objBuildHtmlPage->buildHtmlPage($strPageName);
    }
}
