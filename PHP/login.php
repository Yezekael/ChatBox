<?php
    include('config.php');

    $nickname = trim($_GET['nickname']);
    $password = trim($_GET['password']);

    if ($nickname && $password) {
        $password = sha1($password);
        $req = $pdo->prepare("SELECT * FROM `user` WHERE nickname = :nickname AND password = :password");
        $results = $req->execute(array(':nickname' => $nickname, ':password' => $password));
        $user = $req->fetchAll();
        if ($results) {
            if (count($user) == 1) {
                echo ('success' => 'true');
            } else {
                echo ('success' => 'false', 'error' => 'Username et/ou mot de passe incorrects.');
            }
        } else {
            echo ('success' => 'false', 'error' => 'Erreur en BDD.');
        }
    }
?>
