<!doctype html>
<html lang="es-ES">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Dalton-Emilio, Vinicio, Mustafa">
  <title>WHOLE AUTOMATION</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="signin.css" rel="stylesheet">
  <link href="./css/estilos.css" rel="stylesheet">
  <script src="jquery-1.7.2.min.js" type="text/javascript"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>
<body>
        <div class="">
            <form action="registro.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Registro</h1>

              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuario">
                <label for="floatingInput">Usuario</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
              </div>
                
              <button type="submit" class="w-100 btn btn-lg btn-primary" name="login" value="login">Registrarse</button>
            </form>
        </div>
</body>

</html>