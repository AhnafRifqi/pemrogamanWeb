<?php
$x = 10;
$y = 15;

function tambah() {
    $z = $GLOBALS['x'] + $GLOBALS['y'];
    return $z;
}

echo "Hasil penjumlahan x dan y adalah ".tambah();
?>