<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 13:42
 */

class StandardiseCompany
{
    private $company = "";

    private $companies = [
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

    public function __construct($company)
    {
        $this->company = $company;
    }

    public function getStandardisedCompany()
    {
        if (array_key_exists($this->company, $this->companies)) {

            $this->company = $this->companies[$this->company];
        }

        return $this->company;
    }
}
