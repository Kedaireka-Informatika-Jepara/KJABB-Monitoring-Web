<?php
$time = time();
$tempF = $_POST["temp"];
$amonia = $_POST["amonia"];
$curahHujan = $_POST["curah_hujan"];
$relay = $_POST["relay"];
$file = 'temp.html';
$data = $time . "  -  " . $tempF . " - " . $amonia . " - ". $curahHujan . " - " . $relay;
file_put_contents($file, $data);
// echo $data;
