<?php

include("header.php");

require "connexion.php";
$db = connexionBase();

$disc_id = $_GET["disc_id"];
$requete_modif = "SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc.disc_id =" .$disc_id;
$result_modif = $db->query($requete_modif);
$tableau_modif = $result_modif->fetch(PDO::FETCH_OBJ);

// pour tester la page via le terminal,écrire dans la barre  Google: un numéro de 
// "disc_id" comme par exemple: http://127.0.0.1:8080/update_form.php?disc_id=1

$requete_artist = "SELECT * FROM artist";
$result_artist = $db->query($requete_artist);
$categories_artist = $result_artist->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row justify-content-center">

    <div class="image_modifs">
        <img class="img-fluid" id="photo_modifs" src="./pictures/modifs7.jpg" alt="">
    </div>

</div>

<div class="container">

<h1>Modifier un vinyle</h1>

<form action="update_script.php" method="post" enctype="multipart/form-data" id="form_update">
<input type="hidden" name="disc_id" id="disc_id" value="<?=$tableau_modif->disc_id?>">

<div class="row justify-content-center">

    <div class="form-group">
        <img class="img-fluid" src="./pictures/<?=$tableau_modif->disc_picture?>" alt="Photo album">
    </div>

</div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="title"><b>Title :</b></label>
            <input type="text" class="form-control" name="disc_title" id="disc_title" value="<?=$tableau_modif->disc_title?>">
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

        <div class="form-group col-lg-6">
            <label for="artiste"><b>Artist :</b></label>
            <select class="custom-select" name="artist_id" id="artist_id">
            <?php
                foreach($categories_artist as $c)
                {
                    ?>
                    <option value= "<?= $c->artist_id ?>"
                        <?php 
                        if ($c->artist_id == $tableau_modif->artist_id) {
                            echo "selected";
                        }
                        ?>
                    >
                        <?=$c->artist_name ?></option>
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

    </div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="year"><b>Year :</b></label>
            <input type="text" class="form-control" name="disc_year" id="disc_year" value="<?=$tableau_modif->disc_year?>">
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
        

        

        <div class="form-group col-lg-6">
            <label for="genre"><b>Genre :</b></label>
            <input type="text" class="form-control" name="disc_genre" id="disc_genre" value="<?=$tableau_modif->disc_genre?>">
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

    </div>

    <div class="form-row">

        <div class="form-group col-lg-6">
            <label for="label"><b>Label :</b></label>
            <input type="text" class="form-control" name="disc_label" id="disc_label" value="<?=$tableau_modif->disc_label?>">
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

        <div class="form-group col-lg-6">
            <label for="price"><b>Price&nbsp;(&euro;) :</b></label>
            <input type="number" step="any" class="form-control" name="disc_price" id="disc_price" value="<?=$tableau_modif->disc_price?>">
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

    </div>

    <div class="form-group">
        <label for="photo"><b>Picture :</b></label>
        <input type="hidden" name="disc_picture" id="disc_picture" value="<?=$tableau_modif->disc_picture?>" />
        <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />
        <input type="file" name="fichier" class="form-control-file" id="fichier">
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
        <a href="details.php?disc_id=<?= $tableau_modif->disc_id?>" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="valid_update" class="btn btn-success" value="MODIFIER" id="bouton_envoi2">
    </div>

</form>

</div>

<?php
include("footer.php");
?>

<script src="jquery/update_form_script.js"></script>