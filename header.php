<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
  </head>
  <body>
    <header class="header-fixed">
    <div class="header-limiter">
  		<h1><a href="#">Toutes les <span>News</span></a></h1>
  		<nav>
  			<a href="accueil.php">Accueil</a>
  			<a href="news.php">Blog</a>
<?php
include('db.php');
session_start();
 if (isset($_SESSION['pseudo'])){
      echo "<a>";
      echo "Vous êtes connecté en tant que : ";
      echo $_SESSION['pseudo'];
      echo "</a>";
      echo "<a><a href='deconnexion.php'>Se déconnecter</a></a>";
    }
?>
  </nav>
</div>
</body>
</html>
