<?php
require_once ('db.php');
require_once ('header.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <title>Article</title>
    </head>
    <body><p class="center">

<?php
    $comerreur ="";
    $commentaire = $idredacteur = $idsujet = $sujet= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["commentaire"])) { // test de champ
            $comerreur = "Votre commentaire est vide, il faut mettre un commentaire";
        } else {
            $commentaire = test_saisie($_POST["commentaire"]);
        }
    }
    function test_saisie($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $sujet=$_GET['sujet'];
    $result=$pdo->query('SELECT * FROM sujet where idsujet='.$sujet);
    while ($donnees = $result->fetch()){
    echo "<p>Titre du sujet :" . $donnees['titresujet'] . "<br><br>" . " Texte du sujet :" . $donnees["textesujet"];
}
?>
<form method="post" action="choose.php">
<fieldset>
<legend>Commentaire</legend>
<p>
<label for="texte_reponse">Texte :</label><input type="textarea" name="texte_reponse"  id="texte_reponse">
</p>
</fieldset>
<p><input name="annuler" id="annuler" type="submit" value="Annuler" />
<input name="creer" id="creer" type="submit" value="Créer" /></p>
</form>
</body>
    <?php
    $v_idredac=$_SESSION['idredacteur'];
    $v_idsujet=$sujet;
    if (isset($_POST['poster'])){
            $ajout = $pdo->prepare ('INSERT INTO sujet (idsujet, idredacteur,textereponse) VALUES (:idsujet,:idredac,:texterep)');
            $ajout->execute(array('idredac'=>$v_idredac,'texterep'=>$v_texterep));
    }
    if (isset($_POST['annuler'])){
        header('location:accueil.php');
    }
    $res = $pdo->query('SELECT * FROM reponse');
    while ($ligne = $res->fetch()){
        echo "<div class='commentbox'>";
        echo "<br>";
        echo $ligne['daterep'],"<br>";
        echo $ligne['textereponse'];
        echo "</div>";
    }
    ?>
    </p>
</html>
