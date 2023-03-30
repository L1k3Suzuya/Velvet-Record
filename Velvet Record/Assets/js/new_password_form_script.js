$(document).ready(function(){

    var resultat = true;
    var regPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!?*$@%_])([-+!?*$@%_\w]{8,15})$/;

    $('#form_new_password').submit(function(){
        resultat=true;

            if($('#new_password').val() === ""){
                $('#new_password').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#new_password_alert').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-40px").css("margin-bottom", "30px");
           
            resultat = false;
            }
            else if(regPassword.test($('#new_password').val()) === false){
                $('#new_password').attr('placeholder', 'Mot de passe invalide').addClass('is-invalid');
                $('#new_password_alert').text('Le mot de passe est trop faible').css("color", "#FF702D").css("margin-top", "-45px").css("margin-bottom", "30px");
    
             resultat = false;
             }
            
            if($('#new_password').val() !== $('#conf_new_password').val()){
                $('#new_password').attr('placeholder', 'Les deux mots de passe sont différents').addClass('is-invalid');
                $('#new_password_alert').text('Les deux mots de passe sont différents').css("color", "#FF0000").css("margin-top", "-45px").css("margin-bottom", "30px");
                $('#conf_new_password').attr('placeholder', 'Les deux mots de passe sont différents').addClass('is-invalid');
                $('#new_password_conf').text('Les deux mots de passe sont différents').css("color", "#FF0000").css("margin-top", "-25px").css("margin-bottom", "30px");
           
            resultat = false;
            }
            
            if($('#conf_new_password').val() === ""){
                $('#conf_new_password').attr('placeholder', 'Veuillez confirmer votre mot de passe').addClass('is-invalid');
                $('#new_password_conf').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-20px").css("margin-bottom", "30px");
           
            resultat = false;
            }
     
            return resultat;
         });

        $('#new_password').keyup(function(){
            if($('#new_password').val()=== ""){
                $('#new_password').attr('placeholder', 'Mot de passe manquant').addClass('is-invalid');
                $('#new_password_alert').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-40px").css("margin-bottom", "40px");
            }else{
                $('#new_password').removeClass('is-invalid');
                $('#new_password_alert').text('').css("margin-top", "-20px").css("margin-bottom", "60px");
            }
        });

        $('#conf_new_password').keyup(function(){
            if($('#conf_new_password').val()=== ""){
                $('#conf_new_password').attr('placeholder', 'Veuillez confirmer votre mot de passe').addClass('is-invalid');
                $('#new_password_conf').text('Ce champ est requis').css("color", "#FF0000");
            }else{
                $('#conf_new_password').removeClass('is-invalid');
                $('#new_password_conf').text('');
            }
        });

});