<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$students = [
    ['Name' => 'Alice',
        'Grade' => 'A',
        'Score' => 92],
    ['Name' => 'Bob',
        'Grade' => 'B',
        'Score' => 85],
    ['Name' => 'Charlie',
        'Grade' => 'A+',
        'Score' => 98],
];

$ssheet = new Spreadsheet();
$sheet  = $ssheet->getActiveSheet();

$sheet->setCellValue('A1', 'Student Name');
$sheet->setCellValue('B1', 'Grade');
$sheet->setCellValue('C1', 'Score');
$sheet->getStyle('A1:C1')->getFont()->setBold(true);

$rowNumber = 2;
foreach ($students as $student) {
    $sheet->setCellValue('A' . $rowNumber, $student['Name']);
    $sheet->setCellValue('B' . $rowNumber, $student['Grade']);
    $sheet->setCellValue('C' . $rowNumber, $student['Score']);
    $rowNumber++;
}

$writer   = new Xlsx($ssheet);
$filePath = 'folders/new_student_report.xlsx';
$writer->save($filePath);

echo "✅ Success! Student report created at: " . $filePath;
