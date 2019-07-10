<?php
    require "conexion.php";
    $id_pregunta = $_POST["pregunta"];
    $sql1="SELECT * FROM preguntas 
            WHERE orden = ".$id_pregunta;    
    $resultado1=mysqli_query($link, $sql1) or die (mysqli_error($link));
    $fila1=mysqli_fetch_assoc($resultado1);
    echo json_encode($fila1);
?>