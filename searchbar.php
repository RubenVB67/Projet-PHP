<?php
include 'header.php';
include 'db.php';
$var1 = $_POST['var1'];
echo "<p class='center'>";
 $query = "SELECT * FROM sujet WHERE titresujet LIKE '%$var1%' OR textesujet LIKE '%$var1%' ";
$stmt = $pdo->prepare($query);
$stmt->execute();

echo "Article ou non d'article contenant le contenant <b>'".$var1."'</b><br><br><br>";
 $result = $stmt->fetchAll();

foreach( $result as $row ) {
    echo $row['titresujet']."<br>";
    echo "<a href=choose.php?sujet=".$row['idsujet'].">Lire le sujet</a><br><br>";
}
echo "</p>";
?>
