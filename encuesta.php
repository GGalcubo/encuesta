<?php
    require "conexion.php";

    
// ------- BUSCO LA ULTIMA PREGUNTA RESPONDIDA POR ESA PERSONA

    $sql2 = "SELECT rp.pregunta_id, p.orden
            FROM respuesta_persona rp
            INNER JOIN preguntas p ON p.idpreguntas = rp.pregunta_id
            ORDER BY p.orden DESC
            LIMIT 1";
    
    $resultado2=mysqli_query($link, $sql2) or die (mysqli_error($link)); 

    $número_respuestas = mysqli_num_rows($resultado2);
    
    $fila2=mysqli_fetch_assoc($resultado2);
    
    $ordenPregunta = $fila2['orden'];
    
    if ($ordenPregunta == 0) {
        $ultimaRespuesta = 1;
    }else if ($ordenPregunta == 20)
        header("Location: encuestaCompleta.php");
    else{
        $fila2=mysqli_fetch_assoc($resultado2);
        $ultimaRespuesta=$fila2['orden'] + 1;
    }
    
  

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Encuesta</title>
        
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/encuesta.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
		<!-- FIN -->
    </head>
	<body>

        <div id="encuesta">

            <div id="encuestaBienvenida">
                <p>Gracias por participar de esta Encuesta. <br>
                Prometemos que solo te va a tomar unos minutos contestarla. <br> <br>
                Para nosotros es muy importante tu opini&oacute;n y nos ayudar&aacute; a saber c&oacute;mo estamos y qu&eacute; debemos mejorar, de cara al futuro, para seguir creciendo.</p>
	            <div class="boton" id="botonComenzarDiv">
	                <a name="botonComenzar" id="botonComenzar" onclick="javascript:damePregunta();"><img src="imagenes/botonComenzar.PNG" alt="Botón Comenzar"></a>
	            </div>
            </div>
            
        
        
            <input type="hidden" name="numeroDePregunta" id="numeroDePregunta" value="<?php echo $ultimaRespuesta ?>">
            <input type="hidden" name="tipoDePregunta" id="tipoDePregunta" value="">
            <input type="hidden" name="idPregunta" id="idPregunta" value="">
            <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $idPersona ?>">
            
            
            <div id="pregunta"></div> 
            
            <div id="respuestasValoracion" style="display: none;">
                <form class="rating-form" action="#" method="post" name="rating-movie">
                  <fieldset class="form-group">
                    
                    <legend class="form-legend">Rating:</legend>
                    
                    <div class="form-item">
                      
                      <input id="rating-5" name="rating" type="radio" value="5" />
                      <label for="rating-5">
                        <span class="rating-star">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star"></i>
                        </span>
                        
                      </label>
                      
                      <input id="rating-4" name="rating" type="radio" value="4" />
                      <label for="rating-4">
                        <span class="rating-star">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star"></i>
                        </span>
                        
                      </label>
                      
                      <input id="rating-3" name="rating" type="radio" value="3" />
                      <label for="rating-3">
                        <span class="rating-star">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star"></i>
                        </span>
                        
                      </label>
                      
                      <input id="rating-2" name="rating" type="radio" value="2" />
                      <label for="rating-2">
                        <span class="rating-star">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star"></i>
                        </span>
                        
                      </label>
                      
                      <input id="rating-1" name="rating" type="radio" value="1" />
                      <label for="rating-1">
                        <span class="rating-star">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star"></i>
                        </span>
                        
                      </label>
                      
                    </div>
                    
                  </fieldset>
                </form>
                
            </div> 
            
            <div id="respuestasFijas" style="display: none;">
                <div id="inputRadioButton" class="input"></div>
            </div> 
            
            <div id="respuestasTexto" style="display: none; border: 1px solid #333;">
                <textarea id="textareaId" rows="4" cols="72" maxlength="" ></textarea>
            </div>

            <div id="respuestasCumple" style="display: none;">
                <form id="formCumple">
                  <fieldset>
                    <legend>Tu Cumpleaños</legend>
                    <!-- <label class="formCumple" for="nacimiento">Fecha de Nacimiento</label> -->
                    <input class="formCumple" type="date" id="nacimiento" name="nacimiento" placeholder="DD/MM/AAAA"/>

                    <!-- <input class="formCumple" type="submit" name="enviar" onclick="javascript:siguientePregunta();"> -->
                  </fieldset>
                </form>
            </div>  
                  
            <div class="boton" id="botonSiguienteDiv" style="display: none;">
                <a name="botonSiguiente" id="botonSiguiente" onclick="javascript:siguientePregunta();"><img src="imagenes/botonSiguiente.PNG" alt="Botón Siguiente"></a>
            </div>
            
            <div class="boton" id="botonFinalizarDiv" style="display: none;">
                <a name="botonFinalizar" id="botonFinalizar" onclick="javascript:siguientePregunta();"><img src="imagenes/botonFinalizar.png" alt="Botón Finalizar"></a>
            </div>
            
            <div id="encuestaDespedida" style="display: none;">
                <p><b>MUCHAS GRACIAS!</b></p>
                <p class="firma">Equipo de Logos Traslados.</p>    
            </div> 
            
        </div>

	</body>
</html>