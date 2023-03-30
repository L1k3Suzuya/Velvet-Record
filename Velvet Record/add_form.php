<?php

include("header.php");

require "connexion.php";
$db = connexionBase();

$requete_artist = "SELECT * FROM artist";
$result_artist = $db->query($requete_artist);
$categories_artist = $result_artist->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row justify-content-center">

    <div class="image_ajout">
        <img class="img-fluid" src="./pictures/details1.jpg" id="photo_ajout" alt="">
    </div>

</div>

<div class="container">

<h1>Ajouter un vinyle</h1>

<form action="add_script.php" method="post" enctype="multipart/form-data" id="form" name="add_form">

    <div class="form-group">

        <label for="title"><b>Titre :</b></label>
        <input type="text" class="form-control" name="disc_title" id ="disc_title" value="" placeholder="Entrer le titre">
        <small class="form-text" id="alert_title"></small>

        <?php
    
            if (isset($_GET["disc_title"]))
            {
                ?>
                <div class = "alert alert-danger" >Le titre n'est pas renseigné</div>
                <?php
            }
    
        ?>

    </div>

    <div class="form-group">

        <label for="artist_id"><b>Artiste :</b></label>
        <select class="custom-select" name="artist_id" id="artist_id">
            <option selected disabled>-- Selectionner un artiste --</option>
            <?php
                foreach($categories_artist as $c) // Permet l'affichage du menu déroulant pour obtenir la liste des artistes
                {
            ?>
            <option value= "<?= $c->artist_id ?>"><?=$c->artist_name ?></option>
            <?php
                }
            ?>
        </select>
        <small class="form-text" id="alert_artist"></small>

        <?php
    
            if (isset($_GET["artist_id"]))
            {
                ?>
                <div class = "alert alert-danger" >L'artiste n'est pas sélectionné</div>
                <?php
            }
    
        ?>

    </div>

    <div class="form-group">

        <label for="disc_year"><b>Année :</b></label>
        <input type="text" class="form-control" name="disc_year" id="disc_year" value="" placeholder="Entrer l'année">
        <small class="form-text" id="alert_year"></small>

        <?php
    
            if (isset($_GET["disc_year"]))
            {
                ?>
                <div class = "alert alert-danger" >L'année de parution est invalide ou manquante</div>
                <?php
            }
    
        ?>

    </div>

    <div class="form-group">

        <label for="disc_genre"><b>Genre :</b></label>
        <input type="text" class="form-control" name="disc_genre" id="disc_genre" value="" placeholder="Entrer le genre (Rock, Pop, Prog ...)">
        <small class="form-text" id="alert_genre"></small>

        <?php
    
            if (isset($_GET["disc_genre"]))
            {
                ?>
                <div class = "alert alert-danger" >Le genre n'est pas renseigné</div>
                <?php
            }
    
        ?>
        
    </div>

    <div class="form-group">

        <label for="disc_label"><b>Label :</b></label>
        <input type="text" class="form-control" name="disc_label" id="disc_label" value="" placeholder="Entrer le label (EMI, Warner, PolyGram, Univers sale ...)">
        <small class="form-text" id="alert_label"></small>

        <?php
    
            if (isset($_GET["disc_label"]))
            {
                ?>
                <div class = "alert alert-danger" >Le label n'est pas renseigné</div>
                <?php
            }
    
        ?>

    </div>

    <div class="form-group">

        <label for="disc_price"><b>Prix&nbsp;(&euro;) :</b></label>
        <input type="number" step="any" class="form-control" name="disc_price"  id="disc_price" value="" placeholder="Entrer le prix">
        <small class="form-text" id="alert_price"></small>

        <?php
    
            if (isset($_GET["disc_price"]))
            {
                ?>
                <div class = "alert alert-danger" >Le prix est invalide ou manquant</div>
                <?php
            }

        ?>

    </div>

    <div class="form-group">
        <label for="photo"><b>Photo :</b></label>
        <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />
        <input type="file" class="form-control-file" name="fichier" id="fichier">
        <small class="form-text" id="alert_picture"></small>

        <?php
    
            if (isset($_GET["disc_picture"]))
            {
                ?>
                <div class = "alert alert-danger" >Vous n'avez pas téléchargé d'image et/ou Le format n'est pas autorisé et/ou La taille de l'image est trop importante</div>
                <?php
            }
    
        ?>

    </div>

    <div class="form-group">
        <a href="index.php" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="valid_add" class="btn btn-success" onclick="validate_add()" value="AJOUTER" id="bouton_envoi2">
        <input type="reset" class="btn btn-danger" value="ANNULER">
    </div>

</form>

</div>

<?php
include("footer.php");
?>


<script src="jquery/add_form_script.js"></script>
<script src="js/script.js"></script>