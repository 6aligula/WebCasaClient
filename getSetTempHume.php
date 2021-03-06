<?php

$fp = fopen("temp.txt", 'r');
$fh = fopen("humedad.txt", 'r');

//Inicialitzo les dues variables
$temp = "";
$humedad = "";

/*recuperar datos del fichero temp.txt */
if (!$fp) {
    echo '<p>No he pogut. Torna a introduir-la</p>';
} else {
    //En cas que hagi pogut obrir bloquejo
    flock($fp, LOCK_EX);

    //Vaig extraient les dades de temp
    while (!feof($fp)) {
        $temp = $temp . fgets($fp, 1024);
    }
    //eliminar ultima linea en blanco
    $temp = chop($temp, " ");
    flock($fp, LOCK_UN);
    fclose($fp);
}

/*recuperar datos del fichero humedad.txt */
if (!$fh) {
    echo '<p>No he pogut. Torna a introduir-la</p>';
} else {
    //En cas que hagi pogut obrir bloquejo
    flock($fh, LOCK_EX);

    //Vaig extraient les dades de temp
    while (!feof($fh)) {
        $humedad = $humedad .  fgets($fh, 1024);
    }
    //eliminar la ultima coma en caso de que el fichero humedad tenga la ultima linea en blanco
    $humedad = chop($humedad, " ");
    flock($fh, LOCK_UN);
    fclose($fh);
}

/*tratamiento de errores del sensor, se resta dos ya que es chino y lee regular. La tolerancia del proximo sensor sera de 0.1%  */
$temp = (float)$temp - 2;
$humedad = (float)$humedad - 2;

/* inyeccion en la base de datos */
$llave = 0;
inserta($llave, $temp, $humedad);

//Un cop llegit la dada i guardada enm la BD borro els fitxers
if (unlink('temp.txt')) {
    // file was successfully deleted
    if (unlink('humedad.txt')) {
        // file was successfully deleted
        $res = array('val' => $ok);
        echo json_encode($res);
    } else {
        $ok = 0;
        $res = array('val' => $ok);
        echo json_encode($res);
    }
} else {
    // there was a problem deleting the file
    $ok = 0;
    $res = array('val' => $ok);
    echo json_encode($res);
}

//funcion para insertar en la tabla tblsensores
function inserta($llave,  $temp, $humedad)
{
    //base de datos para el server
    $h = 'localhost';
    $u = 'user';
    $p = 'password';
    $b = 'db';
    $ok = 1;

    $conn = mysqli_connect($h, $u, $p, $b);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //insert en la base de datos

    $sql = 'INSERT INTO tblsensores VALUES (' . $llave . ', ' . $temp . ', ' . $humedad . ');';
    if (mysqli_query($conn, $sql)) {
        $res = array('val' => $ok);
        echo json_encode($res);
    } else {
        $ok = 0;
        $res = array('val' => $ok);
        echo json_encode($res);
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
