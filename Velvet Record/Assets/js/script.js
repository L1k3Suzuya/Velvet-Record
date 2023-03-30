function validate_delete() {
    event.preventDefault(); 
    var form = document.forms["my_form"]; 
    swal({
        title: "Etes-vous sûr ?",
        text: "En cas d'annulation, votre vinyle ne sera pas supprimé !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal({
                    text:"Le vinyle a été supprimé avec succès",
                    icon: "success",
                });
                form.submit();
            } else {
                swal({
                    text:"Le vinyle n'a pas été supprimé !",
                    icon: "success",
                    timer: 5000
                });
            }
        });
}



function validate_add() {
    var formadd = document.forms["add_form"];
    swal({
        icon: "success",
        text: "Votre vinyle a bien été ajouté !",
        buttons: false,
        timer: 9000
    }).then((willAdd) => {
        if (willAdd) {
            formadd.submit();
        }
    });
}