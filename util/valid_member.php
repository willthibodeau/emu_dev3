<?php
    // make sure the user is logged in as a valid administrator
    if (!isset($_SESSION['member'])) {
        header('Location: ../errors/error.php' );
    }
?>