<!DOCTYPE>
<html>
<head>
  <title>Formulario</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	
<div class="container">
  
 <h2>Esta todo!</h2>
 <?php 
 echo 'Apellido y Nombre: '.$apellido.', '.$nombre.' <br>Documento: '.$documento.'<br>Sexo: '.$sexo.'<br>Domicilio: '.$domicilio.'<br>Provincia Nacimiento: '.$provinciaNacimiento.'<br>Fecha de Nacimiento: '.$diaNacimiento.'/'.$mesNacimiento.'/'.$anioNacimiento.'.<br>Provincia: '.$provincia.'<br>Ciudad: '.$ciudad;
 
			$dia = date("d");
			$mes = date("m");
			$año = date("Y");
			echo "Fecha de expedición ".$dia."/".$mes."/".$año."."; ?>
			<br>
			
			<?php $año +=20;
			echo "Fecha de vencimiento ".$dia."/".$mes."/".$año."."; 
			
			 
// $pdo = new PDO('mysql:host=localhost;dbname=db_clientes','root','udc');
 //$statement= $pdo -> query("INSERT INTO DatosDNI(nombre , apellido) VALUES ('$apellido','$nombre', '$sexo', '$ejemplar','$domicilio','$documento','$provinciaNacimiento','$diaNacimiento','$mesNacimiento','$anioNacimiento','$provincia','$ciudad')"); 

?>
</div>

</body>
</html>



