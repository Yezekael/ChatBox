<?php

try {
  $bdd = new ('mysql:host=localhost;dbname=bidule; charset=utf-8', 'root', '');
}
catch(Exception $e){
  die('blabla:' .$e ->getMessage());
}

$reponse=$bdd->query('SELECT username, message FROM chat ORDER BY ID DESC');

while($donnees = $ reponse->fetch()){
  echo '<p><strong>'.($donnees['username'])'</strong>'.($message['message'])'</p>'
$reponse->closeCursor
}
?>
