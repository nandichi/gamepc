<?php

include 'private/connection.php';
$username =  $_SESSION['username'];

/*
 * stappen
 * 1. Selectie cart + pcbuild in een Select zetten.
 * 2. Explode pcbuild ids naar array.
 * 3. elk ID ophalen in de database.
 * 4. tonen van de info in HTML.
 */




$sql = $conn->prepare("SELECT * FROM cart WHERE username = :username");
$sql->bindParam(':username', $username, PDO::PARAM_STR);
$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);

$sql2 = $conn->prepare("SELECT * FROM user_build WHERE id = :id");
$sql2->bindParam(':id', $row['build_id'], PDO::PARAM_STR);
$sql2->execute();
$row2 = $sql2->fetch(PDO::FETCH_ASSOC);

echo $row2['part_ids'];
?>



<h1 class="checkout">winkelmandje</h1>

<ol class="list-group list-group-numbered">
    <form action="php/cart.php" method="post">

        <?php
        foreach ($row2['part_ids'] as $item) {
            $sql3 = $conn->prepare("SELECT * FROM parts WHERE id = :id");
            $sql3->bindParam(':id', $item, PDO::PARAM_STR);
            $sql3->execute();
            $row3 = $sql3->fetch(PDO::FETCH_ASSOC);
         ?>
           echo <li class="list-group-item"><?= $row3['motherboard']?>></li>
            <li class="list-group-item"><?= $row3['cpu']?>></li>
            <li class="list-group-item"><?= $row3['gpu']?>></li>
            <li class="list-group-item"><?= $row3['case']?>></li>
            <li class="list-group-item"><?= $row3['cooling']?>></li>
            <li class="list-group-item"><?= $row3['ram']?>></li>
            <li class="list-group-item"><?= $row3['ssd']?>></li>
          <?php   }
        ?>
    </form>
</ol>