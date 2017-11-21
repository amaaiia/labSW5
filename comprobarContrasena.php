<?php
    require_once("nusoap/src/nusoap.php");

  $soapclient = new nusoap_client('https://swjo35c.000webhostapp.com/servicios/servicioContrasenas/servicioContrasena.php?wsdl',true);
  
  if (isset($_POST['textoContrasena'])){
    $respuesta = $soapclient->call('compr',array( 'x'=>$_POST['textoContrasena']));
    echo $respuesta;

  }
?>