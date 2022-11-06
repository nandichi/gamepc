<?php

include 'private/connection.php';

$sql = "SELECT * FROM parts";

$sth = $conn->prepare($sql);
$sth->execute();
$res = $sth->fetchAll();

?>

<body>
<div class="container">
    <form action="../php/aanpassen.php" method="post">
        <div class="dropdown">
            <label class="text-primary">Product Naam</label><br>
            <input type="text" name="naam">
            <br>

            <label class="text-primary">Type</label><br>
            <input type="text" name="type">
            <br>

            <label class="text-primary">Prijs</label><br>
            <input type="text"name="prijs">
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
        <input type="text" placeholder="price" name="price">
        <button id="add-button" name="update" class="button">update</button>
    </form>
</div>

</body>