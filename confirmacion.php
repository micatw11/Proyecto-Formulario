 <?php 
 session_start();
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
 echo 'Apellido y Nombre: '.$apellido.', '.$nombre.' <br>Documento: '.$documento.'<br>Sexo: '.$sexo.'<br>Domicilio: '.$domicilio.'<br>Provincia Nacimiento: '.$provinciaNacimiento.'<br>Fecha de Nacimiento: '.$diaNacimiento.'/'.$mesNacimiento.'/'.$anioNacimiento.'.<br>Provincia: '.$provincia.'<br>Ciudad: '.$ciudad;
 
			$dia = date("d");
			$mes = date("m");
			$año = date("Y");
			echo "Fecha de expedición ".$dia."/".$mes."/".$año."."; ?>
			<br>
			
			<?php $año +=20;
			echo "Fecha de vencimiento ".$dia."/".$mes."/".$año."."; 
			
		header('Content-Type: text/html; charset=UTF-8');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=prueba_db','usuario_db','');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $pdo->exec("SET NAMES UTF8");
} catch (PDOException $e) {
	 
    echo 'Error de conexion: ' . $e->getMessage();
}

try {
	$pdo->beginTransaction();
	$sql= "INSERT INTO prueba_db.personas (apellido, nombre , dni) VALUES ('$apellido','$nombre',$documento);";
    $pdo->exec($sql); 
    $pdo->commit();
} catch (PDOException $e) {
	 $pdo->rollBack();
    echo 'Error de conexion: ' . $e->getMessage();
}
$sql ="select * from personas;";
echo $sql;
$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $fila) {
 echo Spirntf ( "%s%s %d dni",
$fila['apellido'],
$fila['nombre'],
$fila['documento']);
}
foreach ($results as $fila) {
 echo 'nombre apellido '.$fila['apellido'].','.$fila['nombre'].',edad '.$fila['documento'];
}


 //$statement= $pdo -> query("INSERT INTO DatosDNI(nombre , apellido) VALUES ('$apellido','$nombre', '$sexo', '$ejemplar','$domicilio','$documento','$provinciaNacimiento','$diaNacimiento','$mesNacimiento','$anioNacimiento','$provincia','$ciudad')"); 

?>
</div>

</body>
</html>



