<?php
session_start();

include '../private/connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT role,username FROM users WHERE username= :username AND password = :password';

$query = $conn->prepare($sql);
$query->bindParam(':username', $username);
$query->bindParam(':password', $password);
$query->execute();


if ($query->rowCount() == 1 ) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result['role'] == "admin") {
        $_SESSION['ingelogd'] = true;
        $_SESSION['username'] = $result['username'];
        header('location: ../index.php?page=adminwelkom');
    } elseif ($result['role'] == "klant") {
        $_SESSION['ingelogd1'] = true;
        $_SESSION['username'] = $result['username'];
        header('location: ../index.php?page=welkom');
    } else {        $_SESSION['ingelogd1'] = true;
        $_SESSION['username'] = $result['username'];
        header('location: ../index.php?page=welkom');}
}else{

    $_SESSION['melding'] = 'Combinatie gebruikersnaam en Wachtwoord onjuist.';
    header('location: ../index.php?page=login');
}
