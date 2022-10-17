<?php

include 'private/connection.php';

$sql = "SELECT * FROM parts";
$result = $conn->query($sql);

echo'<table style="color: white">';
echo '<tr>';
echo "<th>id</th>";
echo "<th>naam</th>";
echo "<th>prijs</th>";
echo '</tr>';

if ($result->rowCount() > 0){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr">';
        echo '<td>'. $row["id"];'</td>';
        echo '<td>'. $row["naam"];'</td>';
        echo '<td>'. $row["price"];'</td>';
        echo '</tr>';
    }
} else {
    echo '<td> "0 results"</td>';
}
echo'</table>';
$dbh = null;

?>

<div class="container">
    <form action="../php/aanpassen.php" method="post">
        <input type="text" placeholder="id" name="id" required>
        <input type="text" placeholder="naam" name="naam" required>
        <input type="text" placeholder="type" name="type" hidden>
        <input type="text" placeholder="price" name="price" required>
        <button id="add-button" name="update" class="button">update</button>
    </form>
</div>