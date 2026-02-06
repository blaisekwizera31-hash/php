<?php
// $file = fopen("renamed.txt", "r");
// $newfile = fgets($file);
// echo $newfile;
// fclose($file);

copy('renamed.txt', 'new.txt');
$newrenamed = file_get_contents('new.txt');
echo $newrenamed;

unlink('new.txt');