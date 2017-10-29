var userId;
var messageInterval = setInterval(function() { retrieveMessage(); }, 500);

$(document).ready(function(){
    $("#submitLogin").on('click', function() {
        $("#resultLogin").html('');
        $('#resultLogin').addClass('hidden');
        $.post(
            './PHP/login.php',
            $('#login-form').serialize(),
            function(data){
                if (data.success == 'true'){
                    $('#loginModal').modal('toggle');
                    userId = data.userId;
                    resetLogin();
                    modifyDisplay(1, data.username);
                    retrieveMessage();
                } else {
                    $("#resultLogin").html('<span class="text-danger">' + data.error + '</span>');
                    $('#resultLogin').removeClass('hidden');
                }
            },
            'json'
        );
    });
    $("#submitRegister").on('click', function() {
        $("#resultRegister").html('');
        $('#resultRegister').addClass('hidden');
        $.post(
            './PHP/register.php',
            $('#register-form').serialize(),
            function(data){
                if (data.success == 'true'){
                    $('#registerModal').modal('toggle');
                    userId = data.userId;
                    resetRegister();
                    modifyDisplay(1, data.username);
                    retrieveMessage();
                } else {
                    $("#resultRegister").html('<span class="text-danger">' + data.error + '</span>');
                    $('#resultRegister').removeClass('hidden');
                }
            },
            'json'
        );
    });
    $('#logout-button').on('click', function() {
        $.post(
            './PHP/logout.php',
            function(data){
                if (data.success == 'true') {
                    modifyDisplay(0, '');
                    $('.chatlogs').html('');
                }
            },
            'json'
        );
    });
    $('#sendMessage').on('click', function(){
        $.post(
            './PHP/messageHandler.php',
            {message : $('#message').val()},
            function(data){
                if (data.success == 'true') {
                    $('#message').val('');
                    $('.chatlogs').append('<div class="text-right"><dt>' + data.username + '</dt></div><div class="chat self"><div class="user_photo"><img src="img/UserTwo.png"></div><p class="chat_message">' + data.message + '</p></div>');
                }
            },
            'json'
        );
    });
    $('#registerModal').on('hidden.bs.modal', function() {
        resetRegister();
    });
    $('#loginModal').on('hidden.bs.modal', function() {
        resetLogin();
    });
});

function resetRegister() {
    $("#resultRegister").html('');
    $('#resultRegister').addClass('hidden');
    $('#username-register').val('');
    $('#password-register').val('');
    $('#mail-register').val('');
}

function resetLogin() {
    $("#resultLogin").html('');
    $('#resultLogin').addClass('hidden');
    $('#username-login').val('');
    $('#password-login').val('');
}

function modifyDisplay(login, username) {
    if (login == 1){
        $('#greetings').html('Hi ' + username + '!')
        $('#menu-logged').removeClass('hidden');
        $('#menu').addClass('hidden');
        $('.chatbox').removeClass('hidden');
        $('.games').removeClass('hidden');
    } else {
        $('#greetings').html('');
        $('#menu-logged').addClass('hidden');
        $('#menu').removeClass('hidden');
        $('.chatbox').addClass('hidden');
        $('.games').addClass('hidden');
    }
}

function retrieveMessage() {
    $.post(
        './PHP/messageRetriever.php',
        function(data) {
            if (data.success == 'true') {
                data.messages.forEach(function(element){
                    if (element.user_id == userId) {
                        $('.chatlogs').append('<div class="text-right"><dt>' + element.username + '</dt></div><div class="chat self"><div class="user_photo"><img src="img/UserTwo.png"></div><p class="chat_message">' + element.content + '</p></div>');
                    } else {
                        $('.chatlogs').append('<div class="text-left"><dt>' + element.username + '</dt></div><div class="chat friend"><div class="user_photo"><img src="img/UserOne.png"></div><p class="chat_message">' + element.content + '</p></div>');
                    }
                });
            }
        },
        'json'
    );
}

function isset(element) {
    return(typeof element !== 'undefined');
}

function testSession() {
    $.post(
        './PHP/sessionState.php',
        function(data){
            console.log(data);
        }
    );
}
