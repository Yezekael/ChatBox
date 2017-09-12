<?php
    include('config.php');

    $nickname = trim($_GET['nickname']);
    $email = trim($_GET['email']);
    $password = trim($_GET['password']);

    if ($nickname && $email && $password) {
        $password = sha1($password);
        $req = $pdo->prepare('INSERT INTO `user` (nickname, email, password, last_logout) VALUES (:nickname, :email, :password, NOW())');
        $results = $req->execute(array(':nickname' => $nickname, ':email' => $email, ':password' => $password));
        if ($results) {
            echo json_encode(array('success' => 'true'));
            return true;
        } else {
            echo json_encode(array('success' => 'false', 'error' => 'Erreur lors de l\'entrée en BDD.'));
        }
    } else {
        echo json_encode(array('success' => 'false', 'error' => 'Veuillez renseigner tous les champs.'));
    }
?>
