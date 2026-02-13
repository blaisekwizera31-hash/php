<?php

require " vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$foods = [
    ['Foodname' => 'Bananas', 'price' => 3000],
    ['Foodname' => 'Mango', 'price' => 4000],
    ['Foodname' => 'Orange', 'price' => 5000],
];

$newsheet = new Spreadsheet();

$sheet = $newsheet->getActiveSheet();

$sheet -> setCellValue('A1', 'Foodname');
$sheet -> setCellValue('A2', 'price');

$newrow =2;

foreach($food as $foods){

$sheet -> setCellValue('A'. $newrow, $foods[Foodname] );
$sheet -> setCellValue('B'. $newrow, $foods[price] );
}
