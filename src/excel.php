<?php

require  'vendor/autoload.php';

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
$sheet -> setCellValue('B1', 'price');

$newrow =2;

foreach($foods as $food){

$sheet -> setCellValue('A'. $newrow, $food['Foodname'] );
$sheet -> setCellValue('B'. $newrow, $food['price'] );

$newrow++;
}
$writer = new Xlsx($newsheet);
$wheretosave = 'folders/food.xlsx';
$writer -> save($wheretosave);

echo 'you did a great job';

