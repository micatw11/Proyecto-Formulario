<?php
require_once "conexion.php";
try {
    $pdo=conectar();
    

$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;

$sql =""
        . "select emp_no as id, "
        . "concat_ws(' ', first_name, last_name) as label, "
        . "concat_ws(' ', first_name, last_name) as value "
        . "from employees.employees where upper(last_name) like :apellido limit 10";
$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->bindParam(':apellido', $apellido);
$stmt->execute();

$results = $stmt->fetchAll();


//COMIENZA EL WEB SERVICE
header('Content-Type: application/json; charset=UTF-8');

echo json_encode($results, true);

} catch (PDOException $e) {
	 
    die('Error de conexion: ' . $e->getMessage());
}
