<?php
class Imagen extends Conexion
{
  public function insertar($img)
  {
    if (isset($_POST['insertarBtn'])) {
      if (
        empty($_POST['titlePost']) &&
        empty($_POST['descriptionPost']) && empty($_POST['imagePost'])
        && empty($_POST['orientacionPost']) && empty($_POST['tagsPost'])
        && empty($_POST['tamanoPost']) && empty($_POST['imagen_completa_menuPost'])
        && empty($_POST['formato_imagenPost'])

      ) {
        echo '<script>alert("Fill in the blanks");</script>';
      } else {
        $title = $_POST['titlePost'];
        $desc = $_POST['descriptionPost'];
        $image = $img->imageVal();
        $orientacion = $_POST['orientacionPost'];
        $tags = $_POST['tagsPost'];
        $tamano = $_POST['tamanoPost'];
        $imagen_completa_menu = $_POST['imagen_completa_menuPost'];
        $formato_imagen = $_POST['formato_imagenPost'];

        $sql = "call pr_insertar_imagen('$title', '$desc', '$image', '$orientacion', '$tags', '$tamano',  '$imagen_completa_menu', '$formato_imagen' )";
        $this->conectar()->query($sql);
        header('location: ../index.php');
      }
    }
  }

  public function mostrar()
  {
    $data = null;

    $sql = "call pr_mostrar_imagen";
    if ($consulta = $this->conectar()->query($sql)) {
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function verTamano()
  {
    $data = null;

    $sql = "SELECT DISTINCT tamano FROM imagecrud ";
    if ($consulta = $this->conectar()->query($sql)) {
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function verOrientacion()
  {
    $data = null;

    $sql = "SELECT DISTINCT orientacion FROM imagecrud ";
    if ($consulta = $this->conectar()->query($sql)) {
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  }


  public function verTipo()
  {
    $data = null;

    $sql = "SELECT DISTINCT imagen_completa_menu FROM imagecrud ";
    if ($consulta = $this->conectar()->query($sql)) {
      while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    return $data;
  }






  public function eliminar($id)
  {

    $sql = "call pr_eliminar_imagen($id)";
    $this->conectar()->query($sql);
  }
}
