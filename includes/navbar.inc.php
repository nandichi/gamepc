<div class="wrapper">
    <ul class="nav-area">
        <li><a href=index.php?page=homepage>home</a> </li>
        <li><a href=index.php?page=pcbuild>pc-bouwen</a> </li>
        <li><a href=index.php?page=registreer>registreer</a> </li>
        <?php
        if (in_array("URID", $_SESSION)) {
            echo "<li><a href=index.php?page=logout>logout</a> </li>";
        } else {
            echo "<li><a href=index.php?page=login>login</a> </li>";
        }
        ?>
    </ul>
</div>