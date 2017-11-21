<?php

    require_once("nusoap/src/nusoap.php");
    //creamos el objeto de tipo soap_server
    $ns="http://localhost/servicios/servicioContrasenas";
    $server = new soap_server();
    $server->configureWSDL('compr',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    //registramos la función que vamos a implementar
    $server->register('compr',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
    //implementamos la función
    function compr($contrasena){
        
        $pagina = file_get_contents("toppasswords.txt");
        $pos = strpos($pagina, $contrasena);
        if ($pos === false) {
            return 'VALIDA';
        } else {
            return 'INVALIDA';
        }
        
    }
    //llamamos al método service de la clase nusoap
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( "php://input" );
    $server->service($HTTP_RAW_POST_DATA);

?>