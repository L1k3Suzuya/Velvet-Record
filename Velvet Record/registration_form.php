<?php
include("header.php");
?>

<div class="container-fluid" style="background-image: url('./pictures/fond_registration1.jpg');" id="fond_registration">   

    <form action="registration_script.php" method="post" id="form_registration">

        <div class="row justify-content-center">

            <h1 id="inscription">Inscription</h1>

        </div>

        <div id="form_group_nom" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="nom"><i class="fas fa-user-circle"></i><b>Nom :</b></label>
            <input type="text" class="form-control" name="nom" value="" placeholder="Nom" id="nom_registration">
            <small class="form-text" id="alert_nom"></small>
            
            <?php
        
                if (isset($_GET["nom_m"]))
                {
                    ?>
                    <div id="nom_m" class = "alert alert-danger" >Le nom est invalide ou manquant</div>
                    <?php
                }
        
            ?>

        </div>

        <div id="form_group_prenom" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="prenom"><i class="fas fa-user-circle"></i><b>Prénom :</b></label>
            <input type="prenom" class="form-control" name="prenom" value="" placeholder="Prénom" id="prenom_registration">
            <small class="form-text" id="alert_prenom"></small>

            <?php
        
                if (isset($_GET["prenom_m"]))
                {
                    ?>
                    <div id="prenom_m" class = "alert alert-danger" >Le prénom est invalide ou manquant</div>
                    <?php
                }
        
            ?>

        </div>

        <div id="form_group_mail" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="email"><i class="fas fa-envelope"></i><b>Email :</b></label>
            <input type="email" class="form-control" name="email" value="" placeholder="Email" id="mail_registration">
            <small class="form-text" id="alert_mail"></small>

            <?php
        
                if (isset($_GET["mail"]))
                {
                    ?>
                    <div id="mail_e" class = "alert alert-danger" >Le mail existe déja</div>
                    <?php
                }
                elseif (isset($_GET["mail_m"]))
                {
                    ?>
                    <div id="mail_m" class = "alert alert-danger" >Le mail n'est pas renseigné</div>
                    <?php
                }
        
            ?>

        </div>

        <div id="form_group_password" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="password"><i class="fas fa-lock"></i><b>Mot de passe :</b></label>
            <input type="password" class="form-control" name="password" value="" placeholder="Mot de passe" id="password_registration">
            <small class="form-text" id="alert_password"></small>

            <?php
        
                if (isset($_GET["password"]))
                {
                    ?>
                    <div id="password_d" class = "alert alert-danger" >Les deux mots de passe sont différents</div>
                    <?php
                }
                elseif (isset($_GET["password_m"]))
                {
                    ?>
                    <div id="password_m" class = "alert alert-danger" >Le mot de passe n'est pas renseigné</div>
                    <?php
                }
        
            ?>

        </div>

        <div id="form_group_conf_password" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="conf_password"><i class="fas fa-lock"></i><b>Confirmation du mot de passe :</b></label>
            <input type="password" class="form-control" name="conf_password" value="" placeholder="Confirmation du mot de passe" id="conf_password_registration">
            <small class="form-text" id="alert_conf_password"></small>

            <?php
        
                if (isset($_GET["password"]))
                {
                    ?>
                    <div id="conf_password_d" class = "alert alert-danger" >Les deux mots de passe sont différents</div>
                    <?php
                }
        
            ?>

        </div>

        <div class="form-group col-lg-6 col-sm-12" id="button_inscription">
        <a href="index.php" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="registration_add" class="btn btn-success" value="INSCRIPTION">
        <input type="reset" class="btn btn-danger" value="ANNULER">
        </div>

    </form>

</div>

<?php
include("footer.php");
?>

<script src="jquery/registration_form_script.js"></script>