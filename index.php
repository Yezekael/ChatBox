<!DOCTYPE html>
<html>
<head>
    <title>ChatBox</title>
    <meta charset="utf-8"/>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Fichiers persos -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="index.js"></script>
</head>

<body>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#registerModal">Register</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">Login</button>

    <!-- <fieldset>
    <div id="tchat">
    <form action="#" method="post">
    <input type="text" id="message">
    <button type="button" id"send" title="Send"></button>
    </form>
    </div>
    </fieldset> -->


    <!-- <div class="chatbox">
    <div class="chatlogs">
    <div class="chat friend" id="chat_friend">
    <div class="user_photo"><img src="img/UserOne.png"></div>
    <p class="chat_message" id="message">Hello World !</p>
    </div>
    <div class="chat self">
    <div class="user_photo"><img src="img/UserTwo.png"></div>
    <p class="chat_message">Hello World !!</p>
    </div>
    </div> -->


    <!-- <div class="chat_form" id="chat_form">
    <textarea id="msg"></textarea>
    <button type="button" id="send">Send</button>
    </div>
    </div>
    </div> -->



    <!-- <script>
    $(function() {
    afficheConversation();
    $('#send').click(function() {
    var message = $('#msg').val();
    $.post('chat.php', {
    'msg': message
    }, afficheConversation);
    });

    function afficheConversation() {
    $('#msg').val('');
    $('#msg').focus();
    }
    setInterval(afficheConversation, 4000);
    });

    </script> -->

    <!-- <div id="messages">
    <?php
    // try
    // {
    //     $bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root', '');
    // }
    // catch (Exception $e)
    // {
    //     die('Erreur : ' . $e->getMessage());
    // }
    // $requete = $bdd->query('SELECT * FROM messages ORDER BY id DESC LIMIT 0,10');
    // while($donnees = $requete->fetch()){
    //     echo "<p id=\"" . $donnees['id'] . "\">" . $donnees['pseudo'] . " dit : " . $donnees['message'] . "</p>";
    // }
    // $requete->closeCursor();
    ?>
    </div>
    <form method="POST" action="traitement.php">
    Pseudo : <input type="text" name="pseudo" id="pseudo" /><br />
    Message : <textarea name="message" id="message"></textarea><br />
    <input type="submit" name="submit" value="Envoyez votre message !" id="envoi" />
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="main.js"></script> -->

    <!-- MODAL D'INSCRIPTION -->
    <div id="registerModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Register</h4>
                </div>
                <div class="modal-body">
                    <form id="register-form" method="post">
                        <label>Username :</label>
                        <input type="text" name="username" id="username-register"/>
                        <label>Password :</label>
                        <input type="password" name="password" id="password-register"/>
                        <label>Mail :</label>
                        <input type="email" name="mail" id="mail-register"/>
                    </form>
                    <div id="resultRegister" class="hidden"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" value="Register" id="submitRegister"/>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE CONNEXION -->
    <div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form id="login-form" method="post">
                        <label>UserName :</label>
                        <input type="text" name="username" id="username-login"/>
                        <label>Password :</label>
                        <input type="password" name="password" id="password-login"/>
                    </form>
                <div class="modal-footer">
                    <input type="button" value="Login" id="submitLogin"/>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
