<?php

include("header.php");

require "connexion.php";
$db = connexionBase();

$disc_id = $_GET["disc_id"];
$requete_details = "SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc.disc_id =" .$disc_id;
$result_details = $db->query($requete_details);
$tableau_details = $result_details->fetch(PDO::FETCH_OBJ);


?>

<div class="row justify-content-center">

    <div>
        <img class="img-fluid" src="/details4.jpg" alt="">
    </div>

</div>

<div class="container">

<h1>Détails</h1>

<form action="delete_script.php?disc_id=<?=$tableau_details->disc_id?>" method="post" name="my_form">

<div class="row justify-content-center">

    <div class="form-group">
        <img class="img-fluid" src="../../img/pictures/<?= $tableau_details->disc_picture?>" alt="Photo album" readonly>
    </div>

</div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="title"><b>Titre :</b></label>
            <input type="text" class="form-control" name="title" value="<?=$tableau_details->disc_title?>" readonly>
        </div>

        <div class="form-group col-lg-6">
            <label for="artiste"><b>Artiste :</b></label>
            <input type="text" class="form-control" name="artiste" value="<?=$tableau_details->artist_name?>" readonly>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="year"><b>Année :</b></label>
            <input type="text" class="form-control" name="year" value="<?=$tableau_details->disc_year?>" readonly>
        </div>

        <div class="form-group col-lg-6">
            <label for="genre"><b>Genre :</b></label>
            <input type="text" class="form-control" name="genre" value="<?=$tableau_details->disc_genre?>" readonly>
        </div>

    </div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="label"><b>Label :</b></label>
            <input type="text" class="form-control" name="label" value="<?=$tableau_details->disc_label?>" readonly>
        </div>

        <div class="form-group col-lg-6">
            <label for="price"><b>Prix&nbsp;(&euro;) :</b></label>
            <input type="number" class="form-control" name="price" value="<?=$tableau_details->disc_price?>" readonly>
        </div>

    </div>

    <a href="index.php"><button type="button" class="btn btn-secondary">RETOUR</button></a>
    <a href="update_form.php?disc_id=<?= $tableau_details->disc_id?>"><button type="button" class="btn btn-primary">MODIFIER</button></a>
    <input type="submit" class="btn btn-danger" onclick="validate_delete()" value="SUPPRIMER" id="suppr_button"></a>

</form>

</div>

<?php
include("footer.php");
?>

<script src="js/script.js"></script>