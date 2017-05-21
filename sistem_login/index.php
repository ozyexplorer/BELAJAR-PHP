<?php

    require_once "core/init.php";

    if(!isset($_SESSION['user']))
    {
        header("location: login.php");
    }
?>


<h1>HALAMAN PROFIL <?php echo $_SESSION['user']; ?></h1>
<br>

<a href="logout.php">Logout</a>