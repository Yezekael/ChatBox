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
                    resetLogin();
                    modifyHeader(1, data.username);
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
                    resetRegister();
                    modifyHeader(1, data.username);
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
                    modifyHeader(0, '');
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

function modifyHeader(login, username) {
    if (login == 1){
        $('#greetings').html('Hi ' + username + '!')
        $('#menu-logged').removeClass('hidden');
        $('#menu').addClass('hidden');
    } else {
        $('#greetings').html('');
        $('#menu-logged').addClass('hidden');
        $('#menu').removeClass('hidden');
    }
}

function testSession() {
    $.post(
        './PHP/sessionState.php',
        function(data){
            console.log(data);
        }
    );
}
