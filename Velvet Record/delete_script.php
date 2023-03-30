<?php

require "connexion.php";
$db = connexionBase();

$pdoStat = $db->prepare("DELETE FROM disc WHERE disc_id=:disc_id LIMIT 1");

$pdoStat->bindValue(":disc_id", $_GET['disc_id']);

$InsertIsOk = $pdoStat->execute();

if($InsertIsOk){

    header("Location: index.php");
}
else{
    $message = "Echec de la suppression";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression du vinyle</title>
</head>
<body>
    <h1>Suppression du vinyle</h1>
    <p><?php echo $message; ?></p>
</body>
</html>