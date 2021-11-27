<?php
require "../modelo/database.php";
$orientacion = $_REQUEST["orientacion"];
$tamano = $_REQUEST["tamano"];
$imagen_completa_menu = $_REQUEST["imagen_completa_menu"];
$query2 = "";
if ($orientacion != 'null' && $tamano == 'null' && $imagen_completa_menu == 'null') {
    $query = "SELECT * FROM imagecrud where orientacion='$orientacion' ";
    $query2 = "SELECT tamano FROM imagecrud where orientacion='$orientacion' ";
}
if ($orientacion != 'null' && $tamano != 'null' && $imagen_completa_menu == 'null') {
    $query = "SELECT * FROM imagecrud where orientacion='$orientacion'and tamano= '$tamano' ";
}
if ($orientacion != 'null' && $tamano == 'null' && $imagen_completa_menu != 'null') {
    $query = "SELECT * FROM imagecrud where orientacion='$orientacion'and imagen_completa_menu = '$imagen_completa_menu'  ";
    $query2 = "SELECT tamano FROM tamano where orientacion='$orientacion'and imagen_completa_menu = '$imagen_completa_menu'  ";
}
if ($orientacion != 'null' && $tamano != 'null' && $imagen_completa_menu != 'null') {
    $query = "SELECT * FROM imagecrud where orientacion='$orientacion'and tamano= '$tamano'and imagen_completa_menu = '$imagen_completa_menu'  ";
}
if ($orientacion == 'null' && $tamano != 'null' && $imagen_completa_menu != 'null') {
    $query = "SELECT * FROM imagecrud where  tamano= '$tamano' and imagen_completa_menu = '$imagen_completa_menu'  ";
}
if ($orientacion == 'null' && $tamano == 'null' && $imagen_completa_menu != 'null') {
    $query = "SELECT * FROM imagecrud where imagen_completa_menu = '$imagen_completa_menu'  ";
    $query2 = "SELECT tamano FROM imagecrud where imagen_completa_menu = '$imagen_completa_menu'  ";
}
if ($orientacion == 'null' && $tamano != 'null' && $imagen_completa_menu == 'null') {
    $query = "SELECT * FROM imagecrud where tamano = '$tamano'  ";
}
if ($orientacion == 'null' && $tamano == 'null' && $imagen_completa_menu == 'null') {

    $query = "SELECT * FROM imagecrud   ";
    $query2 = "SELECT tamano FROM imagecrud   ";
}

$imagecrud = $connection->query($query);
$image_list = [];
while ($image = $imagecrud->fetch(PDO::FETCH_ASSOC)) {
    $image_list[$image["ID"]] = $image;
}
echo json_encode($image_list);



//Array 2

/*if ($query2 != "") {
    $imagecrud2 = $connection->query($query2);
    

    while ($image2 = $imagecrud2->fetch(PDO::FETCH_ASSOC)) {
        $image_list[$image2["tamano"]] = $image2;
    }
}

$data = array(
    array("ID"),
    array("tamano"),
 
);


foreach($data as $query){
    foreach($query as $query2){
       
    }
    echo "<br>";
}*/
