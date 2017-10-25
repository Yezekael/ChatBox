$(document).ready(function(){
    $("#submitLogin").on('click', function() {
        $.post(
            './PHP/login.php',
            {login: $("nickname").val(), password: $("password").val()},
            function(data){
                if (data=='success'){
                    $("#result").html("<p>Connection success !</p>");
                } else {
                    $("#result").html("<p>Connection failed...</p>");
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
                    modifyHeader();
                } else {
                    $("#resultRegister").html('<span class="text-danger">' + data.error + '</span>');
                    $('#resultRegister').removeClass('hidden');
                }
            },
            'json'
        );
    });
    $('#registerModal').on('hidden.bs.modal', function() {
        resetRegister();
    });
});

function resetRegister() {
    $("#resultRegister").html('');
    $('#resultRegister').addClass('hidden');
    $('#username-register').val('');
    $('#password-register').val('');
    $('#mail-register').val('');
}

function modifyHeader() {
    //TODO Définir différents headers
}
