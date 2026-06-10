<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "psihologija";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Greška konekcije: " . $conn->connect_error);
}

session_start();
?>