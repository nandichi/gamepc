<?php

$servername = "localhost";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=gamepc", $username, $password);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>