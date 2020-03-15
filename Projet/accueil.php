<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
  </head>
  <body>
    <?php
    include_once('header.php')
     ?>
    <?php
    session_start();
    if (isset($_SESSION['pseudo'])){
      echo "Bonjour, vous êtes connecté ! ";
       echo '<a href="deconnexion.php">Je veux me déconnecter</a><br>';
    }
    else {
      echo '<a href="connexion.php">Page de connexion</a><br>';
    }
      ?>
    Voici la page d'accueil du site, qui regroupera un grand nombre de news !

<br>
<?php
include_once('footer.php')
 ?>

  </body>
</html>
