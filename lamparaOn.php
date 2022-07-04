<?php

$on = $_GET['on'];

$sor = 0;

if ($on == "on") {
    $sor = 1;
    //echo $sor;
    $fileList = shell_exec('/home/pi/Desktop/lab/lamparaOn.sh');
    //echo "Luz prendida";

    header("Location: cliente.php?error=0&luz1_encendida=1");
    //echo "<pre> $fileList </pre>";
} else {
    //echo $sor;
    echo "Error";
    header("Location: cliente.php?error=1");
}
?>
