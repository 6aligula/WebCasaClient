<?php

include_once('db.php');

$USUARIO = $_POST['usuario'];
$PASSWORD = $_POST['password']; 

if (!$conexion) {
    $err = 'Error intern. No es pot establir la connexió. Torni a probar-ho més tard';
    echo $err;
}


$insert = "INSERT INTO usuarios (usuario, password) values('" . $USUARIO . "','" . $PASSWORD . "')";
mysqli_query($conexion, $insert);

header("Location:index.html");
mysqli_close($conexion);
