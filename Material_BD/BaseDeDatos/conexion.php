<?php
$hostname='localhost';
$database='db';
$username='user';
$password='password';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "Hay problemas internos";
}
?>