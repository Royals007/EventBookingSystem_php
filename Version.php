<?php
 /*additional task*/
$version = "1.0.17+60";
$array = ["1.0.17+42", "1.0.17+59", "1.0.15+83", "1.0.17+65", "1.1.3", "1.0.17+59", "1.1.3"];

$pattern = '/[.+]/';
echo '<pre>', print_r( preg_split( $pattern, $array[0] ), 1 ), '</pre>';
$result = preg_split( $pattern, $version );


