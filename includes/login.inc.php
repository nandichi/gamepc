<div class="loginform">
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['melding]'])) {
        echo '<p>' . $_SESSION['melding'] . '<p>';
        unset($_SESSION['melding']);
    }
    ?>

    <form action="php/login.php" method="post">
        <p>gebruikersnaam</p>
        <input type="text" name="username" placeholder="gebruikersnaam" required/>
        <p>wachtwoord</p>
        <input type="password" name="password" placeholder="Wachtwoord" required/>
        <button class="btn btn-primary" type="submit">Login</button>
        <button class="btn btn-primary" style="float:left" onclick="window.location.href='index.php?page=registreer';">
            registreer
        </button>
    </form>
</div>
