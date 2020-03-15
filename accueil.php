<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Accueil</title>
  </head>
  <body>
    <?php
    include ('db.php');
    include_once('header.php');
     ?>

<h2 class="c">Bienvenue sur le site des actualités boursières</h2>
<p class="c">

      <?php
    if (isset($_SESSION['pseudo'])){
      echo "Vous êtes connecté ! Vous pouvez donc :<br>";
      echo "<br>";
      echo '<a href="redaction.php">Ecrire un article</a><br><br>';
      echo "Ou alors..<br><br>";
       echo '<a href="deconnexion.php">Se déconnecter</a><br>';
    }
    else {
      echo '<a href="connexion.php">Page de connexion</a><br>';
    }
      ?>

</p>
  </body>
</html>
