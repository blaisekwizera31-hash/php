<?php

require 'vendor/autoload.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

$section->addTitle('My Food Report', 1);

$section->addText(
    'This is a list of items generated from PHP.',
    ['name' => 'Arial', 'size' => 12, 'italic' => true]
);

$section->addTextBreak(1);

$section->addListItem('Apples', 0);
$section->addListItem('Bananas', 0);
$section->addListItem('Mangoes', 0);

$writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$path = 'folders/my_document.docx';
$writer->save($path);

echo "Word file 'my_document.docx' has been created!";
