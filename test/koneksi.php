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
$temp = $_POST["suhu"];
$ph = $_POST["ph"];
$turbidity = $_POST["turbidity"];
$amonia = $_POST["gas"];
$raindrop = $_POST["raindrop"];
// $cobasuhu = 40;
// $cobaamonia = 1.7;
// $cobacurah = 900;
// $cobaph = 5;
$cobado = 2;
// $cobaph = 1;

$sql = "INSERT INTO data_sensor (tanggal, suhu, amonia, curah_hujan,ph, do, turbidity, waktu)
		VALUES ('" . $d . "', '".$temp."', '".$amonia."', '".$raindrop."','".$ph."','".$cobado."','".$turbidity."' ,'" . $t . "')";
		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

$sqlsensor = "SELECT * FROM sensor";
if ($result = $conn->query($sqlsensor)) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id_sensor"];
            $nama = $row["nama_sensor"];
            $batas_bawah = $row["batas_bawah"];
            $batas_atas = $row["batas_atas"];
            
            if($nama == "Suhu" && (($temp > $batas_atas)||($temp < $batas_bawah))){
            $sqlsuhu = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Suhu air melewati batas normal', 'suhu air mencapai ". $temp ." *C')";
		        if ($conn->query($sqlsuhu) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sqlsuhu . "<br>" . $conn->error;
                }
            }
            if($nama == "ph" && (($ph > $batas_atas)||($ph < $batas_bawah))){
            $sqlph = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'pH melewati batas normal', 'pH mencapai ". $ph ."')";
		        if ($conn->query($sqlph) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sqlph . "<br>" . $conn->error;
                }
            }
            if($nama == "Dissolved Oxygen" && (($cobado > $batas_atas)||($cobado < $batas_bawah))){
                $sqldo = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Dissolve Oxygen melewati batas normal', 'dissolve oxygen mencapai ". $cobado ."')";
                    if ($conn->query($sqldo) === TRUE) {
                        echo "OK";
                    } else {
                        echo "Error: " . $sqldo . "<br>" . $conn->error;
                    }
                }
            if($nama == "Amonia" && (($amonia > $batas_atas)||($amonia < $batas_bawah))){
            $sqlamonia = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Kadar amonia melewati batas normal', 'kadar amonia mencapai ". $amonia ." ppm')";
		        if ($conn->query($sqlamonia) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sqlamonia . "<br>" . $conn->error;
                }
            }
            if($nama == "Turbidity" && (($turbidity > $batas_atas)||($turbidity < $batas_bawah))){
                $sqlturbidity = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Kadar amonia melewati batas normal', 'kadar amonia mencapai ". $turbidity ." ppm')";
                    if ($conn->query($sqlturbidity) === TRUE) {
                        echo "OK";
                    } else {
                        echo "Error: " . $sqlturbidity . "<br>" . $conn->error;
                    }
                }
            
            if($raindrop < 600){
            $sqlraindrop = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Terjadi Hujan Deras', 'Hujan dengan intensitas tinggi terjadi di sekitar keramba')";
		        if ($conn->query($sqlraindrop) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sqlraindrop . "<br>" . $conn->error;
                }
            } else if ($raindrop < 900 && $raindrop >= 600){
                $sqlraindrop = "INSERT INTO notifikasi (tanggal_notif, waktu_notif, judul, pesan) VALUES ('" . $d . "', '" . $t . "', 'Terjadi Hujan Ringan', 'Hujan dengan intensitas rendah terjadi di sekitar keramba')";
		        if ($conn->query($sqlraindrop) === TRUE) {
		            echo "OK";
		        } else {
                    echo "Error: " . $sqlraindrop . "<br>" . $conn->error;
                }
            }
        }
    $result->free();
}

$conn->close();