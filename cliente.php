<?php
session_start();
///Si este nombre de usuario no ezsta logea me devolvera a index.html
if (!isset($_SESSION["username"])) {
  header("Location:index.html");
}
?>

<!doctype html>
<html lang="es-ES">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Dalton-Emilio, Vinicio, Mustafa">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WHOLE AUTOMATION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="pricing.css" rel="stylesheet">
  <!-- script de google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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

  <div class="primero" style="z-index:1000;">
    <a class="segundo" href="cliente.php">WHOLE AUTOMATION</a>
    <div style="color: white; display: inline-flex; align-items: center;">
      <p style="display: inline; padding-top: 15px;">
        Hola <?php echo $_SESSION["username"]; ?>! &nbsp; &nbsp;
      </p>
      <a href="logout.php">
        <img src="./img/img_logout.png" style="width:20px; height:20px; background-color: white; border-radius: 50%;">
      </a>
    </div>
  </div>



  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>


  </svg>
  <div class="miContenedor">
    <div class="container py-3">
      <main>
        <h1 style="font-weight: bold; font-size: 20px; padding-top: 10px;" class="display-6 text-center mb-4">CONTROL HOGAR</h1>

        <div class="table-responsive">
          <div>
          </div>
          <table class="table text-center">
            <thead>
              <tr>
                <th style="width: 34%;"></th>
                <th id="on" style="width: 22%;">ON</th>
                <th id="off" style="width: 22%;">OFF</th>
                <th style="width: 22%;">Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row" class="text-start">Caldera</th>
                <td><input type="button" method="get" id="enciende" name="on" class="btn btn-success"></td>
                <td><input type="button" method="get" id="apaga" name="off" class="btn btn-danger"></td>

                <td>
                  <!--Esta parte del cogigo es la confirmacion de si esta encendiada o apagada pero no funciona del todo.-->
                  <?php
                  if (isset($_GET["error"]) && $_GET["error"] == 0) {
                    if (isset($_GET["caldera_encendida"]) && $_GET["caldera_encendida"] == 1) {
                      echo "<h4>ON</h4>";
                    } elseif (isset($_GET["caldera_apagada"]) && $_GET["caldera_apagada"] == 1) {
                      echo "<h4>OFF</h4>";
                    }
                  }

                  ?>
              </tr>





              <!--///////////////////////CONTROLADOR DE TIEMPOS////////////////////////////////////-->
              <tr>
                <th style="">Información:</th>

              </tr>

              <!--//////////////////////////////////////////////////////////////////////////////////////////-->

              <tr>
                <th scope="row" class="text-start">Luz 1</th>
                <td><input type="button" method="GET" id="enciende2" name="on" class="btn btn-success"></td>
                <td><input type="button" method="GET" id="apaga2" name="off" class="btn btn-danger"></td>
                <td>
                  <?php
                  if (isset($_GET["error"]) && $_GET["error"] == 0) {
                    if (isset($_GET["luz1_encendida"]) && $_GET["luz1_encendida"] == 1) {
                      echo "<h4>ON</h4>";
                    } elseif (isset($_GET["luz1_apagada"]) && $_GET["luz1_apagada"] == 1) {
                      echo "<h4>OFF</h4>";
                    }
                  }

                  ?>

                </td>

              </tr>


              <!--///////////////////////CONTROLADOR DE TIEMPOS////////////////////////////////////-->
              <tr>
                <th style="">Información:</th>

              </tr>

              <!--//////////////////////////////////////////////////////////////////////////////////////////-->


            </tbody>

          </table>
        </div>
      </main>

    </div>
  </div>
  <!-- aqui empieza los sensores de temperatura -->
  <div>
      <div id="Medidores"></div>
    </div>
</body>
<script type="text/JavaScript" src="js/jquery-1.7.2.min.js"></script>
<script src="js/tempHumedad.js"></script>
<script src="js/cliente.js"></script>

</html>