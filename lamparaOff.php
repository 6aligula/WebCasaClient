<?php

$off = $_GET['off'];
$sor = 1;

if ($off == "off") {
    $sor = 0;
    //echo $sor;
    $fileList = shell_exec('/YourPathHere/lampOff.sh');
    //echo "Luz apagada";
    header("Location: cliente.php?error=0&luz1_apagada=1");
} else {
    echo "Error";
    header("Location: cliente.php?error=1");
}
?>

