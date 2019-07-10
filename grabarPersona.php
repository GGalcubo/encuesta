<?php
    require "conexion.php";
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $empresa = $_POST["empresa"];
    $sector = $_POST["sector"];
    // $nacimiento = $_POST["nacimiento"];

    // session_start();

    // $_SESSION["nombre"] = $nombre;
    // $_SESSION["apellido"] = $apellido;
    // $_SESSION["empresa"] = $empresa;
    // $_SESSION["sector"] = $sector;
            
    $sql2="INSERT INTO `encuesta`.`personas`
        (`nombre`, `apellido`, `empresa`, `sector`)
    VALUES
        ('".$nombre."','".$apellido."','".$empresa."','".$sector."');";
    
    if (mysqli_query($link, $sql2)) {
        session_start();
        $_SESSION["idpersona"] = mysqli_insert_id($link);
        header("Location: encuesta.php");
    } else {
        echo json_encode("Error: " . $sql2 . "<br>" . mysqli_error($link));
    }

?>