$(document).ready(function() {
    $('#example').DataTable();
} );

function confirmDelete(){
    var respuesta = confirm("¿Esta seguro de eliminar la imagen?");

    if (respuesta = true) {
        return true;
    }else{
        return false;
    }
}
