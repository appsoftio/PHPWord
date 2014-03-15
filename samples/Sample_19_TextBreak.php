<?php
/**
 * Text break
 */
include_once 'Sample_Header.php';

// New Word document
echo date('H:i:s'), " Create new PHPWord object", EOL;
$PHPWord = new PHPWord();

// Begin code
$fontStyle = array('size' => 24);
$paragraphStyle = array('spacing' => 240, 'size' => 24);
$PHPWord->addFontStyle('fontStyle', array('size' => 9));
$PHPWord->addParagraphStyle('paragraphStyle', array('spacing' => 480));
$fontStyle = array('size' => 24);

$section = $PHPWord->createSection();
$section->addText('Text break with no style:');
$section->addTextBreak();
$section->addText('Text break with defined font style:');
$section->addTextBreak(1, 'fontStyle');
$section->addText('Text break with defined paragraph style:');
$section->addTextBreak(1, null, 'paragraphStyle');
$section->addText('Text break with inline font style:');
$section->addTextBreak(1, $fontStyle);
$section->addText('Text break with inline paragraph style:');
$section->addTextBreak(1, null, $paragraphStyle);
$section->addText('Done.');

// End code

// Save file
$name = basename(__FILE__, '.php');
$writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf');
foreach ($writers as $writer => $extension) {
    echo date('H:i:s'), " Write to {$writer} format", EOL;
    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, $writer);
    $objWriter->save("{$name}.{$extension}");
    rename("{$name}.{$extension}", "results/{$name}.{$extension}");
}

include_once 'Sample_Footer.php';
