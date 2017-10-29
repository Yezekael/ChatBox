<?php session_start(); ?>
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
    <div id="menu" class="navbar <?php echo isset($_SESSION['id']) ? 'hidden' : '' ?>">
        <a data-toggle="modal" data-target="#registerModal">Register</a>
        <a data-toggle="modal" data-target="#loginModal">Login</a>
    </div>
    <div id="menu-logged" class="navbar <?php echo isset($_SESSION['id']) ? '' : 'hidden' ?>">
        <p id="greetings"><?php echo isset($_SESSION['username']) ? 'Hi ' . $_SESSION['username'] . '!' : '' ?></p>
        <a id="logout-button">Logout</a>
    </div>

    <div class="chatbox <?php echo isset($_SESSION['id']) ? '' : 'hidden' ?>">
        <div class="chatlogs">
            <!-- MESSAGE SAMPLES DO NOT UNCOMMENT -->
            <!-- <div class="chat friend">
                <div class="user_photo"><img src="img/UserOne.png"></div>
                <p class="chat_message">Hello World !</p>
            </div>
            <div class="chat self">
                <div class="user_photo"><img src="img/UserTwo.png"></div>
                <p class="chat_message">Hello World !!</p>
            </div> -->
        </div>


        <div class="chat_form" id="chat_form">
            <textarea id="message"></textarea>
            <button type="button" id="sendMessage">Send</button>
        </div>
    </div>

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
                        <label>Username :</label>
                        <input type="text" name="username" id="username-login"/>
                        <label>Password :</label>
                        <input type="password" name="password" id="password-login"/>
                    </form>
                    <div id="resultLogin" class="hidden"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" value="Login" id="submitLogin"/>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
