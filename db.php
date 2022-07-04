<?php
//base de datos para el server
$h = 'localhost';
$u = 'pi';
$p = 'raspberry';
$b = 'whole';

//base de datos de pruebas
/* $h = 'localhost';
$u = 'root';
$p = '';
$b = 'whole'; */

$conexion = mysqli_connect($h, $u, $p, $b);
