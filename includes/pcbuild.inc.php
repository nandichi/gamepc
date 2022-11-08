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


<h1 class="pcbuildwel">Welkom op het pc builden page!</h1>
<div class="loginform">
    <form action="php/pcbuild.php" method="post">
        <p>Selecteer uw Moederboard</p>
        <select class="btn btn-primary dropdown-toggle" name="motherboard" id="motherboard">
            <?php
            while ($board = $boards->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $board['id'] . ">" . $board['naam'] . "</option>";
            }
            ?>
        </select>
        <p>Selecteer uw cpu</p>
        <select class="btn btn-primary dropdown-toggle" name="cpu" id="cpu">
            <?php
            while ($cpu = $cpus->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $cpu['id'] . ">" . $cpu['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw gpu</p>
        <select class="btn btn-primary dropdown-toggle" name="gpu" id="gpu">
            <?php
            while ($gpu = $gpus->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $gpu['id'] . ">" . $gpu['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw case</p>
        <select class="btn btn-primary dropdown-toggle" name="cases" id="cases">
            <?php
            while ($case = $cases->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $case['id'] . ">" . $case['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw cooling</p>
        <select class="btn btn-primary dropdown-toggle" name="cooling" id="cooling">
            <?php
            while ($cool = $cooling->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $cool['id'] . ">" . $cool['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw ram</p>
        <select class="btn btn-primary dropdown-toggle" name="ram" id="ram">
            <?php
            while ($rams = $ram->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $rams['id'] . ">" . $rams['naam'] . "</option>";
            }
            ?>
        </select>

        <p>Selecteer uw ssd</p>
        <select class="btn btn-primary dropdown-toggle" name="ssd" id="ssd">
            <?php
            while ($ssds = $ssd->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $ssds['id'] . ">" . $ssds['naam'] . "</option>";
            }
            ?>
        </select>
        <input class="btn btn-secondary" type="submit" name="submit" value="Voeg toe aan winkelwagen"/>
    </form>
</div>