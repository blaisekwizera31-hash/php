<?php
// 1. Load the Composer autoloader
require 'vendor/autoload.php';

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Alignment;

try {
    // 2. Create the presentation object
    $objPHPPresentation = new PhpPresentation();

    // 3. Get the current (first) slide
    $currentSlide = $objPHPPresentation->getActiveSlide();

    // 4. Create a text shape (The Container)
    $shape = $currentSlide->createRichTextShape()
        ->setHeight(100)
        ->setWidth(600)
        ->setOffsetX(50)
        ->setOffsetY(50);

    // 5. Add the actual text (The Content)
    $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $textRun = $shape->createTextRun('PHP to PPT is working!');
    $textRun->getFont()->setBold(true)->setSize(24);

    // 6. Save the file to the same folder as this script
    $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
    $writer->save('test_output.pptx');

    echo "Success! File 'test_output.pptx' has been created.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}