<?php
$hostname='localhost';
$database='pi';
$username='root';
$password='';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "Hay problemas internos";
}
?>