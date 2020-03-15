
<html>
<title> Page d'accueil</title>
	<head>
<?php
include 'header.php';
$v_erreur=array();
for ($i=0;$i<3;$i++)
{
$v_erreur[$i]="";
}
$v_correct =false ;
$v_idredac=$_SESSION['idredacteur'];
$v_nomsuj="";
$v_textesuj="";
if (isset($_POST['creer']))
{
$v_correct = true;
$v_etoile = "Champ requis";
if (empty($_POST['nom_sujet']))
{
$v_correct = false;
$v_erreur[1] = $v_etoile;
}
else $v_nomsuj = $_POST['nom_sujet'];
if (empty($_POST['texte_sujet']))
{
$v_correct = false;
$v_erreur[2] = $v_etoile;
}
else $v_textesuj = $_POST['texte_sujet'];
}
if (isset($_POST['annuler']))
{
	header("location: accueil.php");
}
?>
	</head>
	<body>

	<?php
if (!$v_correct)
{
?>
<p class="center">
<b>Nouveau sujet : </b><br>
	<form method="post" action="redaction.php">
	<fieldset>
	<p class="c">
	<label for="nom_sujet">Nom du sujet :</label><input name="nom_sujet" type="text" value="<?php echo $v_nomsuj;?>" /> <?php echo $v_erreur[1]; ?> <br /><br>
	<label for="texte_sujet">Texte :</label><input type="textarea" name="texte_sujet" value="<?php echo $v_textesuj;?>"> <?php echo $v_erreur[2]; ?>
	</p>
	</fieldset>
	<p><input name="annuler" id="annuler" type="submit" value="Annuler" />
	<input name="creer" id="creer" type="submit" value="Créer" /></p>
	</form>
</p>
<?php
}
else
{
	$v_nomsuj=$_POST['nom_sujet'];
	$v_textesuj=$_POST['texte_sujet'];
	$ajout = $pdo->prepare ('INSERT INTO sujet (idredacteur,titresujet,textesujet) VALUES (:idredac,:nomsuj,:textesuj)');
	$ajout->execute(array('idredac'=>$v_idredac,'nomsuj'=>$v_nomsuj,'textesuj'=>$v_textesuj));
	header("location: accueil.php");
}

?>


</body>
</html>
