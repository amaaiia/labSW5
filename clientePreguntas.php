<?php
    require_once("nusoap/src/nusoap.php");

  $soapclient = new nusoap_client('https://swjo35c.000webhostapp.com/servicios/servicioPreguntas/obtenerPregunta.php?wsdl',true);
  
  if (isset($_POST['idPregunta'])){
    $respuesta = $soapclient->call('obtenerPregunta',array( 'x'=>$_POST['idPregunta']));
    echo ("Pregunta: ".$respuesta['enunciado']." <br/> Respuesta correcta: ".$respuesta['correcta']." <br/> Complejidad: ".$respuesta['complejidad']);
  }
?>