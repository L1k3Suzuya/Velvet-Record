<?php

require "connexion.php";
$db = connexionBase();

if (isset ($_POST['valid_forgot_password']))
{



$mail = $_POST['email'];



$formError = [];




$requete_mail = "SELECT * FROM utilisateur WHERE users_mail = :users_mail";
$pdoStat= $db->prepare($requete_mail);
$pdoStat->bindValue(':users_mail', $mail, PDO::PARAM_STR);
$pdoStat -> execute();

$user = $pdoStat ->fetch(PDO::FETCH_OBJ);



if($mail === "")
{
    $formError['input_empty_mail'] = 'input_empty_mail=true';
}
elseif(empty($user))
{
    $formError['compte_il'] = 'compte_i=true';
}
else
{

    $user_mail = $user->users_mail;

    $to = $user->users_mail;
    $subject = 'Réinitialisation du mot de passe';
    $message = '<!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta charset="utf-8">
    <title>Mon premier mail HTML</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html 
            {
            font-size: 100%;
            }
        body 
            {
            font-size: 1rem; /* Si html fixé à 100%, 1rem = 16px = taille par défaut de police de Firefox ou Chrome */
            }
    </style>  
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Réinitialisation du mot de passe</h1>
                </div>    
            </div>   
            <div class="row">
                <div class="col-12">
                    <img src="http://localhost/velvet_records/pictures/login5.png" title="Logo" alt="Logo" class="img-fluid" style="width:200px; height: 200px;">
                </div>    
            </div> 
            <div class="row">
                <div class="col-12">
                    <p>Veuillez cliquer sur <a href="http://localhost/velvet_records/new_password_form.php?users_mail='.$user_mail.'">ce lien</a> pour réinitialiser votre mot de passe</p>
                </div>    
            </div>     
        </div> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
        </html>';
    $headers = array(
        'MIME-Version' => '1.0',
        'Content-Type' => 'text/html; image/png; image/jpg; image/jpeg charset=utf-8',
        'From' => 'webmaster@afpa.fr',
        'Reply-To' => 'webmaster@afpa.fr',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    mail($to, $subject, $message, $headers);

    header('Location:index.php');
}
    if(count($formError) !== 0) 
        {
            $sUrl = implode("&", $formError); 
            header("Location:forgot_password_form.php?".$sUrl); 
            exit;
        }
}

?>