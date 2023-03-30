<?php
include("header.php");
?>

<div class="container-fluid">

        <?php

            if (isset($_GET["compte_b"]))
            {
                ?>
                <div class = "alert alert-danger" >Votre compte est bloqué, veuillez vous réinscrire</div>
                <?php
            }

            if (isset($_GET["wrong"]))
            {
                ?>
                <div class = "alert alert-danger" >Identifiant ou mot de passe incorrect</div>
                <?php
            }

            if (isset($_GET["essai"]))
            {
                ?>
                <div class = "alert alert-danger" >Nombre d'essai trop important, votre compte a été bloqué</div>
                <?php
            }

        ?>

    <form action="login_script.php" method="post" id="form_login">

        <div class="row col-lg-5">

            <h1 id="connexion">Connexion</h1>

        </div>

        <div class="form-group col-lg-5 col-sm-12 mb-5">
            <label for="email"><i class="fas fa-envelope"></i><b>Email :</b></label>
            <input type="email" class="form-control" name="email" value="" placeholder="Email" id="mail_login">
            <small class="form-text" id="alert_mail_l"></small>

            <?php

                if (isset($_GET["input_empty"]))
                {
                    ?>
                    <div id="input_empty" class = "alert alert-danger" >Le mail est manquant</div>
                    <?php
                }

            ?>

            <?php

            if (isset($_GET["compte"]))
            {
                ?>
                <div id="compte" class = "alert alert-danger" >Le compte n'existe pas</div>
                <?php
            }

            ?>

        </div>

        <div class="form-group col-lg-5 col-sm-12">
            <label for="password"><i class="fas fa-lock"></i><b>Mot de passe :</b></label>
            <input type="password" class="form-control" name="password" value="" placeholder="Mot de passe" id="password_login">
            <small class="form-text" id="alert_password_l"></small>

            <?php

                if (isset($_GET["input_empty"]))
                {
                    ?>
                    <div class = "alert alert-danger" >Le mot de passe est manquant</div>
                    <?php
                }

            ?>

            <?php

            if (isset($_GET["password_invalid"]))
                {
                    ?>
                    <div class = "alert alert-danger" >Le format du mot de passe est invalide</div>
                    <?php
                }

            ?>
        
        </div>

        <div class="form-group col-lg-5 col-sm-12">
            <p>Pas encore de compte, <a href="registration_form.php">Inscrivez-vous !</a></p>
        </div>
        
        <div class="form-group col-lg-5 col-sm-12">
            <p>Mot de passe oublié ? <a href="forgot_password_form.php">Cliquez ici</a></p>
        </div>   

        <div class="form-group col-lg-5 col-sm-12" id="button_connexion">
        <a href="index.php" class="btn btn-secondary">RETOUR</a>
        <input type="submit" name="valid_login" class="btn btn-success" value="LOGIN">
        <input type="reset" class="btn btn-danger" value="ANNULER">
        </div>

    </form>

</div>

<?php
include("footer.php");
?>

<script src="jquery/login_form_script.js"></script>