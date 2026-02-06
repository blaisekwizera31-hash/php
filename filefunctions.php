<?php
$file = fopen("renamed.txt", "r");
$newfile = fgets($file);
echo $newfile;
fclose($file);