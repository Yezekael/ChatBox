$(document).ready(function(){
  $("submit").click(function{
    $.post(
      'login.php',
      {
        login: $("nickname").val(),
        password: $("password").val()
      },
      function(data){
        if (data=='success'){
          $("#result").html("<p>Connection success !</p>");
        }
        else{
          $("#result").html("<p>Connection failed...</p>");
        }
      },
      'json'
    );
  });
});
