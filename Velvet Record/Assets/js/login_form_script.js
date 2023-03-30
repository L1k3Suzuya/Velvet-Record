$(document).ready(function(){

    var resultat = true;
    var regPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!?*$@%_])([-+!?*$@%_\w]{8,15})$/;

    $('#form_login').submit(function(){
        resultat=true;

            if($('#mail_login').val() === ""){
                $('#mail_login').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail_l').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-45px").css("margin-bottom", "40px");
            resultat = false;
            }

            if($('#password_login').val() === ""){
                $('#password_login').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#alert_password_l').text('Ce champ est requis').css("color", "#FF0000");
           
            resultat = false;
            }
            else if(regPassword.test($('#password_login').val()) === false){
                $('#password_login').attr('placeholder', 'Mot de passe invalide').addClass('is-invalid');
                $('#alert_password_l').text('Le mot de passe est invalide').css("color", "#FF702D");
    
             resultat = false;
             }
     
            return resultat;
         });

        $('#mail_login').keyup(function(){
            if($('#mail_login').val()=== ""){
                $('#mail_login').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail_l').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-45px").css("margin-bottom", "40px");
            }else{
                $('#mail_login').removeClass('is-invalid');
                $('#alert_mail_l').text('');
            }
        });

        $('#password_login').keyup(function(){
            if($('#password_login').val()=== ""){
                $('#password_login').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#alert_password_l').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "10px").css("margin-bottom", "30px");
            }else{
                $('#password_login').removeClass('is-invalid');
                $('#alert_password_l').text('');
            }
        });

});