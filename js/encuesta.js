function damePregunta(){
    $("#encuestaBienvenida").hide(); // esconde el elemento que tenga id="encuestaBienvenida"    
    $("#botonSiguienteDiv").show(); // muestra el elemento que tenga id="botonSiguienteDiv"
    
    $.ajax({ url: 'damePregunta.php', // por ajax llamas al archivo damePregunta.php
        data: {pregunta: $("#numeroDePregunta").val() }, // captura el dato "pregunta" del div hidden de id="numeroDePregunta"
        type: 'post',   
        success: function(data) {
            
            $("#pregunta").html(data["pregunta"]);
            $("#tipoDePregunta").val(data["tipo_pregunta"]);
            $("#idPregunta").val(data["idpreguntas"]);

            $("#respuestasTexto").hide();
            $("#respuestasFijas").hide();
            $("#respuestasValoracion").hide();
            $("#respuestasCumple").hide();
            
            if (data["tipo_pregunta"] == '1'){
                $("#respuestasTexto").show();
            }else if (data["tipo_pregunta"] == '2'){
                dameRespuestasFijas();
            }else if (data["tipo_pregunta"] == '3'){
                $("#respuestasValoracion").show();
            }else if (data["tipo_pregunta"] == '4'){
                $("#pregunta").show();
                $("#respuestasCumple").show();
            }
            
            if (data["idpreguntas"] == '17') {
                $("#botonFinalizarDiv").show();
                $("#botonSiguienteDiv").hide();
            }
            if (data["idpreguntas"] == '18') {
                $("#botonFinalizarDiv").hide();
                $("#botonSiguienteDiv").hide();
                $("#encuestaDespedida").show();
            }
            
        },
        dataType:"json"
    });

}   

function dameRespuestasFijas(){
    $.ajax({ url: 'dameRespuestasFijas.php',
        data: {pregunta: $("#idPregunta").val() },
        type: 'post',
        success: function(data) {
            $("#inputRadioButton").html(data);
            $("#respuestasFijas").show();
        },
        dataType:"json" 
    });
}


function siguientePregunta(){
    var tipoDePregunta = $("#tipoDePregunta").val()
    //  if (tipoDePregunta == '1'){
    //     if ($('#textareaId').val() == ""){
    //         alert("Debe completar los comentarios.");
    //         return;
    //     }
    // }else  
    if (tipoDePregunta == '2'){
        var valorRadio = $('input:radio[name=respuestaFija]:checked').val();
        if (valorRadio == undefined){
            alert("Debe seleccionar una opción.");
            return;
        }
    }else if (tipoDePregunta == '3'){
        var valorRadio = $('input:radio[name=rating]:checked').val();
        if (valorRadio == undefined){
            alert("Debe seleccionar una opción.");
            return;
        }
    }else if (tipoDePregunta == '4'){
        var valorRadio = $('input[type=date]').val();
    }
    
    grabarRespuesta(tipoDePregunta);
    
    var numeroPregunta = $("#numeroDePregunta").val();
    if (numeroPregunta == "16"){
        $("#respuestasTexto").hide();
        $("#pregunta").hide();
        $("#botonFinalizarDiv").show();
        $("#botonSiguienteDiv").hide();
        numeroPregunta = parseInt(numeroPregunta) + 1;
    }else if (numeroPregunta == "17"){
        $("#botonFinalizarDiv").hide();
        $("#encuestaDespedida").show();
        $("#respuestasCumple").hide();
        $("#pregunta").hide();
        //ACa podria poner un set time out para que te reenvie al formulario otra vez.
        window.setTimeout(function(){
            // Move to a new location or you can do something else
            window.location.href = "index.php";
        }, 5000);
        return;
    }else{
        numeroPregunta = parseInt(numeroPregunta) + 1;
    }
    
    $("#numeroDePregunta").val(numeroPregunta);
    damePregunta();
}


function grabarRespuesta(tipoDePregunta){
    // inicializo variables
    // var persona_id = $('#idPersona').val();
    var pregunta_id = $('#idPregunta').val();
    var respuesta_fija_id = "null";
    var respuesta_txt = "' '";
    var respuesta_valoracion = "0";
    var respuesta_cumple = "";
    
    // segun el tipo de pregunta, obtengo la respuesta
    if (tipoDePregunta == '1'){
        respuesta_txt = $('#textareaId').val();
    }else if (tipoDePregunta == '2'){
        respuesta_fija_id = $("input[type='radio'][name='respuestaFija']:checked").val();
    }else if (tipoDePregunta == '3'){
        respuesta_valoracion = $("input[type='radio'][name='rating']:checked").val();
        $('input:radio[name=rating]').prop('checked', false);
    }else if (tipoDePregunta == '4'){
        respuesta_cumple = $("input[type='date']").val();
    }
    
    // ejecuto el ajax que llama a la funcion de php que inserta la respuesta, en el campo data le mando los parametros que obtuve antes.
    $.ajax({ url: 'grabarRespuesta.php',
        data: {
            // persona_id: persona_id,
            pregunta_id: pregunta_id,
            respuesta_fija_id: respuesta_fija_id,
            respuesta_txt: respuesta_txt,
            respuesta_valoracion: respuesta_valoracion,
            respuesta_cumple: respuesta_cumple
        },
        type: 'post',
        success: function(retorno) {
            if (retorno != "OK"){
                alert(retorno);
            }
        },
        dataType:"json" 
    });
    
}
