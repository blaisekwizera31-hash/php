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
    $factorial = $factorial * $i; 
}

echo "The factorial of $n is $factorial";


for($i=0; $i<=99; $i++){
    // If number is less than 10, add a leading zero
    if($i < 10){
        echo "0".$i;
    } else {
        echo $i;
    }

    // Add comma and space except after the last number
    if($i < 99){
        echo ", ";
    }
}


?>

