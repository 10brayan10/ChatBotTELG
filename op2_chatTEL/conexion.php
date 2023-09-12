<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_de_ss";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($conn)){
echo"conectado";
}