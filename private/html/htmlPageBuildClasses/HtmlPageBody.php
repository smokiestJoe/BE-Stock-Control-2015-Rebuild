<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 14:29
 */

class HtmlPageBody extends HtmlPageAbstract
{
    private $strNavigationBar = "";

    private $strPageFooter = "";

    private $globalScriptTags = [];

    private $localScriptTags = [];

    public function __construct($strNavigationBar, $strPageFooter, $globalScriptTags, $localScriptTags)
    {
        $this->strNavigationBar = $strNavigationBar;

        $this->strPageFooter = $strPageFooter;

        $this->globalScriptTags = $globalScriptTags;

        $this->localScriptTags = $localScriptTags;
    }

    private function buildHtmlPageBody()
    {
    ?>
        <body>

            <div class="htmlPageBodyWrapper container-fluid">

                <div class="htmlPageBodyTopWrapper row">

                    <div id="htmlPageNavigationPageWrapper">

                    </div>

                    <div id="htmlPageBannerWrapper" class="col-md-12">

                        LOGO AND BANNER GO HERE

                    </div>

                    <div id="htmlPageNavigationBarWrapper" class="col-md-12">

                        <?= $this->strNavigationBar; ?>

                    </div>

                    <div id="htmlPageCategoryBarWrapper">

                    </div>

                </div>

                <div class="htmlPageBodyBottomWrapper row">

                    <div id="htmlPageContentWrapperOuter" class="col-md-12">

                        <div class="spacer col-md-1"></div>

                        <div id="htmlPageContentWrapperInner" class="col-md-12">

                            <div id="htmlPageSubCategoryLinkWrapper" class="col-md-12">

                            </div>

                            <div id="htmlPageSidebarWrapper" class="col-md-12">

                            </div>

                            <div id="htmlPageHeaderWrapper" class="col-md-12">

                                <header><h2><?= parent::$htmlBodyHeader; ?></h2></header>

                            </div>

                            <div id="htmlPageContent" class="col-md-12">

                                <?php

                                call_user_func(parent::$htmlPageContent);

                                ?>

                            </div>

                        </div>

                        <div class="spacer col-md-1"></div>

                    </div>

                    <div id="htmlPageFooterWrapper" class="col-md-12">

                        <?= $this->strPageFooter; ?>

                    </div>

                </div>

            </div>

            <div id="htmlPageScriptingWrapper">

                <?php

                foreach ($this->globalScriptTags as $globalScriptTag) {

                    echo $globalScriptTag;
                }

                foreach ($this->localScriptTags as $localScriptTag) {

                    echo $localScriptTag;
                }

                ?>

            </div>

        </body>

    </html>

    <?php
    }

    public function renderHtmlPageBody()
    {
        return $this->buildHtmlPageBody();
    }
}
