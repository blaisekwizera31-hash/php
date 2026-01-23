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

echo "The factorial of $n is $factorial <br>";


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


echo "<table cellpadding='3px' cellspacing='0px' border='1'>";
for($i=1;$i<=6;$i++){
  echo "<tr>";
  for($j=1;$j<=5;$j++){
    echo "<td>$i * $j = ".($i*$j)."</td>";
  }
  echo "</tr>";
}
echo "</table>";



echo "<table width='270px' cellspacing='0'>";
for($i=1;$i<=8;$i++){
  echo "<tr>";
  for($j=1;$j<=8;$j++){
    $color=(($i+$j)%2==0)?"white":"black";
    echo "<td height='30px' width='30px' bgcolor='$color'></td>";
  }
  echo "</tr>";
}
echo "</table>";



echo "<table border='1'>";
echo "<tr>";
for($i=1;$i<=10;$i++){ echo "<th>$i</th>"; }
echo "</tr>";
for($i=2;$i<=10;$i++){
  echo "<tr>";
  for($j=1;$j<=10;$j++){ echo "<td>".($i*$j)."</td>"; }
  echo "</tr>";
}
echo "</table>";


?>

