<?php

require "connexion.php";
$db = connexionBase();

if (isset ($_POST['valid_update']))
{

    
$yearPattern = "/^(?:(?:19|20)[0-9]{2})$/";
$pricePattern = "/^[0-9]{1,3}(,[0-9]{3})*(([\\.,]{1}[0-9]*)|())$/";
    

$formError = [];


$pdoStat = $db ->prepare("UPDATE disc SET disc_id=:disc_id, disc_title=:disc_title, disc_year=:disc_year, disc_picture=:disc_picture, disc_label=:disc_label, disc_genre=:disc_genre, disc_price=:disc_price, artist_id=:artist_id WHERE disc_id=:disc_id");

  
if(!empty($_POST['disc_title'])) 
{
$disc_title = $_POST['disc_title'];
}  
else 
{
$formError['disc_title'] = 'disc_title=true';
}


if(!empty($_POST['disc_year'])) 
{
    if(preg_match($yearPattern, $_POST['disc_year']))
    {
    $disc_year = $_POST['disc_year'];
    }
    else
    {
        $formError['disc_year'] = 'disc_year=true';
    }
}
else
{
    $formError['disc_year'] = 'disc_year=true';
}



if(!empty($_POST['disc_label'])) 
{
$disc_label = $_POST['disc_label'];
}  
else 
{
$formError['disc_label'] = 'disc_label=true';
}



if(!empty($_POST['disc_genre'])) 
{
$disc_genre = $_POST['disc_genre'];
}  
else 
{
$formError['disc_genre'] = 'disc_genre=true';
}



if(!empty($_POST['disc_price'])) 
{
    if(preg_match($pricePattern, $_POST['disc_price']))
    {
    $disc_price = $_POST['disc_price'];
    }
    else
    {
        $formError['disc_price'] = 'disc_price=true';
    }
}
else
{
    $formError['disc_price'] = 'disc_price=true';
}



if (!empty($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0)
{
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["fichier"]["name"];
    $filetype = $_FILES["fichier"]["type"];
    $filesize = $_FILES["fichier"]["size"];



    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowed))
    {
        $formError['disc_picture'] = 'disc_picture=true';
    }



    $maxsize = 5 * 1024 * 1024;
    if ($filesize > $maxsize) 
    {
        $formError['disc_picture'] = 'disc_picture=true';
    }


    if (in_array($filetype, $allowed))
    {

        
        if (file_exists("pictures/" . $_FILES["fichier"]["name"]))
        {
            $image = $filename;
        }
        else
        {
            move_uploaded_file($_FILES["fichier"]["tmp_name"], "pictures/" . $_FILES["fichier"]["name"]);
            $image = $filename;
        }
    }

} 

else
    {
        $image = $_POST['disc_picture'];
    }



if(isset($_POST['artist_id'])) 
{
$artist_id = $_POST['artist_id'];
}  
else 
{
$formError['artist_id'] = 'artist_id=true';
}



$disc_id = $_POST["disc_id"];

if(count($formError) === 0) 
{
    $pdoStat->bindValue(':disc_id', $disc_id, PDO::PARAM_STR);
    $pdoStat->bindValue(':disc_title', $disc_title, PDO::PARAM_STR);
    $pdoStat->bindValue(':disc_year', $disc_year, PDO::PARAM_INT);
    $pdoStat->bindValue(':disc_picture', $image, PDO::PARAM_STR);
    $pdoStat->bindValue(':disc_label', $disc_label, PDO::PARAM_STR);
    $pdoStat->bindValue(':disc_genre', $disc_genre, PDO::PARAM_STR);
    $pdoStat->bindValue(':disc_price', $disc_price, PDO::PARAM_STR);
    $pdoStat->bindValue(':artist_id', $artist_id, PDO::PARAM_INT);

    $pdoStat ->execute();
    header("Location:index.php");

}
else
{
    $sUrl = implode("&", $formError);
    header("Location:update_form.php?disc_id=".$disc_id."&".$sUrl);
    exit;
}

}