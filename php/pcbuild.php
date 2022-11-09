<?php
session_start();

include '../private/connection.php';


if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    $ids = implode(',', $_POST);
    $parts = $conn->prepare("SELECT id, price FROM parts WHERE id IN ({$ids})");
    $parts->execute();
    $price = 0;
    $conn->beginTransaction();

    while ($part = $parts->fetch(PDO::FETCH_ASSOC)) {
        $price += $part['price'];
    };
    $conn->exec("INSERT INTO user_build (part_ids, price) VALUES ('{$ids}', {$price})");
    $conn->commit();

    $cart = $conn->prepare("SELECT LAST_INSERT_ID() as id");
    $cart->execute();
    $build_id = $cart->fetch();
    $username = $_SESSION['username'];
    $conn->beginTransaction();

    $conn->exec("INSERT INTO cart (username, build_id) VALUES ('{$username}', {$build_id[0]})");
    $conn->commit();
    header('location: ../index.php?page=pcbuild');

}
?>