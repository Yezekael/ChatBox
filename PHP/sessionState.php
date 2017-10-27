<?php
    session_start();

    if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
        echo 'Validé';
    } else {
        echo 'Invalidé';
    }
?>
