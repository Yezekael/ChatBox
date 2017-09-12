$(document).ready(function(){
  $("submit").click(function{
    $.post(
      'register.php',
      {
        login: $("nickname").val(),
        email: $("email").val(),
        password: $("email").val()
      },
      function(data){
        if (data=='success'){
          $("#result").html("<p>Registration success !</p>");
        }
        else{
          $("#result").html("<p>Registration failed...</p>");
        }
      },
      'json'
    );
  });
});
