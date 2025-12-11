<?php 

$server = "localhost";
$database = "jupiter_mart";
$user = "root";
$password = "";

$conn = new mysqli($server,$user,$password,$database);

if(!$conn) {
    echo('error');  
}

?>