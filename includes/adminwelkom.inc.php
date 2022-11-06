<?php

include 'private/connection.php';

$sql = "SELECT * FROM parts";

$sth = $conn->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

$sql = "SELECT DISTINCT type FROM parts";

$sth = $conn->prepare($sql);
$sth->execute();
$types = $sth->fetchAll();


?>

<body>
<div class="container">
    <form action="../php/aanpassen.php" method="post">
        <div class="dropdown">
            <label class="text-primary">Product Naam</label><br>
            <input type="text" name="naam"required>
            <br>
            <select name="type" class="btn btn-primary dropdown-toggle">
                <option>Selecteer type</option>'
                <?php
                foreach ($types as $row) {
                    echo ' <option value="'.$row['type'] .'"> ' .$row["type"]. '</option>';
                }
                ?>
            </select>
            <br>

            <label class="text-primary">Prijs</label><br>
            <input type="text"name="price" required>
            <br>
                <select name="resultaat" class="btn btn-primary dropdown-toggle">
                    <option>Selecteer product</option>'
                    <?php
                    foreach ($res as $row) {
                        echo ' <option value="'.$row['id'] .'"> ' .$row["naam"]. '</option>';
                    }
                    ?>
                </select>
            </div>
        <button id="add-button" name="update" class="button">update</button>
    </form>
</div>
</body>