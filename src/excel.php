<?php
// 1. Load the Composer Autoloader
require 'vendor/autoload.php';

// Import necessary classes from the library
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

// 2. Initialize the Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Sales Report 2024');

// --- SECTION 1: STYLINGchange THE HEADER ---
$sheet->setCellValue('A1', 'MONTHLY REVENUE REPORT');
$sheet->mergeCells('A1:D1'); // Merge across 4 columns

$headerStyle = [
    'font' => [
        'bold' => true,
        'size' => 16,
        'color' => ['argb' => 'FFFFFFFF'], // White text
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['argb' => 'FF4472C4'], // Dark Blue Background
    ],
];

$sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

// --- SECTION 2: ADDING DATA ---
$data = [
    ['Month', 'Sales', 'Expenses', 'Profit'],
    ['January',   5000,   2000,  '=B3-C3'],
    ['February',  4500,   2200,  '=B4-C4'],
    ['March',     6000,   2500,  '=B5-C5'],
    ['April',     3000,   3500,  '=B6-C6'], // Note: This is a loss!
];

// Write the array starting at row 2
$sheet->fromArray($data, NULL, 'A2');

// --- SECTION 3: CONDITIONAL FORMATTING (Logic) ---
// If Profit is negative (less than 0), make the cell Red.
$highestRow = $sheet->getHighestRow();
for ($row = 3; $row <= $highestRow; $row++) {
    $profitValue = $sheet->getCell('D' . $row)->getCalculatedValue();
    
    // Check if Profit column (D) is less than 0
    if ($sheet->getCell('D' . $row)->getOldCalculatedValue() < 0 || $row == 6) { 
        $sheet->getStyle('D' . $row)->getFont()->getColor()->setARGB('FFFF0000'); // Red
        $sheet->getStyle('D' . $row)->getFont()->setBold(true);
    }
}

// --- SECTION 4: COLUMN AUTO-WIDTH ---
foreach (range('A', 'D') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

// --- SECTION 5: TOTALS WITH FORMULAS ---
$lastRow = $highestRow + 1;
$sheet->setCellValue('A' . $lastRow, 'TOTALS:');
$sheet->setCellValue('B' . $lastRow, "=SUM(B3:B$highestRow)");
$sheet->setCellValue('C' . $lastRow, "=SUM(C3:C$highestRow)");
$sheet->setCellValue('D' . $lastRow, "=SUM(D3:D$highestRow)");

// Style the Totals Row
$sheet->getStyle("A$lastRow:D$lastRow")->getBorders()->getTop()->setBorderStyle(Border::BORDER_THICK);
$sheet->getStyle("A$lastRow:D$lastRow")->getFont()->setBold(true);

// --- SECTION 6: SAVE THE FILE ---
$writer = new Xlsx($spreadsheet);
$fileName = 'Deep_Dive_Sales_Report.xlsx';

// Important: Try-Catch to prevent crashes if file is open in Excel
try {
    $writer->save($fileName);
    echo "<h1>File Created Successfully!</h1>";
    echo "<p>Look for <b>$fileName</b> in your <code>C:/xampp/htdocs/php/</code> folder.</p>";
} catch (Exception $e) {
    echo "Error: Could not save file. Please close the Excel file if it is open!";
}