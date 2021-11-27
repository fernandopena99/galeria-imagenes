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




      <a href='excel.php'>
        <button class="btn btn-light my-2 my-sm-0" type="submit">Agregar Excel</button>
      </a>

    </div>
  </nav>
  <br>


  <div class="container">
    <div class='row'>
      <div class='col-md-8 card'>
        <h4 class='m-3'>Agregar Imagen</h4>
        <hr>
        <form action='../modelo/valImagen.php' method='post' class='card-body' enctype="multipart/form-data">
          <input type='text' class='form-control mb-3' name='titlePost' placeholder='Titulo'>
          <input type='text' class='form-control mb-3' name='descriptionPost' placeholder='Descripción'>

          <input type='text' class='form-control mb-3' name='tagsPost' placeholder='Tags'>


          <select class="form-control mb-3" name="orientacionPost" id="orientacionPost">
            <option value="">Orientación</option>
            <option value="Vertical">Vertical</option>
            <option value="Horizontal">Horizontal</option>
          </select>

          <input type='text' class='form-control mb-3' name='tamanoPost' placeholder='Tamaño'>


          <select class="form-control mb-3" name="imagen_completa_menuPost" id="imagen_completa_menuPost">
            <option value="">Tipo de imagen</option>
            <option value="Completa">Completa</option>
            <option value="Menu">Menu</option>
          </select>

          <input type='text' class='form-control mb-3' name='formato_imagenPost' placeholder='Formato Imagen'>


          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile02" name='imagePost'>
              <label class="custom-file-label" for="inputGroupFile02">Buscar Imagen</label>
            </div>
          </div>

          <input type='submit' class='btn btn-block btn-primary' name='insertarBtn' value='Agregar'>

        </form>
      </div>
    </div>
  </div>
  <br>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Optional JavaScript -->
  <script>
    $('.custom-file-input').on('change', function(event) {
      var inputFile = event.currentTarget;

      $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
    });
  </script>
</body>

</html>