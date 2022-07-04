<?php
    $con = mysqli_connect("localhost", "root", "", "whole");
    
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $response = array();
    try {   
        $statement = mysqli_prepare($con, "INSERT INTO usuarios (usuario, password, nombre) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($statement, "sss", $usuario, $password, $nombre,);
        $r = mysqli_stmt_execute($statement);
        $response["success"] = $r; 
    } catch (Exception $e) {
                
        $response["success"] = false;  
    }
    echo json_encode($response);
?>