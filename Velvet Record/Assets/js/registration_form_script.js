$(document).ready(function(){

    var resultat = true;
    var regPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!?*$@%_])([-+!?*$@%_\w]{8,15})$/;
    var regNom = /^[A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+([-'\s][A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+)?$/;
    var regPrenom = /^[A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+([-'\s][A-zA-ZñéèîïÉÈÎÏ][A-zA-Zñéèêàçîï]+)?$/;

    $('#form_registration').submit(function(){
        resultat=true;
        
            if($('#nom_registration').val() === ""){
                 $('#nom_registration').attr('placeholder', 'Nom manquant').addClass('is-invalid');
                 $('#alert_nom').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
                
             resultat = false;
            }
            else if(regNom.test($('#nom_registration').val()) === false){
                $('#nom_registration').attr('placeholder', 'Nom invalide').addClass('is-invalid');
                $('#alert_nom').text('Le format est invalide').css("color", "#FF702D").css("margin-top", "10px").css("margin-bottom", "-10px");
    
            resultat = false;
            }

            if($('#prenom_registration').val() === ""){
                $('#prenom_registration').attr('placeholder', 'Prénom manquant').addClass('is-invalid');
                $('#alert_prenom').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
               
            resultat = false;
            }
            else if(regPrenom.test($('#prenom_registration').val()) === false){
               $('#prenom_registration').attr('placeholder', 'Prénom invalide').addClass('is-invalid');
               $('#alert_prenom').text('Le format est invalide').css("color", "#FF702D").css("margin-top", "10px").css("margin-bottom", "-10px");
   
            resultat = false;
            }

            if($('#mail_registration').val() === ""){
                $('#mail_registration').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
           
            resultat = false;
            }

            if($('#password_registration').val() === ""){
                $('#password_registration').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#alert_password').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
           
            resultat = false;
            }
            else if(regPassword.test($('#password_registration').val()) === false){
                $('#password_registration').attr('placeholder', 'Mot de passe invalide').addClass('is-invalid');
                $('#alert_password').text('Le mot de passe est trop faible').css("color", "#FF702D").css("margin-top", "10px").css("margin-bottom", "-10px");
    
             resultat = false;
             }
            
            if($('#password_registration').val() !== $('#conf_password_registration').val()){
                $('#password_registration').attr('placeholder', 'Les deux mots de passe sont différents').addClass('is-invalid');
                $('#alert_password').text('Les deux mots de passe sont différents').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
                $('#conf_password_registration').attr('placeholder', 'Les deux mots de passe sont différents').addClass('is-invalid');
                $('#alert_conf_password').text('Les deux mots de passe sont différents').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
           
            resultat = false;
            }
            
            if($('#conf_password_registration').val() === ""){
                $('#conf_password_registration').attr('placeholder', 'Veuillez confirmer votre mot de passe').addClass('is-invalid');
                $('#alert_conf_password').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-20px").css("margin-bottom", "-10px");
           
            resultat = false;
            }
     
            return resultat;
         });
     
         $('#nom_registration').keyup(function(){
             if($('#nom_registration').val()=== ""){
                 $('#nom_registration').attr('placeholder', 'Nom manquant').addClass('is-invalid');
                 $('#alert_nom').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
             }else{
                 $('#nom_registration').removeClass('is-invalid');
                 $('#alert_nom').text('');
             }
         });

         $('#prenom_registration').keyup(function(){
            if($('#prenom_registration').val()=== ""){
                $('#prenom_registration').attr('placeholder', 'Prénom manquant').addClass('is-invalid');
                $('#alert_prenom').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
            }else{
                $('#prenom_registration').removeClass('is-invalid');
                $('#alert_prenom').text('');
            }
        });

        $('#mail_registration').keyup(function(){
            if($('#mail_registration').val()=== ""){
                $('#mail_registration').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
            }else{
                $('#mail_registration').removeClass('is-invalid');
                $('#alert_mail').text('');
            }
        });

        $('#password_registration').keyup(function(){
            if($('#password_registration').val()=== ""){
                $('#password_registration').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#alert_password').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "-10px");
            }else{
                $('#password_registration').removeClass('is-invalid');
                $('#alert_password').text('');
            }
        });

        $('#conf_password_registration').keyup(function(){
            if($('#conf_password_registration').val()=== ""){
                $('#conf_password_registration').attr('placeholder', 'Veuillez confirmer votre mot de passe').addClass('is-invalid');
                $('#alert_conf_password').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-20px").css("margin-bottom", "10px");
            }else{
                $('#conf_password_registration').removeClass('is-invalid');
                $('#alert_conf_password').text('');
            }
        });

});