<div class="loginform">
    <h1>Register</h1>
    <form action="../php/registreer.php" method="post">
        <input type="text" name="voornaam" placeholder="voornaam" required>
        <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel">
        <input type="text" name="achternaam" placeholder="achternaam" required>
        <input type="text" name="woonplaats" placeholder="woonplaats" required>
        <input type="text" name="straat" placeholder="straat" required>
        <input type="text" name="huisnummer" placeholder="huisnummer" required>
        <input type="text" name="postcode" placeholder="postcode" required minlength="6">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required minlength="5">
        <button type="submit">Register</button>
        <form>
            <label for="role">role:</label>
            <select id="role" name="role">
                <option value="klant">klant</option>
            </select>
        </form>
    </form>
</div>
