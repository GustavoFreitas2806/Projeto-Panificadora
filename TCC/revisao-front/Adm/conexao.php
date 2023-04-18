<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "apsm";

$con = new mysqli($host, $user, $password, $db);

if ($con->connect_errno) {
    die("Falha na conexão");
}
?>