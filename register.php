<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="redaction.css" type="text/css">
    <?php
    include "db.php";
    include_once ('header.php');
    $mdp = $pseudo = $nom = $mail = $prenom = "";
    $mdperreur = $pseudoerreur = $nomerreur = $mailerreur = $prenomerreur = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom1"])) {
            $nomerreur = "Il faut mettre un nom";
        } else {
            $nom = test_saisie($_POST["nom1"]);
        }
        if (empty($_POST["prenom1"])) {
            $prenomerreur = "Il faut mettre un prenom";
        } else {
            $prenom = test_saisie($_POST["prenom1"]);
        }
        if (empty($_POST["mail"])) {
            $mailerreur = "<strong>Il faut mettre une adresse mail</strong>";
        } else {
            $mail = test_saisie($_POST["mail"]);
        }
        if (empty($_POST["mdp1"])) {
            $mdperreur = "Il faut mettre un mot de passe";
        } else {
            $mdp = test_saisie($_POST["mdp1"]);
        }
        if (empty($_POST["pseudo"])) {
            $pseudoerreur = "Il faut mettre un pseudo";
        } else {
            $pseudo = test_saisie($_POST["pseudo"]);
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sujet = test_saisie($_POST["nom1"]);
        $texte = test_saisie($_POST["prenom1"]);
        $sujet = test_saisie($_POST["mail"]);
        $texte = test_saisie($_POST["mdp1"]);
        $sujet = test_saisie($_POST["pseudo"]);
    }
    function test_saisie($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</head>
<body>
<p id="titre"> Remplissez les champs </p>

<form action="register.php" method="post">
    Nom : <input type="text" name="nom1" id="sujet">
    <span class="error"> <?php echo $nomerreur;?></span>
    <br><br>
    Prenom : <input type="text" name="prenom1" id="txt">
    <span class="error"> <?php echo $prenomerreur;?></span>
    <br><br>
    Mail : <input type="text" name="mail" id="txt">
    <span class="error"> <?php echo $mailerreur;?></span>
    <br><br>
    MDP : <input type="text" name="mdp1" id="txt">
    <span class="error"> <?php echo $mdperreur;?></span>
    <br><br>
    Pseudo : <input type="text" name="pseudo" id="txt">
    <span class="error"> <?php echo $pseudoerreur;?></span>
    <br><br>
    <input type="submit" name="enregistrer" value="Valider">
</form>

<?php
if (isset($_POST['enregistrer']))
{
    $nom = $_POST['nom1'];
    $prenom = $_POST['prenom1'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp1'];
    $pseudo = $_POST['pseudo'];
    $Requetepseudo = $pdo->prepare('SELECT * FROM redacteur WHERE pseudo = ?');
    $Requetepseudo->execute([$_POST['pseudo'],]);
    $donneespseudo=$Requetepseudo->fetch();
    $Requetemail = $pdo->prepare('SELECT * FROM redacteur WHERE adressemail = ?');
    $Requetemail->execute([$_POST['mail'],]);
    $donneesmail=$Requetemail->fetch();
    //si le pseudo entré  ou le mail est égal à un pseudo de la base de données
    if ($_POST['pseudo'] == $donneespseudo['pseudo']) {
        echo "<strong>Ce pseudo est déjà pris, veuillez en choisir un autre</strong>";
    }
    else if($_POST['mail'] == $donneesmail['mail']){
        echo "<strong>Cette adresse mail est déjà prise, veuillez en choisir une autre</strong>";
    }
    else{
  //sinon on insere les données
    $inscription_data = "INSERT INTO redacteur (nom,prenom,adressemail,motdepasse,pseudo) VALUES('$nom','$pseudo','$mail','$mdp','$pseudo')";
    $res = $pdo->query($inscription_data);

    }
}
include_once ("footer.php")
?>
</body>
</html>
