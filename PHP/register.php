<?php
    include('config.php');
    session_start();

    $username = trim($_POST['username']);
    $mail = trim($_POST['mail']);
    $password = trim($_POST['password']);

    if ($username && $mail && $password) {
        $req = $pdo->prepare('SELECT COUNT(*) FROM `user` WHERE `username` = :username');
        $results = $req->execute(array(':username' => $username));
        if ($results && $req->fetchColumn() == 0) {
            $req = $pdo->prepare('SELECT COUNT(*) FROM `user` WHERE `mail` = :mail');
            $results = $req->execute(array(':mail' => $mail));
            if ($results && $req->fetchColumn() == 0) {
                $password = sha1($password);
                $req = $pdo->prepare('INSERT INTO `user` (username, mail, password, last_logout) VALUES (:username, :mail, :password, NOW())');
                $results = $req->execute(array(':username' => $username, ':mail' => $mail, ':password' => $password));
                if ($results) {
                    echo json_encode(array('success' => 'true', 'username' => $username));
                    $req = $pdo->prepare('SELECT id FROM `user` WHERE `mail` = :mail');
                    $results = $req->execute(array(':mail' => $mail));
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $req->fetchColumn();
                } else {
                    echo json_encode(array('success' => 'false', 'error' => 'Could not create user in DB.'));
                }
            } else {
                echo json_encode(array('success' => 'false', 'error' => 'E-Mail address already linked to an account.'));
            }
        } else {
            echo json_encode(array('success' => 'false', 'error' => 'Username already exists.'));
        }
    } else {
        echo json_encode(array('success' => 'false', 'error' => 'Please complete all the fields.'));
    }
?>
