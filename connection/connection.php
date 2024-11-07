<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "probolezat";

$db = mysqli_connect($hostname, $username, $password, $database_name);  

if($db->connect_error){
    echo "koneksi eror";
    die("eror!");
}

?>