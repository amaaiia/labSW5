<?php
    require_once("nusoap/src/nusoap.php");

  $soapclient = new nusoap_client( 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',
  true);
  
  if (isset($_POST['textoEmail'])){
    $respuesta = $soapclient->call('comprobar',array( 'x'=>$_POST['textoEmail']));
    echo $respuesta;
  }
?>