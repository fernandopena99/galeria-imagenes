


$("#tags").keyup(function () {
    var tags = $(this).val();
    filtro_tags(tags);





});


function get_image() {

    let form = $("#multi-filters");
    console.log(form);
    $.ajax(
        {
            type: "POST",
            url: "vista/filtro.php",
            data: form.serialize(),
            success: function (data) {
                $.each(JSON.parse(data), function (key, Image) {
                    let row = +
                        "<tr>" +
                        "<td>" + Image.TITLE + "</td> " +
                        "<td>" + Image.DESCRIPTION + "</td> " +
                        "<td>" + Image.IMAGE + "></td> " +
                        "<td>" + Image.orientacion +
                        "<td>" + Image.tags + "</td> " +
                        "<td>" + Image.tamano + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +


                        "</tr>";

                    $("#filters-result").append(row);
                });
            }
        }
    )
}



// function get_users()
// {

//     let form = $("#multi-filters");

//     $.ajax(
//         {
//             type: "POST",
//             url: "filtro.php",
//             data: form.serialize(),
//             success: function (data)
//             {
//                 $("#filters-result").html("");


//                 $.each(JSON.parse(data), function(key, User)
//                 {
//                     let row = ""+
//                         "<tr>" +
//                         "<td>"+key+"</td> " +
//                         "<td>"+User.TITLE+ "</td> " +
//                         "<td>"+User.DESCRIPTION+"</td> " +
//                         "<td>"+User.IMAGE+"</td> " +
//                         "<td>"+User.orientacion+"</td> " +
//                         "<td>"+User.tamano+"</td> " +
//                         "<td>"+User.tags+"</td> " +
//                         "<td>"+User.imagen_completa_menu+"</td> " +
//                         "<td>"+User.formato_imagen+"</td> " +
//                         "<td>"+User.color+"</td> " +
//                         "</tr>";

//                     $("#filters-result").append(row);


//                 });

//             }
//         }
//     )
// }



function filtro_tamano(tamano) {


    var row = "";

    $.ajax(
        {
            type: "POST",
            url: "vista/filtro_tamano.php",
            data: { tamano: tamano },
            success: function (data) {

                $.each(JSON.parse(data), function (key, Image) {
                    row = row +
                        "<tr>" +
                        "<td>" + Image.TITLE + "</td> " +
                        "<td>" + Image.DESCRIPTION + "</td> " +
                        "<td><img src=" + Image.IMAGE + "></td> " +
                        "<td>" + Image.orientacion +
                        "<td>" + Image.tags + "</td> " +
                        "<td>" + Image.tamano + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +
                        "<td>" + Image.formato_imagen + "</td> " +

                        "</tr>";

                    $("#filters-result").html(row);
                });

            }
        }
    )
}

function tamano() {
    // alert('click');
}

document.getElementById('tamano').onclick = tamano;




// function filtro_orientacion(orientacion) {

//     var row = "";
//     $.ajax(
//         {
//             type: "POST",
//             url: "vista/filtro_orientacion.php",
//             data: { orientacion: orientacion },
//             success: function (data) {

//                 $.each(JSON.parse(data), function (key, Image) {
//                     row = row +
//                         "<tr>" +
//                         "<td>" + Image.TITLE + "</td> " +
//                         "<td>" + Image.DESCRIPTION + "</td> " +
//                         "<td><a href='pages/editImage.php?id='><img src=" + Image.IMAGE + "></a></td> " +
//                         "<td>" + Image.orientacion +
//                         "<td>" + Image.tags + "</td> " +
//                         "<td>" + Image.tamano + "</td> " +
//                         "<td>" + Image.imagen_completa_menu + "</td> " +
//                         "<td>" + Image.formato_imagen + "</td> " +
//                         "<td>" + Image.color + "</td> " +
//                         "</tr>";

//                     $("#filters-result").html(row);
//                 });
//             }
//         }
//     )
// }


function filtro() {
    // alert('click');

    var row = "";
    var orientacion = $("#orientacion").val();
    var tamano = $("#tamano").val();
    var imagen_completa_menu = $("#imagen_completa_menu").val();
    $.ajax(
        {
            type: "POST",
            url: "vista/filtros.php",
            data: { orientacion: orientacion, tamano: tamano, imagen_completa_menu: imagen_completa_menu },
            success: function (data) {

                $.each(JSON.parse(data), function (key, Image) {
                    row = row +
                        "<tr>" +
                        "<td>" + Image.TITLE + "</td> " +
                        "<td>" + Image.DESCRIPTION + "</td> " +
                        "<td><a style=width: 50%;height: 10%><img src=" + Image.IMAGE + "></a></td> " +
                        "<td>" + Image.orientacion +
                        "<td>" + Image.tags + "</td> " +
                        "<td>" + Image.tamano + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +
                        "<td>" + Image.formato_imagen + "</td> " +
                        "<td> " + Image.ID + "</td>" +











                        "</tr>"
                    $("#filters-result").html(row);
                });
            }
        }
    )

}






function filtro_tipo(imagen_completa_menu) {

    var row = "";
    $.ajax(
        {
            type: "POST",
            url: "vista/filtro_tipo.php",
            data: { imagen_completa_menu: imagen_completa_menu },
            success: function (data) {
                $.each(JSON.parse(data), function (key, Image) {
                    row = row +
                        "<tr>" +
                        "<td>" + Image.TITLE + "</td> " +
                        "<td>" + Image.DESCRIPTION + "</td> " +
                        "<td><img src=" + Image.IMAGE + "></td> " +
                        "<td>" + Image.orientacion +
                        "<td>" + Image.tags + "</td> " +
                        "<td>" + Image.tamano + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +
                        "<td>" + Image.formato_imagen + "</td> " +
                        "<td>" + Image.color + "</td> " +
                        "</tr>";

                    $("#filters-result").html(row);
                });
            }
        }
    )
}


function imagen_completa_menu() {
    // alert('click');
}

document.getElementById('imagen_completa_menu').onclick = imagen_completa_menu;






function filtro_tags(tags) {

    var row = "";
    $.ajax(
        {
            type: "POST",
            url: "vista/filtro_tags.php",
            data: { tags: tags },
            success: function (data) {

                $.each(JSON.parse(data), function (key, Image) {
                    row = row +
                        "<tr>" +
                        "<td>" + Image.TITLE + "</td> " +
                        "<td>" + Image.DESCRIPTION + "</td> " +
                        "<td><img src=" + Image.IMAGE + "></td> " +
                        "<td>" + Image.orientacion +
                        "<td>" + Image.tags + "</td> " +
                        "<td>" + Image.tamano + "</td> " +
                        "<td>" + Image.imagen_completa_menu + "</td> " +
                        "<td>" + Image.color + "</td> " +
                        "<td>" + Image.formato_imagen + "</td> " +


                        "</tr>";

                    $("#filters-result").html(row);
                });
            }
        }
    )
}









