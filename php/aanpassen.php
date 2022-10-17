<?php
include '../private/connection.php';



if (isset($_POST['update']));
{
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $type = $_POST['type'];
    $price = $_POST['price'];


    $stmt = $conn->prepare("UPDATE parts SET `naam` = :naam, `type` = :type, `price` = :price  WHERE `id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->execute();
}

header('location: ../index.php?page=adminwelkom');