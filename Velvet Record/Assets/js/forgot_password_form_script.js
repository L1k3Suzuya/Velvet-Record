$(document).ready(function(){

    $('#form_forgot_password').submit(function(){
        resultat=true;

            if($('#mail_forgot_password').val() === ""){
                $('#mail_forgot_password').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail_fp').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-30px");
            resultat = false;
            }
     
            return resultat;
         });

        $('#mail_forgot_password').keyup(function(){
            if($('#mail_forgot_password').val()=== ""){
                $('#mail_forgot_password').attr('placeholder', 'Mail manquant').addClass('is-invalid');
                $('#alert_mail_fp').text('Ce champ est requis').css("color", "#FF0000").css("margin-top", "-30px").css("margin-bottom", "-20px");
            }else{
                $('#mail_forgot_password').removeClass('is-invalid').css("margin-bottom", "20px");
                $('#alert_mail_fp').text('');
            }
        });

});
