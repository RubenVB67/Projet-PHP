<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $db_name="projet_web";
    $sql_name="root";
    $sql_pass="";
    $server_name="localhost";
    $mysqli= mysqli_connect($server_name,$sql_name,$sql_pass,$db_name);
$sql = "SELECT titresujet FROM sujet";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Sujet : " . $row["titresujet"]."<br>";
    }
} else {
    echo "Aucun résultat";
}
     ?>
  </body>
</html>
