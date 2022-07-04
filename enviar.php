<?php

// Declaración de variables del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['Mensaje'];

// Datos del email
$para = 'wholeautomation@tuta.io';
$titulo = 'Solicitud de informacion';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n Telefono: $telefono\n E-Mail: $email\n Mensaje:\n $mensaje";

if ($_POST['submit']) {

    if (mail($para, $titulo, $msjCorreo, $header)) {

    echo "<script language='javascript'>
    alert('Mensaje enviado, muchas gracias por contactar con nosotros.');
    </script>";
    } else {
        echo 'Fallo el envio';
    }
}

?>