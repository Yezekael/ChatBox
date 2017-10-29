<?php
    $dbhost = 'localhost';
    $dbname = 'chatbox';
    $dbuser = 'root';
    $dbpassword = '';

    
    $dsn = 'mysql:dbname=' . $dbname . ';' . $dbhost;
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
?>
