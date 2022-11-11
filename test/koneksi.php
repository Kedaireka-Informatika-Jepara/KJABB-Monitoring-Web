<?php
//Creates new record as per request
//Connect to database
$servername = "localhost";
$username = "ceme9264_sensor";
$password = "Adinda02";
$dbname = "ceme9264_monitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

//Get current date and time
date_default_timezone_set('Asia/Bangkok');
$d = date("Y-m-d");
$t = date("H:i:s");
$temp = $_POST["temp"];
$amonia = $_POST["amonia"];
$curahHujan = $_POST["curah_hujan"];
$relay = $_POST["relay"];
// $coba = 40;
// $coba2 = 1.7;

$sql = "INSERT INTO data_sensor (tanggal, suhu, amonia, curah_hujan, relay, waktu)
		VALUES ('" . $d . "', '".$temp."', '".$amonia."', '".$curahHujan."', '".$relay."', '" . $t . "')";
		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

$sql3 = "SELECT * FROM sensor";
if ($result = $conn->query($sql3)) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id_sensor"];
            $nama = $row["nama_sensor"];
            $batas_bawah = $row["batas_bawah"];
            $batas_atas = $row["batas_atas"];
            
            if($nama == "Suhu" && (($temp > $batas_atas)||($temp < $batas_bawah))){
            $sql2 = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Suhu air melewati batas normal', 'suhu air mencapai ". $temp ." *C')";
		        if ($conn->query($sql2) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
            }
            
            if($nama == "Amonia" && (($amonia > $batas_atas)||($amonia < $batas_bawah))){
            $sql4 = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Kadar amonia melewati batas normal', 'kadar amonia mencapai ". $amonia ." ppm')";
		        if ($conn->query($sql4) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sql4 . "<br>" . $conn->error;
                }
            }
            
            if($curahHujan < 600){
            $sql5 = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Terjadi Hujan Deras', 'Hujan dengan intensitas tinggi terjadi di sekitar keramba')";
		        if ($conn->query($sql5) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sql5 . "<br>" . $conn->error;
                }
            } else if ($curahHujan < 900 && $curahHujan >= 600){
                $sql5 = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Terjadi Hujan Ringan', 'Hujan dengan intensitas rendah terjadi di sekitar keramba')";
		        if ($conn->query($sql5) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sql5 . "<br>" . $conn->error;
                }
            }
        }
    $result->free();
}

$conn->close();