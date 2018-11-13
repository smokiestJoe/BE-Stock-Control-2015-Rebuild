<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 12:08
 */

class HtmlPageBuilder
{
    public function buildHtmlPage($strPageName)
    {
        # 1: validate page is actually legitimate and not injected!
        $boolValidator = new HtmlPageValidator($strPageName);

        if ($boolValidator->validatePage()) {

            # 2: Configure page parameters
            new HtmlPageConfiguration($strPageName);

            # 3: Build meta tags
            $metaTags = new HtmlPageMetaTagBuilder();

            # 4: Build link tags
            $linkTags = new HtmlPageLinkTagBuilder();

            # 5: Prepare page head
            $htmlPageHead = new HtmlPageHead($metaTags->getMetaTagArray(), $linkTags->getLinkTagArray());

            # 6: Render page head
            $htmlPageHead->renderHtmlPageHead();

            # 7: Build site navigation
            $navigationBar = new HtmlPageNavigationBuilder($strPageName);

            # 8: Build page Footer
            $pageFooter = new HtmlPageFooter();

            # 9: Prepare any global script tags - jQuery, Bootstrap, etc...
            $globalScriptTags = new HtmlPageGlobalScriptBuilder();

            # 10: Prepare any page specific tags here
            $localScriptTags = new HtmlPageLocalScriptBuilder($strPageName);

            # 11: Prepare page body
            $htmlPageBody = new HtmlPageBody($navigationBar->getNavigationBar(), $pageFooter->getHtmlPageFooter(),
                $globalScriptTags->getScriptTagArray(), $localScriptTags->getScriptTagArray());

            # 12: Render page body
            $htmlPageBody->renderHtmlPageBody();
        }
    }
}
