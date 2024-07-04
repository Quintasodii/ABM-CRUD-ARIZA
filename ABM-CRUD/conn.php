<?php
$host="localhost";
$dbusu="Quinta";
$dbpass="gugu";
$dbname="datacenter";
$conn= mysqli_connect($host,$dbusu,$dbpass,$dbname);
if ($conn->connect_error){
    header("CONECTION ERROR");
}


?>