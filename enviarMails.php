<?php
    // ------- OBTENCION DE MAILS DE LA BASE DE DATOS	
	
	// Nos conectamos a la base
	require "conexion.php";
	// Pedimos los mails de la tabla personas
	$sql = "SELECT * FROM personas";  
	// Ejecutamos la sentencia y chequeamos error
	$resultado = mysqli_query($link, $sql) or die(mysqli_error());  
	// Agregamos un separador para listar los mails  
	$separador = ", ";  
	// Creamos una cadena de mails dinamica con todos los mails   
	$para="";   
    echo "Mail enviados: ";
	while ($fila = mysqli_fetch_assoc($resultado)) {   
    
        $para = $fila['email'];
        $codigo = $fila['codigo'];

        // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
        // El mensaje
        $mensaje = "<html>
                        <head>
                            <meta charset='utf-8'>
                            <link rel='stylesheet' type='text/css' href='http://www.logostraslados.com.ar/encuesta/css/estilos-mail.css'>
                            <link rel='stylesheet' type='text/css' href='http://www.logostraslados.com.ar/encuesta/css/normalize.css'>  
                            <title>Encuesta de Logos Traslados</title>
                        </head>
                        <body>
                            <div id='top'><img src='http://www.logostraslados.com.ar/encuesta/imagenes/mail_top.png' alt=''></div>    
                            <div id='mensaje'>
                                <p>Estamos dando los primeros pasos de este 2018, algunos de ustedes nos vienen acompañado <br> desde nuestros inicios y muchos otros recién nos están conociendo.\r\n 
                                Creemos que es un buen momento para saber qué piensan de nosotros, para que nos cuenten los <br> puntos altos y bajos de nuestro servicio, para que podamos intercambiar opiniones y para que nos <br> puedan sugerir caminos a seguir de acuerdo a sus necesidades particulares.\r\n 
                                En definitiva, creemos que es oportuno escucharlos y juntos hacer un análisis de este tiempo <br> transcurrido.\r\n 
                                Nuestro objetivo sigue siendo el mismo de siempre, escuchar a nuestros compañeros de ruta para <br> tratar de mejorar los servicios cada día y de esa manera poder seguir diciendo . . . POR UN AÑO <br>MÁS JUNTOS.\r\n
                                Les dejamos un link para que puedan acceder a la Encuesta que sólo les tomará unos minutos.\r\n
                                <a href=http://www.logostraslados.com.ar/encuesta/index.php?cod=".$codigo.">Ir a la encuesta</a>\r\n
                                Aspiramos a que todos Ustedes participen antes del XX de Febrero.\r\n
                                Luego les enviaremos los resultados por mail.\r\n
                                Muchas gracias.\r\n
                                Equipo de Logos Traslados.</p>
                            </div>
                            <div id='bottom'><img src='http://www.logostraslados.com.ar/encuesta/imagenes/mail_bottom.png' alt=''></div>
                        </body>
                    </html>
                    ";
                    
        $cabeceras = 'From: logostraslados@logos.com.ar' . "\r\n" . //La direccion de correo desde donde supuestamente se envió
            'Reply-To: logostraslados@logos.com.ar' . "\r\n" . //La direccion de correo a donde se responderá (cuando el receptor haga click en RESPONDER)
            'Content-type: text/html' . "\r\n";

        
        // El asunto del mail
        $titulo = "Encuesta Logos Traslados 2018";

        // Envio
        $mails = mail($para, $titulo, $mensaje, $cabeceras);

        echo $para." - ";
    }

?>