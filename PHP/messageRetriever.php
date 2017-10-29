<?php
    include('config.php');
    session_start();

    if (isset($_SESSION['id'])) {
        if (! isset($_SESSION['last_message_id'])) {
            $req = $pdo->prepare('SELECT m.id, m.content, m.user_id, u.username FROM `message` AS m JOIN `user` AS u ON u.id = m.user_id ORDER BY m.id DESC LIMIT 25');
            $results = $req->execute();
            if ($results) {
                $messages = $req->fetchAll();
                if (count($messages) != 0) {
                    $messages = array_reverse($messages);
                    $_SESSION['last_message_id'] = $messages[sizeof($messages)-1]['id'];
                    echo json_encode(array('success' => 'true', 'messages' => $messages));
                } else {
                    $_SESSION['last_message_id'] = 0;
                    echo json_encode(array('success' => 'false', 'error' => 'No message to display.'));
                }
            } else {
                echo json_encode(array('success' => 'false', 'error' => 'Error while retrieving messages in DB.'));
            }
        } else {
            $req = $pdo->prepare('SELECT m.id, m.content, m.user_id, u.username FROM `message` AS m JOIN `user` AS u ON m.user_id = u.id WHERE m.id > :id AND m.user_id != :user_id ORDER BY m.id ASC');
            $results = $req->execute(array(':id' => $_SESSION['last_message_id'], ':user_id' => $_SESSION['id']));
            if ($results) {
                $messages = $req->fetchAll();
                if (count($messages) != 0) {
                    $_SESSION['last_message_id'] = $messages[sizeof($messages)-1]['id'];
                    echo json_encode(array('success' => 'true', 'messages' => $messages));
                } else {
                    echo json_encode(array('success' => 'false', 'error' => 'No message to display.'));
                }
            } else {
                echo json_encode(array('success' => 'false', 'error' => 'Error while retrieving messages in DB.'));
            }
        }
    } else {
        echo json_encode(array('success' => 'false', 'error' => 'Please log in.'));
    }
