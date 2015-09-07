 <?php 
 session_start();
 header('Content-Type: text/html; charset=UTF-8');
 require_once "bd/conexion.php";
 require_once "bd/listado_personas.php";
 ?>
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
  
 <h2>Los Datos se Registraron correctos!</h2>
 <?php 

	$pdo= conectar();

	$pdo= ingresar_variables($pdo,$datos);

	$results = datos_bd($pdo);
	tabla ($results);
		
?>
</div>

</body>
</html>
