<?php

echo "Bilangan genap dari 1 sampai 10:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 3 == 0) {
        echo $i . " ";
    }
}
echo "<br>";