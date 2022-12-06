<?php
class dht11{
 public $link;
 function __construct($temperature, $ph){
  $this->connect();
  date_default_timezone_set('Asia/Bangkok');
  $d = date("Y-m-d");
  $t = date("H:i:s");
  $this->storeInDB($t, $temperature, $ph);
    echo $t;
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'sensortest') or die('Cannot select the DB');
 }
 
 function storeInDB($t, $temperature, $ph){
  $query = "insert into data_sensor (time,ph,suhu) values('".$t."','".$ph."', '".$temperature."')";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['temperature'] != '' and  $_GET['ph'] != ''){
 $dht11=new dht11($_GET['temperature'],$_GET['ph']);
}
?>