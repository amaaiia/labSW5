<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Cr&eacute;ditos</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registrar.php" >Registrarse</a></span>
      		<span class="right"><a href="login.php" >Login</a></span>
          <span class="logueadoDatos" id="logueadoImagen"></span></br></br>
          <span class="logueadoDatos"><label id = "usuarioMostrar"/></span>
      		<span class="right" style="display:none;" id ="logout" ><a href="logout.php">Logout</a></span>
          
          
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html' id="layout">Inicio</a></span>
		<span><a href='pregunta.php' id = "preguntas" style="display:none">Preguntas</a></span>
		<span><a href='creditos.php' id="creditos" >Creditos</a></span>
    <span><a href='verPreguntas.php' id="verPreguntas" style="display:none;">Ver preguntas</a></span>
    <span><a href='verPreguntasXML.php' id="verPreguntasXML" style="display:none;">Ver preguntas XML</a></span>
    <span><a href='obtenerPreguntasSw.php' id="obtener" style="display:none;">Obtener preguntas SW</a></span>
	</nav>
    <section class="main" id="s1">
    
	<div id='creditos'>
		<p id="creditosIniciales"> Amaia Alfageme y Jokin Ortega </br> Ingenier&iacute;a del Software </br> </p>
		<img src = "https://st-listas.20minutos.es/images/2016-03/408843/list_640px.jpg?1457897928" height = "15%" width = "15%">
		</br>
	
	</div>
  <h2>Tú estás aquí</h2>
  <div id = "map" style = "width:640px; height:480px;"></div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXNDbrS6Zz0JdDyJ0Hzt9bvj9iyQ8zqv8&callback=loadMap">
</script>

<script type="text/javascript" src='https://code.jquery.com/jquery-3.2.1.js'></script>
<script>
        function logueado(nombre,imagen){
            $('.right').hide();
            $('#layout').hide();
            $('#verPreguntas').show();
            $('#verPreguntasXML').show();
            $('#logout').show();
            $('#obtener').show();
            $('#preguntas').show();
            $('#usuarioMostrar').text("Bienvenido/a " + nombre);
            $('#logueadoImagen').html('<img src="imagenes/'+imagen+'" style="height:60px;width:auto" />');
          }

  
    $(document).ready(
        function(){
            getLocation();
                });

            
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(mostrarCoordenadas);
                } 
            }
            
            function mostrarCoordenadas(position) {
                $latitud = position.coords.latitude;
                $longitud = position.coords.longitude;
                $map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: {lat: $latitud, lng: $longitud},
                        zoomControl: false,
                        scaleControl: true
                      });
                $marker = new google.maps.Marker({
                    position:  {lat: $latitud, lng: $longitud},
                    map: map,
                    title: 'Estás aquí'
                  });
                $marker.setMap($map);
            }
</script>

<?php
function logueado(){
  $email = $_GET['usuario'];
  $link = mysqli_connect("localhost","id2920920_amaiajokin","","id2920920_quiz");
  $sql = "select * from usuarios where email = '$email'";
  $resul = mysqli_query($link,$sql);
  $datos = mysqli_fetch_array($resul);
  $nombre = $datos['nombre'];
  $img = $datos['foto'];
  echo "<script> logueado('$nombre','$img'); $('#textoEmail').attr('value','$email'); $('#textoEmail').attr('readonly','readonly');</script>";
  echo "<script> $('#fpreguntas').attr('action','pregunta.php?usuario=$email'); </script>";
  echo "<script> $('#preguntas').attr('href','pregunta.php?usuario=$email'); </script>";
  echo "<script> $('#creditos').attr('href','creditos.php?usuario=$email'); </script>";
  echo "<script> $('#obtener').attr('href','obtenerPreguntasSW.php?usuario=$email');</script>";
  mysqli_close($link);
}
if (isset($_GET['usuario'])){
    logueado();
  }

?>






 










