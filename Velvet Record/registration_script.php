<?php

require "connexion.php";
$db = connexionBase();

if (isset ($_POST['registration_add']))
{


    
$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!?*$@%_])([-+!?*$@%_\w]{8,15})$/";
$nomPattern = "/^[A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+([-'\s][A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+)?$/";
$prenomPattern = "/^[A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+([-'\s][A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+)?$/";
    


$formError = [];



$pdoStat = $db ->prepare("INSERT INTO utilisateur(users_mail, users_nom, users_prenom, users_mdp, users_block, users_role)
VALUES(:users_mail, :users_nom, :users_prenom, :users_mdp, :users_block, :users_role)");

$block = false;

$role = "User";

$password = $_POST['password'];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$email = $_POST['email'];
$requete_mail = $db->prepare("SELECT * FROM utilisateur WHERE users_mail=?");
$requete_mail->execute([$email]);
$user = $requete_mail->fetch();





if($user) {
    $formError['mail_exist'] = 'mail=true';
}
elseif (empty($_POST['email'])) {
    $formError['mail_manquant'] = 'mail_m=true';
}



if ($_POST['password'] != $_POST['conf_password']) {
    $formError['password_different'] = 'password=true';
}
elseif (empty($_POST['password']) && !preg_match($passwordPattern, $_POST['password'])) {
    $formError['password_manquant'] = 'password_m=true';
}
else {
    $password_v = $passwordHash;
}



if(!empty($_POST['nom'])) 
{
    if(preg_match($nomPattern, $_POST['nom']))
    {
        $name = $_POST['nom'];
    }
    else
    {
        $formError['name_manquant'] = 'nom_m=true';
    }
}
else
{
    $formError['name_manquant'] = 'nom_m=true';
}



if(!empty($_POST['prenom'])) 
{
    if(preg_match($prenomPattern, $_POST['prenom']))
    {
        $firstname = $_POST['prenom'];
    }
    else
    {
        $formError['prenom_manquant'] = 'prenom_m=true';
    }
}
else
{
    $formError['prenom_manquant'] = 'prenom_m=true';
}



if(count($formError) === 0) 
{
    $pdoStat->bindValue(':users_mail', $email, PDO::PARAM_STR);
    $pdoStat->bindValue(':users_nom', $name, PDO::PARAM_STR);
    $pdoStat->bindValue(':users_prenom', $firstname, PDO::PARAM_STR);
    $pdoStat->bindValue(':users_mdp', $password_v, PDO::PARAM_STR);
    $pdoStat->bindValue(':users_block', $block, PDO::PARAM_BOOL);
    $pdoStat->bindValue(':users_role', $role, PDO::PARAM_STR);

    $pdoStat ->execute();
    header("Location:index.php");

}
else
{
    $sUrl = implode("&", $formError);
    header("Location:registration_form.php?".$sUrl);
    exit;
}

}