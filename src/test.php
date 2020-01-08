<?php

require_once 'CaesarCipher.php';
require_once 'AtbaszCipher.php';
require_once 'BaconsCipher.php';

$c = new CaesarCipher();
print_r($c->encrypt('COS TAM PISZE SOBIE'));
echo "\n";
print_r($c->decrypt('FRV WDP SLVCH VRELH'));
echo "\n";

$c = new AtbaszCipher();
print_r($c->encrypt('Ala ma kota'));
echo "\n";
print_r($c->decrypt('Zoz nz plgz'));

echo "\n";
$c = new BaconsCipher();
print_r($c->encrypt('Wiki pedia'));
echo "\n";
print_r($c->decrypt('babaa  abaaa   abaababaaaabbbaaabaaaaabbabaaaaaaaa'));
