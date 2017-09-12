$(document).ready(function(){
  $("submit").click(function{
    $.post(
      'login.php',
      {
        login: $("nickname").val(),
        password: $("password").val()
      },
      'json'
    );
  });
});
