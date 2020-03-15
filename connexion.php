<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'db.php';
    include_once('header.php')
     ?>
     <p class="center">
    <?php

    if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé

        if (empty($_POST['pseudo']) || empty($_POST['motdepasse']) ) {
            echo "<br>Le formulaire a été mal rempli, veuillez revérifier";
        }
             else {
                $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1");
                $MotDePasse = htmlentities($_POST['motdepasse'], ENT_QUOTES, "ISO-8859-1");
                //connexion à la base de données:

                if(!$pdo){
                    echo "Erreur de connexion à la base de données.";
                } else {
                    // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                    $Requete = $pdo->prepare('SELECT * FROM redacteur WHERE pseudo = ?');
                    $Requete->execute([$_POST['pseudo'],]);
                    $donnees=$Requete->fetch();

if (($_POST['motdepasse'])==$donnees['motdepasse'])
{
  $_SESSION['pseudo']= $donnees['pseudo'];
  $_SESSION['motdepasse']= $donnees['motdepasse'];
  $_SESSION['idredacteur']= $donnees['idredacteur'];
  header('Location: news.php');
}
else {
  echo "Non";
}

                    }
                }

        }

    ?>
  </p>
    <form method="POST" action="">

      <fieldset class="c">
        <legend>Connexion</legend>
      <p>
      <label for="pseudo"> Pseudo : </label><input name="pseudo" type="text" /><br /><br>
      <label for="motdepasse">Mot de Passe : </label><input type="password" name="motdepasse"/>
      </p>
      </fieldset>
      <p class="c"><button type="submit" value="Connexion" name="connexion"/>Connexion</button></form>
      <a href="./register.php" class="footer">Pas encore inscrit ?</a></p>

  </body>
</html>
