<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 13:42
 */

function standardiseCompany($company) {

    $company = strtolower($company);

    $companies = [
        'evga' => 'EVGA',
        'corsair' => 'Corsair',
        'lenovo' => 'Lenovo',
        'sony' => 'Sony',
        'plantronics' => 'Plantronics',
        'microsoft' => 'Microsoft',
        'lg' => 'LG',
        'symantec' => 'Symantec',
        'medion' => 'Medion',
        'devolo' => 'Devolo',
        'optoma' => 'Optoma',
        'logitech' => 'Logitech',
        'msi' => 'MSI',
        'brother' => 'Brother',
        'linksys' => 'Linksys',
        'tp link' => 'TP Link',
        'epson' => 'Epson',
        'bullguard' => 'Bullguard',
        'mcafee' => 'McAfee',
        'cherry' => 'Cherry',
        'samsung' => 'Samsung',
        'netgear' => 'Netgear',
        'acer' => 'Acer',
        'asus' => 'Asus',
        'aoc' => 'AOC',
        'pny' => 'PNY',
        'accuratus' => 'Accuratus',
        'hewlett packard' => 'Hewlett Packard',
        'advent' => 'Advent',
        'packard bell' => 'Packard Bell',
        'linx' => 'Linx',
        'toshiba' => 'Toshiba',
        'ocz' => 'OCZ',
        'western digital' => 'Western Digital',
        'intel' => 'Intel',
        'amd' => 'AMD',
        'belkin' => 'Belkin',
    ];

    if (array_key_exists($company, $companies)) {

        $company = $companies[$company];
    }

    return $company;
}
