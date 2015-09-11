<?php

 function conectar(){
try {
    $pdo = new PDO('mysql:host=localhost;dbname=personas','root','udc');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $pdo->exec("SET NAMES UTF8");
	 return $pdo;
} catch (PDOException $e) {
	 
    echo 'Error de conexion: ' . $e->getMessage();
}
}


 function ingresar_variables($pdo,$datos){
try {
	$pdo->beginTransaction();
	$sql= "INSERT INTO personas.personas (apellido, nombre , dni,sexo,nacionalidad,"
	."provincia, ciudad,domicilio,fecha_nacimiento,provincia_nacimiento,fecha_expedicion,fecha_vencimiento)"
	."VALUES ('".$datos['apellido']."','".$datos['nombre']."','".$datos['documento']."','"
	.$datos['sexo']."','".$datos['nacionalidad']."','".$datos['provincia']."','"
	.$datos['ciudad']."','".$datos['domicilio']."','".$datos['fechaNacimiento']."','"
	.$datos['provinciaNacimiento']."','".$datos['fechaExpedicion']."','".$datos['fechaVencimiento']."')";
    $pdo->exec($sql); 
    $pdo->commit();
    return $pdo;
} catch (PDOException $e) {
	 $pdo->rollBack();
    echo 'Error de insercion de archivos: ' . $e->getMessage();
}
}

 function datos_bd($pdo){
try {
	$sql ="SELECT * FROM personas";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchall();
	return $results;
} catch (PDOException $e) {
	 $pdo->rollBack();
    echo 'Error de peticion de registros: ' . $e->getMessage();
}
}

 function datos_limitados($pdo,$inicio, $TAMANO_PAGINA){
try {
	$sql ="SELECT * FROM personas LIMIT ".$inicio."," . $TAMANO_PAGINA;
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchall();
	return $results;
} catch (PDOException $e) {
    echo 'Error de peticion de registros: ' . $e->getMessage();
}
}




