<?php
    session_start();

    if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
        echo 'Validé - ' . $_SESSION['id'] . ' - ' . $_SESSION['username'];
        if (isset($_SESSION['last_message_id'])) {
            echo $_SESSION['last_message_id'];
        } else {
            echo 'None.';
        }
    } else {
        echo 'Invalidé';
    }
?>
