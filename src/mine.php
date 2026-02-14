<?php
require 'vendor/autoload.php';


use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

try {
  $new = new PhpPresentation;

$slide = $new -> getActiveSlide();
$shape1 =$slide ->createRichTextShape()
                ->setHeight(120)
                ->setWidth(600);
   $run = $shape1 ->createTextRun('My names are Isingizwe kwizera blaise');
  $new2 = $run ->getFont() ->setBold(true)->setItalic(true) ->setSize(40) ->setColor(new Color('Red')) ;  
   
  $slide2 =$new -> createSlide();
  $slide3 = $slide2 ->createRichTextShape()
          ->setHeight(120)
          ->setWidth(600);
  $run2 =$slide3 ->createTextRun('I DID THIS ALSO THIS SECOND SLIDE');
  $run3 =$run2 ->getFont() ->setUnderline(true) ->setSize(50)->setColor(new Color('Blue')) ;
  $writer = IOFactory::createWriter($new, 'PowerPoint2007');
  $filename ='folders/mine.pptx';
  $writer ->save($filename);

  echo 'Success and you did a great job';


}
catch(Exception $error) {

echo $error -> getMessage(); 

}