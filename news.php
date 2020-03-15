<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php include 'header.php';
          include 'db.php';
          ?>
    <h2 class='c'>Vous trouverez ici tous les sujets concernant l'actualité</h2>

    <?php

  if (isset($_SESSION['pseudo'])){
    echo "
    <form name='search' method='post' action='searchbar.php'>
      <table>
        <tr>
          <p class='c'>Recherche d'un article
          <input name='var1' type='text' id='var1'>
          <input type='submit' value='Search'>
        </tr>
      </table>
    </form>
    </p>";
    $resultat = $pdo->query('SELECT * FROM sujet');
    while($donnees = $resultat->fetch()) {
        echo "<p class='news'>Article n°:". $donnees['idsujet']."<br>" ." Titre : " . $donnees["titresujet"] ."<br> Texte complet : <a href=choose.php?sujet=".$donnees['idsujet'].">Lire le sujet</a>"; ;
    }

    }
    else {
      echo "<p class='c'>Veuillez vous<a href='connexion.php'> connecter</a> pour accéder à la page</a><br></p>";
    }
     ?>
  </body>
</html>
