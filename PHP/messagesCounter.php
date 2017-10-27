<?php
    include('config.php');
    session_start();

    if (isset($_SESSION['id']) && is_numeric($_SESSION['id'])) {
        $userId = (int) $_SESSION['id'];
        $req = $pdo->prepare('SELECT COUNT(id)
                            FROM MESSAGE AS mess
                            INNER JOIN CONVERSATION AS con ON con.id = mess.conversation
                            INNER JOIN USER_CONVERSATION AS us_con ON us_con.conversation = con.id
                            INNER JOIN USER AS us ON us.id = us_con.user
                            WHERE mess.date > us.last_logout AND us.id = :userId
                            GROUP BY con.id');
        $results = $req->execute(array(':userId' => $userId));
        echo(json_encode($results));
    }

?>
