<?php
for ($j = 1; $j <= 5; $j++) {
    for ($i = 1; $i <= $j; $i++) {
        echo "* ";
    }
    echo "<br>";
}
for ($j = 1; $j <= 5; $j++) {
    for ($i = 5; $i >= $j; $i--) {
        echo "* ";
    }
    echo "<br>";
}

$n = 6;
for ($i = 5; $i > 0; $i--){
    $z = $n * $i; 
}
   
echo "The multiplication of $n and $i is $z<br>";


// $a = 5;
// $b = 10;

// $result = $a * $b;

// echo "The multiplication of $a and $b is $result";

// ?>