<?php
include_once 'modelo/conexion.php';
include_once 'modelo/modelo.php';
$image = new Imagen();
$rows = $image->mostrar();
$tamano = $image->verTamano();
$orientacion = $image->verOrientacion();
$imagen_completa_menu = $image->verTipo();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- <?php require_once "scripts.php";  ?> -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js">
  <title>Administración</title>
</head>

<script text="text/javacripts">
  function confirmDelete() {
    var respuesta = confirm("¿Esta seguro de eliminar la imagen?");

    if (respuesta == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<body>
  <nav class="navbar navbar-dark bg-dark px-5">
    <a class="navbar-brand">Galeria de imagenes</a>
    <div class="form-inline">
      <a href='index.php'>
        <button class="btn btn-light mr-2 my-2 my-sm-0" type="submit">Imagenes</button>
      </a>
      <a href='pages/addImage.php'>
        <button class="btn btn-light my-2 my-sm-0" type="submit">Agregar Imagen</button>
      </a>
    </div>
  </nav>
  <br>
  <!-- FILTRO -->
  <!-- FILTRO ORIENTACIÓN -->
  <form class="row" id="multi-filters">
    <div class="col-3">
      <div class="form-check">
        <div class="list-group-item checkbox">
          <h6 class="text-center">Orientación</h6>
          <hr>
          <select onchange="filtro()" name="orientacion" id="orientacion">
            <option value="null">Seleccione una orientación</option>
            <?Php
            $orientacion = $image->verOrientacion();
            foreach ($orientacion as $row) {

            ?>
              <div>
                <option value="<?php echo $row['orientacion']; ?>"><?php echo $row['orientacion']; ?></option>
              </div>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- FILTRO DE TAMAÑO -->
    <div class="col-3">
      <div class="form-check">
        <div class="list-group-item checkbox">
          <h6 class="text-center">Tamaño</h6>
          <hr>
          <select onchange="filtro()" name="tamano" id="tamano">
            <option value="null">Seleccione un tamaño</option>
            <?Php
            $tamano = $image->verTamano();
            foreach ($tamano as $row) {
            ?>
              <div>
                <option value="<?php echo $row['tamano']; ?>"><?php echo $row['tamano']; ?></option>
              </div>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <!-- FILTRO IMAGEN COMPLETA O MENU -->
    <div class="col-3">
      <div class="form-check">
        <div class="list-group-item checkbox">
          <h6 class="text-center">Tipo de Imagen</h6>
          <hr>
          <select onchange="filtro()" name="imagen_completa_menu" id="imagen_completa_menu">
            <option value="null">Seleccione un tipo de imagen</option>
            <?Php
            $imagen_completa_menu = $image->verTipo();
            foreach ($imagen_completa_menu as $row) {
            ?>
              <div>
                <option value="<?php echo $row['imagen_completa_menu']; ?>"><?php echo $row['imagen_completa_menu']; ?></option>
              </div>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    </div>
  </form><br>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <td>Titulo</td>
        <td>Descripción</td>
        <td style="width: 20%;">Imagen</td>
        <td>Orientacion</td>
        <td>Tags</td>
        <td>Tamaño</td>
        <td>Tipo de imagen</td>
        <td>Formato Imagen</td>
        <td>Editar</td>
        <td>Eliminar</td>

      </tr>
    </thead>
    <tbody id="filters-result" class="bg-white">
      <?php
      foreach ($rows as $row) { ?>
        <tr>
          <td><?php echo $row['TITLE']; ?></td>
          <td><?php echo $row['DESCRIPTION']; ?></td>
          <td>
            <div class='p-3'>

              <p><img src="<?php echo $row['IMAGE']; ?>" style="width: 50%;height: 10%;"> </p>

            </div>
          </td>
          <td><?php echo $row['orientacion']; ?></td>
          <td><?php echo $row['tags']; ?></td>
          <td><?php echo $row['tamano']; ?></td>
          <td><?php echo $row['imagen_completa_menu']; ?></td>
          <td><?php echo $row['formato_imagen']; ?></td>

          <td class="text-center"><a href='pages/editImage.php?id=<?php echo $row['ID']; ?>'>

              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" class="bi bi-pencil-fill">

                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />

              </svg></a>

          </td>


          <td class="text-center"><a class="text-center" href='pages/deleteImage.php?id=<?php echo $row['ID']; ?>' onclick="return confirmDelete()">
              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">

                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />

              </svg></a>

          </td>


        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="vista/js.js"></script>
  <script src="assets/js/filtro.js"></script>
</body>

</html>