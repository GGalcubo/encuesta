<?php
    require "conexion.php";
    
    // obtengo los parametros que le mande desde el javascript
    $cod = $_GET["cod"];
    $sql = "SELECT * FROM personas WHERE codigo = '".$cod."'";

    $resultado = mysqli_query($link, $sql);
    
    $número_filas = mysqli_num_rows($resultado);

    if ($número_filas != 1) {
        header("Location: noindex.php");
    }
    
    $fila = mysqli_fetch_assoc($resultado);
    
    $idPersona = $fila['idpersonas'];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Logos Traslados</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="js/encuesta.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    </head>
    <body>
        
        <div id="encuesta">

            <div id="encuestaBienvenida">
                <p>Gracias por participar de esta Encuesta. <br>
                Prometemos que solo te va a tomar unos minutos contestarla. <br> <br>
                Para nosotros es muy importante tu opinión y nos ayudará a saber cómo estamos y qué debemos mejorar, de cara al futuro, para seguir creciendo.</p>
                <div class="boton" id="botonComenzarDiv">
                    <a name="botonComenzar" id="botonComenzar" onclick="javascript:damePregunta();"><img src="imagenes/botonComenzar.png" alt="Botón Comenzar"></a>
                </div>   
            </div>
        
        
            <input type="hidden" name="numeroDePregunta" id="numeroDePregunta" value="1">
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
                <div id="inputRadioButton"></div>
            </div> 
            
            <div id="respuestasTexto" style="display: none; border: 1px solid #333;">
                <textarea id="textareaId" rows="4" cols="75" maxlength="" ></textarea>
            </div> 
                  
            <div class="boton" id="botonSiguienteDiv" style="display: none;">
                <a name="botonSiguiente" id="botonSiguiente" onclick="javascript:siguientePregunta();"><img src="imagenes/botonSiguiente.png" alt="Botón Siguiente"></a>
            </div>
            
            <div class="boton" id="botonFinalizarDiv" style="display: none;">
                <a name="botonFinalizar" id="botonFinalizar" onclick="javascript:siguientePregunta();"><img src="imagenes/botonFinalizar.png" alt="Botón Finalizar"></a>
            </div>
            
            <div id="encuestaDespedida" style="display: none;">
                <p><b>MUCHAS GRACIAS!</b></p>
                <p class="firma">Equipo de Logos Traslados</p>    
            </div> 
            
        </div>
    </body>
</html>
