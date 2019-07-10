<?php
    require "conexion.php";

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

          <form class="formPersonas" action="grabarPersona.php" method="POST">
            
            <fieldset>
                <legend>Antes de comenzar</legend>
                <label class="formPersonas" for="nombre">Nombre</label>
                <input class="formPersonas" type="text" id="nombre" name="nombre" placeholder="Juan" required />
                <label class="formPersonas" for="apellido">Apellido</label>
                <input class="formPersonas" type="text" id="apellido" name="apellido" placeholder="Pérez" required />
                <label class="formPersonas" for="empresa">¿Dónde trabajas?</label>
                <input class="formPersonas" type="text" id="empresa" name="empresa" placeholder="Nombre de la empresa" required />
                <label class="formPersonas" for="sector">¿En qué sector trabajas?</label>
                <input class="formPersonas" type="text" id="sector" name="sector" placeholder="Sector de la empresa" required />
                <!-- <label class="formPersonas" for="nacimiento">Fecha de Nacimiento</label>
                <input class="formPersonas" type="date" id="nacimiento" name="nacimiento" placeholder="dd/mm/aaaa" required/> -->
                <input class="formPersonas" type="submit" name="enviar" value="Enviar">
            </fieldset>
            
          </form>
        
            <input type="hidden" name="numeroDePregunta" id="numeroDePregunta" value="<?php echo $ultimaRespuesta ?>">
            <input type="hidden" name="tipoDePregunta" id="tipoDePregunta" value="">
            <input type="hidden" name="idPregunta" id="idPregunta" value="">
            <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $idPersona ?>">
            
        </div>

	</body>
</html>