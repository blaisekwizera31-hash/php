<?php
echo '<h2>File Functions Test</h2>';

if (is_readable('English.pdf')) {
    echo "File is readable";
} else {
    echo "Not readable";
}
