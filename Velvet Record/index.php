<?php

session_start(); 

include("header.php");

require "connexion.php";
$db = connexionBase();

$requete_list = "SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id ORDER BY disc_id";
$result_list = $db->query($requete_list);
$tableau_list = $result_list->fetchAll(PDO::FETCH_OBJ);

$requete_nb_disc = "SELECT COUNT(disc_id) AS nb_disc FROM disc";
$result_nb_disc = $db->query($requete_nb_disc);
$tableau_nb_disc = $result_nb_disc->fetch(PDO::FETCH_OBJ);
$nb_disc = $tableau_nb_disc->nb_disc;

$requete_dernier_disc = "SELECT disc_title, disc_picture, disc_id FROM disc ORDER BY disc_id DESC LIMIT 5";
$result_dernier_disc = $db->query($requete_dernier_disc);
$tableau_dernier_disc = $result_dernier_disc->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container-fluid">

<div class="row d-flex justify-content-center">
    <div class="video_section">
        <video id="video" class="embed-responsive-item" preload autoplay loop muted>
            <source src="./video/disc2.mp4" type="video/mp4"/>
        </video>
    </div>
</div>

<?php

if (isset($_SESSION["identifiant"]))
{
?>
    <div id="connexion_alert" class="alert alert-success" role="alert">
    <p id="connexion_success">Vous êtes connecté(e) en tant que : <?= $_SESSION["identifiant"]; ?></p>
    </div>
<?php
}
else
{
?>
    <div id="deconnexion_alert" class="alert alert-secondary" role="alert">
    <p id="deconnexion_success">Bienvenue ! Vous n'êtes pas connecté(e)</p>
    </div>
<?php
}
?>

<h1>Liste des disques (<?php echo $nb_disc ?>)</h1>

<div class="row justify-content-center">
    <a href="add_form.php"><button type="submit" class="btn btn-success"><b>AJOUTER</b></button></a>
</div>

<div class="row justify-content-center">

<div class="btn-group dropright">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>RECEMMENT AJOUTES</b></button>
  <div class="dropdown-menu">
  
  <?php
    foreach($tableau_dernier_disc as $dernier_disc)
    {
    ?>
        <a id="lien_dernier" class="dropdown-item" href="details.php?disc_id=<?= $dernier_disc->disc_id?>"><img id="img_dernier" src="./pictures/<?= $dernier_disc->disc_picture ?>" class="" alt="Photo album"><?= $dernier_disc->disc_title ?></a>
    <?php
    }
    ?>

  </div>
</div>

</div>

<div class="row d-flex justify-content-center">

<?php
    foreach($tableau_list as $disc)
    {
    
    ?>

<div class="card text-center mb-2 ml-2">
        <div class="card-header">
            <img src="./pictures/<?= $disc->disc_picture ?>" class="card-img-top" alt="Photo album">
        </div>

        <div class="card-body">
            <h5 class="card-title"><?= $disc->disc_title ?></h5>
            <h6 class="card-title"><?= $disc->artist_name ?></h6>
            <p class="card-text text-truncate">Label&nbsp:&nbsp<?= $disc->disc_label ?></p>
            <p class="card-text text-truncate">Year&nbsp:&nbsp<?= $disc->disc_year ?></p>
            <p class="card-text text-truncate">Genre&nbsp:&nbsp<?= $disc->disc_genre ?></p>
            <a href="details.php?disc_id=<?= $disc->disc_id?>" class="btn btn-primary">Plus d'informations</a>
        </div>

</div>
                        
    <?php

    }

    ?>

</div>

</div>

<?php
include("footer.php");
?>