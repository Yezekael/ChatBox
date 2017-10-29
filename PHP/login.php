<?php
    include('config.php');
    session_start();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username && $password) {
        $password = sha1($password);
        $req = $pdo->prepare("SELECT * FROM `user` WHERE username = :username AND password = :password");
        $results = $req->execute(array(':username' => $username, ':password' => $password));
        $user = $req->fetchAll();
        if ($results) {
            if (count($user) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $user[0]['id'];
                echo json_encode(array('success' => 'true', 'username' => $username, 'userId' => $_SESSION['id']));
            } else {
                echo json_encode(array('success' => 'false', 'error' => 'Username and password incorrect.'));
            }
        } else {
            echo json_encode(array('success' => 'false', 'error' => 'Error while fetching user in DB.'));
        }
    } else {
        echo json_encode(array('success' => 'false', 'error' => 'Please complete all the fields.'));
    }
?>
