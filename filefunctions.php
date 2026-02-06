<?php
if (rename("example.txt", "renamed.txt")) {
    echo "done";
} else {
    echo "not done";
}
?>
