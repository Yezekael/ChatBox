<?php
    include('config.php');
    session_start();

    $req = $pdo->prepare("UPDATE `user` SET last_logout = NOW() WHERE id = :id");
    $results = $req->execute(array(':id' => $_SESSION['id']));
    echo json_encode($results);

    session_unset();

    if (isset($_SESSION['username']) || isset($_SESSION['id'])) {
        echo json_encode(array('success' => 'false'));
    } else {
        echo json_encode(array('success' => 'true'));
    }
?>
