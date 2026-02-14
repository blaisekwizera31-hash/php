<?php
require 'vendor/autoload.php';

use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

try {
    $objPHPPresentation = new PhpPresentation();

    // --- SLIDE 1 ---
    $slide1 = $objPHPPresentation->getActiveSlide(); // The first slide exists by default
    $shape1 = $slide1->createRichTextShape()
        ->setHeight(100)
        ->setWidth(600)
        ->setOffsetX(180)
        ->setOffsetY(100);
    
    $textRun1 = $shape1->createTextRun('This is Slide Number 1');
    $textRun1->getFont()->setBold(true)->setSize(40)->setColor(new Color('FF0000FF'));

    // --- SLIDE 2 ---
    $slide2 = $objPHPPresentation->createSlide(); // This creates the second slide
    
    // Let's add a text box to Slide 2
    $shape2 = $slide2->createRichTextShape()
        ->setHeight(100)
        ->setWidth(600)
        ->setOffsetX(180)
        ->setOffsetY(100);
        
    $textRun2 = $shape2->createTextRun('This is Slide Number 2');
    $textRun2->getFont()->setItalic(true)->setSize(40)->setColor(new Color('FF008000'));

    // --- SAVE THE FILE ---
    $writer = IOFactory::createWriter($objPHPPresentation, 'PowerPoint2007');
    $fileName = "folders/multi_slide_test.pptx";
    $writer->save($fileName);

    echo "Success! '$fileName' created with 2 slides.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}