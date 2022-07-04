<?php
    $con = mysqli_connect("localhost", "root", "", "pi");
    
    $usuari = $_POST["usuario"];
    $contrasenya = $_POST["contrasenya"];
    $response = array();
    try {   
        
        $statement = mysqli_prepare($con, "INSERT INTO user (usuario, contrasenya) VALUES (?, ?)");
        mysqli_stmt_bind_param($statement, "ss", $usuario, $contrasenya);
        $r = mysqli_stmt_execute($statement);
        $response["success"] = $r; 
    } catch (Exception $e) {
                
        $response["success"] = false;  
    }
    echo json_encode($response);
?>