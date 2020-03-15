<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include_once('header.php')
     ?>
    <?php
    /*
    Page: connexion.php
    */
    $db_name="projet";
    $sql_name="root";
    $sql_pass="";
    $server_name="localhost";
    session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
    if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé

        if (empty($_POST['pseudo']) || empty($_POST['motdepasse']) ) {
            echo "<br>Le formulaire a été mal rempli, veuillez revérifier";
        }
             else {
                // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
                $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
                $MotDePasse = htmlentities($_POST['motdepasse'], ENT_QUOTES, "ISO-8859-1");
                //on se connecte à la base de données:
                $mysqli= mysqli_connect($server_name,$sql_name,$sql_pass,$db_name);
                //on vérifie que la connexion s'effectue correctement:
                if(!$mysqli){
                    echo "Erreur de connexion à la base de données.";
                } else {
                    // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                    $Requete = mysqli_query($mysqli,"SELECT * FROM redacteur WHERE pseudo = '".$Pseudo."' AND motdepasse = '".$MotDePasse."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                    // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                    // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                    if(mysqli_num_rows($Requete) == 0) {
                        echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                    } else {
                        echo "<br>";
                        // on ouvre la session avec $_SESSION:
                        $_SESSION['pseudo'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                        echo "Félicitation ";
                        echo $_SESSION['pseudo'] = $Pseudo;
                        echo ", vous êtes à présent connecté !";
                        echo ' Revenir à l\'accueil : '; echo '<a href="accueil.php">cliquez ici</a>';

                    }
                }
            }
        }

    ?><br>
    <form method="post" action="">
      <fieldset>
      <legend>Connexion</legend>
      <p>
      <label for="pseudo" class="center">Pseudo : </label><input name="pseudo" type="text" /><br /><br>
      <label for="motdepasse" class="center">Mot de Passe : </label><input type="password" name="motdepasse"/>
      </p>
      </fieldset>
      <p><button type="submit" value="Connexion" name="connexion"/>Connexion</button></p></form>
      <a href="./register.php">Pas encore inscrit ?</a>
      <?php
      include_once('footer.php')
       ?>
  </body>
</html>
