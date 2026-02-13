<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// 1. Imagine this data comes from a Database or an API
$students = [
    ['Name' => 'Alice', 'Grade' => 'A', 'Score' => 92],
    ['Name' => 'Bob', 'Grade' => 'B', 'Score' => 85],
    ['Name' => 'Charlie', 'Grade' => 'A+', 'Score' => 98],
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// 2. Set Headers
$sheet->setCellValue('A1', 'Student Name');
$sheet->setCellValue('B1', 'Grade');
$sheet->setCellValue('C1', 'Score');

// 3. Style the Headers (Make them Bold)
$sheet->getStyle('A1:C1')->getFont()->setBold(true);

// 4. Loop through the data and fill rows
$rowNumber = 2; 
foreach ($students as $student) {
    $sheet->setCellValue('A' . $rowNumber, $student['Name']);
    $sheet->setCellValue('B' . $rowNumber, $student['Grade']);
    $sheet->setCellValue('C' . $rowNumber, $student['Score']);
    $rowNumber++;
}

// 5. Save it
$writer = new Xlsx($spreadsheet);
$filePath = 'folders/student_report.xlsx';
$writer->save($filePath);

echo "✅ Success! Student report created at: " . $filePath;