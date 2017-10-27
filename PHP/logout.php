<?php
    include('config.php');
    session_start();
    
    session_unset();

    if (isset($_SESSION['username']) || isset($_SESSION['id'])) {
        echo json_encode(array('success' => 'false'));
    } else {
        echo json_encode(array('success' => 'true'));
    }
?>
