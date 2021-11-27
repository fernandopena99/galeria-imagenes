<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Administración</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark px-5">
    <a class="navbar-brand">Galeria de imagenes</a>
    <div class="form-inline">
      <a href='../index.php'>
        <button class="btn btn-light mr-2 my-2 my-sm-0" type="submit">Imagenes</button>
      </a>


      <a href='../pages/addImage.php'>
        <button class="btn btn-light my-2 my-sm-0" type="submit">Agregar Imagen</button>
      </a>
    </div>
  </nav>
  <br>

  <div class="container">
    <div class='row'>
      <div class='col-md-8 card'>
        <h4 class='m-3'>Editar Imagen</h4>
        <hr>
        <?php
        include_once '../modelo/conexion.php';
        include_once '../modelo/editar_modelo.php';
        $id = $_GET['id'];
        $image = new ImagenEdit();
        $image->update($id);
        $rows = $image->select($id);
        if (!empty($rows)) {
          foreach ($rows as $row) {
        ?>
            <form action='' method='post' class='card-body'>
              <h5>Titulo</h5>
              <input type='text' class='form-control mb-3' name='titlePostEdit' placeholder='Titulo' value='<?php echo $row['TITLE']; ?>'>
              <h5>Descripción</h5>
              <input type='text' class='form-control mb-3' name='descriptionPostEdit' placeholder='Descripción' value='<?php echo $row['DESCRIPTION']; ?>'>
              <h5>Tags</h5>
              <input type='text' class='form-control mb-3' name='tagsPostEdit' placeholder='Tags' value='<?php echo $row['tags']; ?>'>
              <h5>Orientación</h5>
              <select class="form-control mb-3" name="orientacionPostEdit" id="orientacionEditPost">
                <option><?php echo $row['orientacion']; ?></option>
                <option value="Vertical">Vertical</option>
                <option value="Horizontal">Horizontal</option>
              </select>
              <h5>Tamaño</h5>
              <input type='text' class='form-control mb-3' name='tamanoPostEdit' placeholder='Tamaño' value='<?php echo $row['tamano']; ?>'>
              <h5>Tipo de imagen</h5>
              <select class="form-control mb-3" name="imagen_completa_menuPostEdit" id="imagen_completa_menuPostEdit">
                <option><?php echo $row['imagen_completa_menu']; ?></option>
                <option value="Completa">Completa</option>
                <option value="Menu">Menu</option>
              </select>
              <h5>Formato Imagen</h5>
              <input type='text' class='form-control mb-3' name='formato_imagenPostEdit' placeholder='Formato Imagen' value='<?php echo $row['formato_imagen']; ?>'>

              <input type='submit' class='btn btn-block btn-success' name='editarBtn' value='Guardar'><br>

            </form>
        <?php }
        } ?>
      </div>
    </div>
  </div>
  <br>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>