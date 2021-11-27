<?php
class ImagenEdit extends Conexion
{
  public function select($id)
  {
    $data = null;
    $sql = "call pr_modificar_tags($id)";
    if ($consulta = $this->conectar()->query($sql)) {
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  }
  public function update($id)
  {
    if (isset($_POST['editarBtn'])) {
      if (
        empty($_POST['titlePostEdit']) &&
        empty($_POST['descriptionPostEdit'])
        && empty($_POST['tagsPostEdit'])
        && empty($_POST['orientacionPostEdit'])
        && empty($_POST['tamanoPostEdit']) && empty($_POST['imagen_completa_menuPostEdit'])
        && empty($_POST['formato_imagenPostEdit'])
      ) {

        echo '<script>alert("Fill in the blanks");</script>';
      } else {
        $title = $_POST['titlePostEdit'];
        $desc = $_POST['descriptionPostEdit'];
        $tags = $_POST['tagsPostEdit'];
        $orientacion = $_POST['orientacionPostEdit'];
        $tamano = $_POST['tamanoPostEdit'];
        $imagen_completa_menu = $_POST['imagen_completa_menuPostEdit'];
        $formato_imagen = $_POST['formato_imagenPostEdit'];


        $sql = "call pr_modificar_imagen('$title', '$desc', '$orientacion', '$tags', '$tamano',  '$imagen_completa_menu', '$formato_imagen', $id )";

        $this->conectar()->query($sql);
        header('location: ../index.php');
      }
    }
  }
}
