<?php
    include('config.php');
    session_start();

    $message = trim($_POST['message']);

    if (isset($_SESSION['id'])) {
        if ($message && $message != 'undefined') {
            $req = $pdo->prepare('INSERT INTO `message` (`content`, `date`, `user_id`) VALUES (:content, NOW(), :user_id)');
            $results = $req->execute(array(':content' => $message, ':user_id' => $_SESSION['id']));

            if ($results) {
                echo json_encode(array('success' => 'true', 'message' => $message, 'username' => $_SESSION['username']));
            } else {
                echo json_encode(array('success' => 'false', 'error' => 'Error while writing message in DB.'));
            }
        } else {
            echo json_encode(array('success' => 'false', 'error' => 'Please enter a message.'));
        }
    } else {
        echo json_encode(array('success' => 'false', 'error' => 'Please log in.'));
    }
?>
