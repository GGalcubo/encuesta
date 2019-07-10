<?php
    require "conexion.php";

    session_start();

    
    // obtengo los parametros que le mande desde el javascript
    $persona_id = $_SESSION['idpersona'];
    $pregunta_id = $_POST["pregunta_id"];
    $respuesta_fija_id = $_POST["respuesta_fija_id"];
    $respuesta_txt = $_POST["respuesta_txt"];
    $respuesta_valoracion = $_POST["respuesta_valoracion"];
    $respuesta_cumple = $_POST["respuesta_cumple"];
            
    $sql2="INSERT INTO `encuesta`.`respuesta_persona`
        (`persona_id`, `pregunta_id`, `respuesta_fija_id`, `respuesta_txt`, `respuesta_valoracion`, `respuesta_cumple`)
    VALUES
        (".$persona_id.",".$pregunta_id.",".$respuesta_fija_id.",'".$respuesta_txt."',".$respuesta_valoracion.",'".$respuesta_cumple."');";
    
    if (mysqli_query($link, $sql2)) {
        echo json_encode("OK");
    } else {
        echo json_encode("Error: " . $sql2 . "<br>" . mysqli_error($link));
    }

?>