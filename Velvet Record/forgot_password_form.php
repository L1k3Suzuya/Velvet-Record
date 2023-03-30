<?php
include("header.php");
?>

<div class="container-fluid" style="background-image: url('./pictures/fond31_password.jpg');" id="fond_registration">   

    <form action="forgot_password_script.php" method="post" id="form_forgot_password">

        <div class="row justify-content-center">

            <h1 id="forgot_password">Réinitialisation du mot de passe</h1>

        </div>

        <div id="form_group_forgot" class="form-group col-lg-6 col-sm-12 mb-5">
            <label for="email"><i class="fas fa-envelope"></i><b>Email :</b></label>
            <input type="email" class="form-control" name="email" value="" placeholder="Email" id="mail_forgot_password">
            <small id="emailHelp" class="form-text text-muted">Nous vous enverrons un mail avec un lien de réinitialisation du mot de passe</small>
            <small class="form-text" id="alert_mail_fp"></small>

            <?php

                if (isset($_GET["input_empty_mail"]))
                {
                    ?>
                    <div id="input_empty_mail" class = "alert alert-danger" >Le mail est manquant</div>
                    <?php
                }

            ?>

            <?php

            if (isset($_GET["compte_i"]))
            {
                ?>
                <div id="compte_i" class = "alert alert-danger" >Le compte n'existe pas</div>
                <?php
            }

            ?>
        
        </div>

        <div class="form-group col-lg-6 col-sm-12" id="button_forgot">
        <a href="index.php" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="valid_forgot_password" class="btn btn-success" value="VALIDER">
        <input type="reset" class="btn btn-danger" value="ANNULER">
        </div>

    </form>

</div>

<?php
include("footer.php");
?>

<script src="jquery/forgot_password_form_script.js"></script>