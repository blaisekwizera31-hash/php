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


$n = 5;
$factorial = 1;

for ($i = 1; $i <= $n; $i++) {
    $factorial = $factorial * $i; // Multiply step by step
}

echo "The factorial of $n is $factorial";
?>



// $a = 5;
// $b = 10;

// $result = $a * $b;

// echo "The multiplication of $a and $b is $result";

// ?>