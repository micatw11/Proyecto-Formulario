<?php

 function conectar(){
try {
    $pdo = new PDO('mysql:host=localhost;dbname=prueba_db','usuario_db','');
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
	$sql= "INSERT INTO prueba_db.personas (apellido, nombre , dni) VALUES ('".$datos['apellido']."','".$datos['nombre']."','".$datos['documento']."');";
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

