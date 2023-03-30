<?php

require "connexion.php";
$db = connexionBase();

if (isset ($_POST['valid_new_password']))
{



$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!?*$@%_])([-+!?*$@%_\w]{8,15})$/";



$recup_mail = $_POST['mail'];
$password = $_POST['new_password'];



$formError = [];



$pdoStat = $db->prepare("UPDATE utilisateur SET users_mdp=:users_mdp WHERE users_mail=:users_mail");

$pdoStat->bindValue(':users_mail', $recup_mail, PDO::PARAM_STR);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


if(!preg_match($passwordPattern, $_POST['new_password'])) {
    $formError['new_password_r'] = 'new_password_r=true';
}

if($_POST['new_password'] === "") {
    $formError['new_password_m'] = 'new_password_m=true';
}
if( $_POST['conf_new_password'] === "") {
    $formError['new_password_mc'] = 'new_password_mc=true';
}

elseif($_POST['new_password'] != $_POST['conf_new_password']) {
    $formError['new_password_d'] = 'new_password_d=true';
}
else {
    $pdoStat->bindValue(':users_mdp', $passwordHash, PDO::PARAM_STR);
}

$pdoStat ->execute();
header("Location:index.php");

if(count($formError) !== 0) 
    {
        $sUrl = implode("&", $formError);
        header("Location:new_password_form.php?users_mail=".$recup_mail."&".$sUrl);
        exit;
    }
}   