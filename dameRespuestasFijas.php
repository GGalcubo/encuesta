<?php
    require "conexion.php";
    $id_pregunta = $_POST["pregunta"];
    $sql2="SELECT * FROM respuestas_fijas
            WHERE pregunta_id = ".$id_pregunta;
    $resultado2=mysqli_query($link, $sql2) or die (mysqli_error($link));    
    
    $retorno = "";    
    while($fila=mysqli_fetch_assoc($resultado2)){
        $retorno = $retorno."<input type='radio' name='respuestaFija' id='respuestaFija' value='".$fila['idrespuestas_fijas']."'>".$fila['descripcion']."<br>";
    }
    
    echo json_encode($retorno);
?>