$(document).ready(function(){

    var resultat = true;
    var regYear = /^(?:(?:19|20)[0-9]{2})$/;
    var regPrice = /^[0-9]{1,3}(,[0-9]{3})*(([\\.,]{1}[0-9]*)|())$/; 
    var regFichier = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

   $('#form_update').submit(function(){
   resultat=true;
       if($('#disc_title').val() === ""){
            $('#disc_title').attr('placeholder', 'Titre manquant').addClass('is-invalid');
            $('#alert_title').text('Ce champ est requis').css("color", "#FF0000");
           
        resultat = false;
       }

       if($('#artist_id').val() === null){
            $('#artist_id').attr('placeholder', 'Artiste manquant').addClass('is-invalid');
            $('#alert_artist').text('Ce champ est requis').css("color", "#FF0000");

        resultat = false;
        }

        if($('#disc_year').val() === ""){
            $('#disc_year').attr('placeholder', 'Année manquante').addClass('is-invalid');
            $('#alert_year').text('Ce champ est requis').css("color", "#FF0000");

        resultat = false;
        }
        else if(regYear.test($('#disc_year').val()) === false){
            $('#disc_year').attr('placeholder', 'Année invalide').addClass('is-invalid');
            $('#alert_year').text('Le format est invalide').css("color", "#FF702D");

        resultat = false;
        }

        if($('#disc_genre').val() === ""){
            $('#disc_genre').attr('placeholder', 'Genre manquant').addClass('is-invalid');
            $('#alert_genre').text('Ce champ est requis').css("color", "#FF0000");

        resultat = false;
        }

        if($('#disc_label').val() === ""){
            $('#disc_label').attr('placeholder', 'Label manquant').addClass('is-invalid');
            $('#alert_label').text('Ce champ est requis').css("color", "#FF0000");

        resultat = false;
        }

        if($('#disc_price').val() === ""){
            $('#disc_price').attr('placeholder', 'Prix manquant').addClass('is-invalid');
            $('#alert_price').text('Ce champ est requis').css("color", "#FF0000");

        resultat = false;
        }
        else if(regPrice.test($('#disc_price').val()) === false){
            $('#disc_price').attr('placeholder', 'Prix invalide').addClass('is-invalid');
            $('#alert_price').text('Le format est invalide').css("color", "#FF702D");

        resultat = false;
        }

        if(document.getElementById("fichier").value !== "" && document.getElementById("fichier").size > 5 * 1024 * 1024){
            $('#fichier').addClass('is-invalid');
            $('#alert_picture').text('Ce fichier est trop volumineux').css("color", "#FF0000");
        
        resultat = false;
        }
        else if(document.getElementById("fichier").value !== "" && regFichier.test($('#fichier').val()) === false){
            $('#fichier').addClass('is-invalid');
            $('#alert_picture').text('Extension non valide').css("color", "#FF0000");
        
        resultat = false;
        }

       return resultat;
    });

    $('#disc_title').keyup(function(){
        if($('#disc_title').val()=== ""){
            $('#disc_title').attr('placeholder', 'Titre manquant').addClass('is-invalid');
            $('#alert_title').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#disc_title').removeClass('is-invalid');
            $('#alert_title').text('');
        }
    });

    $('#artist_id').change(function(){
        if($('#artist_id').val()=== null){
            $('#artist_id').addClass('is-invalid');
            $('#alert_artist').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#artist_id').removeClass('is-invalid');
            $('#alert_artist').text('');
        }
    });

    $('#disc_year').keyup(function(){
        if($('#disc_year').val()=== ""){
            $('#disc_year').attr('placeholder', 'Année manquante').addClass('is-invalid');
            $('#alert_year').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#disc_year').removeClass('is-invalid');
            $('#alert_year').text('');
        }
    });
    
    $('#disc_genre').keyup(function(){
        if($('#disc_genre').val()=== ""){
            $('#disc_genre').attr('placeholder', 'Genre manquant').addClass('is-invalid');
            $('#alert_genre').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#disc_genre').removeClass('is-invalid');
            $('#alert_genre').text('');
        }
    });

    $('#disc_label').keyup(function(){
        if($('#disc_label').val()=== ""){
            $('#disc_label').attr('placeholder', 'Label manquant').addClass('is-invalid');
            $('#alert_label').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#disc_label').removeClass('is-invalid');
            $('#alert_label').text('');
        }
    });

    $('#disc_price').keyup(function(){
        if($('#disc_price').val()=== ""){
            $('#disc_price').attr('placeholder', 'Prix manquant').addClass('is-invalid');
            $('#alert_price').text('Ce champ est requis').css("color", "#FF0000");
        }else{
            $('#disc_price').removeClass('is-invalid');
            $('#alert_price').text('');
        }
    });
});