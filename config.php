<?php
$server_name="localhost";
$username= "root";
$password = "";
$dbName = "data";

$conn = mysqli_connect($server_name,$username,$password ,$dbName);
if (!$conn){
    die("connection failed : ".mysqli_connect_error());
}