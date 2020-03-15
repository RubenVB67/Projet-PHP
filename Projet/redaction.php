<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Page de rédaction</title>
    <link rel="stylesheet" href="redaction.css" type="text/css">
    <script type="text/javascript" src="redaction.js"></script>
    <?php
    $sujet = $texte = $sujeterreur = $texteerreur = $reponse = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sujet"])) {
            $sujeterreur = "Il faut mettre un sujet";
        } else {
            $sujet = test_saisie($_POST["sujet"]);
        }

        if (empty($_POST["txt"])) {
            $texteerreur = "Il faut mettre du texte";
        } else {
            $texte = test_saisie($_POST["txt"]);
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sujet = test_saisie($_POST["sujet"]);
        $texte = test_saisie($_POST["txt"]);
    }

    function test_saisie($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['annuler']))
    {
        choix();
    }
    ?>

</head>
<body>
<p id="titre"> Mettez un titre de sujet et le texte de votre blog (remplissez bien tout les champs) </p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Sujet : <input type="text" name="sujet" id="sujet">
    <span class="error"> <?php echo $sujeterreur;?></span>
    <br><br>
    Texte : <textarea name="txt" id="txt" rows="10" cols="40"></textarea>
    <span class="error"> <?php echo $texteerreur;?></span>
    <br><br>
    <input type="submit" name="enregistrer" value="Enregistrer">
    <input type="submit" name="annuler" value="Annuler">
    <a id="accueil" href="accueil.php"></a>
</form>

<?php
?>

</body>
</html>



