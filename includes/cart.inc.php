<?php

include 'private/connection.php';

/*
 * stappen
 * 1. Selectie cart + pcbuild in een Select(Join) zetten.
 * 2. Explode pcbuild ids naar array.
 * 3. elk ID ophalen in de database.
 * 4. tonen van de info in HTML.
 */
?>



<h1 class="checkout">winkelmandje</h1>

<ol class="list-group list-group-numbered">
    <li class="list-group-item">moederbord</li>
    <li class="list-group-item">cpu</li>
    <li class="list-group-item">gpu</li>
    <li class="list-group-item">case</li>
    <li class="list-group-item">cooling</li>
    <li class="list-group-item">ram</li>
    <li class="list-group-item">ssd</li>
</ol>