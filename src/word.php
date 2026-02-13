<?php

require 'vendor/autoload.php';

// 1. Create the main Document object
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// 2. Add a Section (Think of this as your "Page")
$section = $phpWord->addSection();

// 3. Add a simple Title
$section->addTitle('My Food Report', 1);

// 4. Add Text with styling (similar to an inline CSS object in React)
$section->addText(
    'This is a list of items generated from PHP.',
    ['name' => 'Arial', 'size' => 12, 'italic' => true]
);

// 5. Add a Break (Empty line)
$section->addTextBreak(1);

// 6. Add a Bullet List (Much easier than Excel!)
$section->addListItem('Apples', 0);
$section->addListItem('Bananas', 0);
$section->addListItem('Mangoes', 0);

// 7. Save the file (The Writer)
$writer = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$writer->save('folders/my_document.docx');

echo "Word file 'my_document.docx' has been created!";crea