<?php

include './private/connection.php';

// get motherboards
$boards = $conn->prepare("SELECT id, naam FROM parts WHERE type='motherboard'");
$boards->execute();

// get cpu s
$cpus = $conn->prepare("SELECT id, naam FROM parts WHERE type='cpu'");
$cpus->execute();

// get gpu s
$gpus = $conn->prepare("SELECT id, naam FROM parts WHERE type='gpu'");
$gpus->execute();

// get case s
$cases = $conn->prepare("SELECT id, naam FROM parts WHERE type='case'");
$cases->execute();

// get cooling
$cooling = $conn->prepare("SELECT id, naam FROM parts WHERE type='cooling'");
$cooling->execute();

// get ram
$ram = $conn->prepare("SELECT id, naam FROM parts WHERE type='ram'");
$ram->execute();

// get ssd
$ssd = $conn->prepare("SELECT id, naam FROM parts WHERE type='ssd'");
$ssd->execute();

?>
<div class="pcbuildform">
    <form action="" method="post">
        <p>Selecteer uw Moederboard</p>
        <select name="motherboard" id="motherboard">
            <?php
            while ($board = $boards->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $board['id'] . ">" . $board['naam'] . "</option>";
            }
            ?>
        </select>
        <p>Selecteer uw cpu</p>
        <select name="cpu" id="cpu">
            <?php
            while ($cpu = $cpus->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $cpu['id'] . ">" . $cpu['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw gpu</p>
        <select name="gpu" id="gpu">
            <?php
            while ($gpu = $gpus->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $gpu['id'] . ">" . $gpu['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw case</p>
        <select name="cases" id="cases">
            <?php
            while ($case = $cases->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $case['id'] . ">" . $case['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw cooling</p>
        <select name="cooling" id="cooling">
            <?php
            while ($cool = $cooling->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $cool['id'] . ">" . $cool['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw ram</p>
        <select name="ram" id="ram">
            <?php
            while ($rams = $ram->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $rams['id'] . ">" . $rams['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw ssd</p>
        <select name="ssd" id="ssd">
            <?php
            while ($ssds = $ssd->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $ssds['id'] . ">" . $ssds['naam'] . "</option>";
            }
            ?>
        </select>

        <input class="submitbuild" type="submit" name="submit" value="Voeg toe aan winkelwagen"/>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        unset($_POST['submit']);
        $ids = implode(',', $_POST);
        $parts = $conn->prepare("SELECT price FROM parts WHERE id IN ({$ids})");
        $parts->execute();
        $price = 0;
        $conn->beginTransaction();

        while ($part = $parts->fetch(PDO::FETCH_ASSOC)) {
            $price += $part['price'];
        };
        echo "<h1 style='color: white'>" . $price . "</h1>";
    }
    ?>
</div>