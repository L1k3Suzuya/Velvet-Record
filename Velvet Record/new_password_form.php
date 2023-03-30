<?php
include("header.php");

$user_mail = $_GET['users_mail'];
?>

<div class="container-fluid" style="background-image: url('./pictures/fond31_new_password.jpg');" id="fond_new_mdp">   

    <form action="new_password_script.php" method="post" id="form_new_password">

        <div class="row justify-content-center">

            <h1 id="forgot_password">Nouveau mot de passe</h1>

        </div>

        <div id="form_group_new_mdp" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="password"><i class="fas fa-lock"></i><b>Nouveau mot de passe :</b></label>
            <input type="password" class="form-control" name="new_password" value="" placeholder="Nouveau mot de passe" id="new_password">
            <small class="form-text" id="new_password_alert"></small>

            <?php

                if (isset($_GET["new_password_m"]))
                {
                    ?>
                    <div id="new_password_manquant" class = "alert alert-danger" >Le mot de passe est manquant</div>
                    <?php
                }

                if (isset($_GET["new_password_d"]))
                {
                    ?>
                    <div id="new_password_diff1" class = "alert alert-danger" >Vos mots de passe sont différents</div>
                    <?php
                }

                elseif (isset($_GET["new_password_r"]))
                {
                    ?>
                    <div id="new_password_faible" class = "alert alert-danger" >Votre mot de passe est trop faible</div>
                    <?php
                }

            ?>
        
        </div>

        <div id="form_group_conf_new_mdp" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="conf_password"><i class="fas fa-lock"></i><b>Confirmation du nouveau mot de passe :</b></label>
            <input type="password" class="form-control" name="conf_new_password" value="" placeholder="Confirmer votre nouveau mot de passe" id="conf_new_password">
            <small class="form-text" id="new_password_conf"></small>

            <?php

                if (isset($_GET["new_password_mc"]))
                {
                    ?>
                    <div id="new_password_confirm" class = "alert alert-danger" >Vous n'avez pas confirmé votre mot de passe</div>
                    <?php
                }

            ?>

            <?php

                if (isset($_GET["new_password_d"]))
                {
                    ?>
                    <div id="new_password_diff2" class = "alert alert-danger" >Vos mots de passe sont différents</div>
                    <?php
                }

            ?>
        
        </div>

        <input type="hidden" name="mail" value=<?= $user_mail ?>>

        <div class="form-group col-lg-6 col-sm-12" id="button_new_mdp">
        <a href="index.php" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="valid_new_password" class="btn btn-success" value="ENREGISTRER">
        <input type="reset" class="btn btn-danger" value="ANNULER">
        </div>

    </form>

</div>

<?php
include("footer.php");
?>

<script src="jquery/new_password_form_script.js"></script>