<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 26/10/2018
 * Time: 12:08
 */

abstract class HtmlPageAbstract
{
    protected $pages = [
        'index' => [
            'name' => 'index',
            'title' => 'new project',
            'header' => 'Welcome to your new project',
            'navlink' => [
                'name' => 'Home',
                'link' => '/new_project/public/www/index.php'
            ],
            'content' => 'indexContent',
            'usescript' => false,
        ],
        'suppliers' => [
            'name' => 'suppliers',
            'title' => 'Suppliers Page',
            'header' => 'Supplier Reconcile',
            'navlink' => [
                'name' => 'Suppliers',
                'link' => '/new_project/public/www/pages/suppliers.php'
            ],
            'content' => 'suppliersContent',
            'usescript' => false,
        ],
        'stock' => [
            'name' => 'stock',
            'title' => 'Stock Page',
            'header' => 'Stock Control',
            'navlink' => [
                'name' => 'Stock',
                'link' => '/new_project/public/www/pages/stock.php'
            ],
            'content' => 'stockContent',
            'usescript' => true,
        ],
        'utilities' => [
            'name' => 'utilities',
            'title' => 'Utilities Page',
            'header' => 'Utilities',
            'navlink' => [
                'name' => 'Utilities',
                'link' => '/new_project/public/www/pages/utilities.php'
            ],
            'content' => 'utilitiesContent',
            'usescript' => true,
        ],
    ];

    protected $htmlHeadCharSet = "<meta charset=\"UTF-8\">";

    protected $htmlHeadMetaData = [
        'description' => 'whatever the company does',
        'keywords' =>'Enter,Words,As,Strings',
        'author' => 'name goes here',
        'viewport' => 'width=device-width, initial-scale=1.0',
    ];

    protected $htmlHeadLinks = [
        'bootstrap' => [
            'rel' => 'stylesheet',
            'href' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
            'integrity' => 'sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u',
            'crossorigin' => 'anonymous',
        ],
        'css' => [
            'rel' => 'stylesheet',
            'href' => '/new_project/public/www/css/main.css',
            'integrity' => 'na',
            'crossorigin' => 'na',
        ],
    ];

    protected $htmlScriptLinks = [
        'jquery' => [
            'call' => ['global'],
            'src' => 'https://code.jquery.com/jquery-3.3.1.js',
            'integrity' => 'sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=',
            'crossorigin' => 'anonymous',
        ],
        'bootstrap' => [
            'call' => ['global'],
            'src' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
            'integrity' => 'sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa',
            'crossorigin' => 'anonymous',
        ],
        'namespace' => [
            'call' => ['utilities', 'stock'],
            'src' => '/new_project/public/www/javascript/applicationNamespace.js',
        ],
        'stockControlFunctions' => [
            'call' => ['stock'],
            'src' => '/new_project/public/www/javascript/stockControl/stockControlFunctions.js',
        ],
        'stockControl' => [
            'call' => ['stock'],
            'src' => '/new_project/public/www/javascript/stockControl/stockControl.js',
        ],
        'servicesFunctions' => [
            'call' => ['utilities'],
            'src' => '/new_project/public/www/javascript/services/servicesFunctions.js',
        ],
        'services' => [
            'call' => ['utilities'],
            'src' => '/new_project/public/www/javascript/services/services.js',
        ],
    ];

    protected static $htmlHeadTitle = "";

    protected static $htmlBodyHeader = "";

    protected static $htmlPageContent = "";

    protected static $htmlPageLocalJavascript = false;

}
