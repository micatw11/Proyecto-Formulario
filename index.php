<?php 
 if (empty($_POST)){
	require_once "login.php";
}else{
session_start();	

//arreglos para mostrar pais, provincia, ciudad, meses
$Nacionalidad = array ('Argentina','Brazil','Bolivia','Chile','Colombia','Paraguay','Uruguay');
$Argentina = array ("Chubut","Buenos Aires","Catamarca","Chaco","Chubut","Cordoba","Corrientes","Entre Rios","Formosa","Jujuy","La Pampa","La Rioja","Mendoza","Misiones","Neuquen","Rio Negro","Salta","San Juan","San Luis","Santa Cruz","Santa Fe","Santiago del Estero","Tierra del Fuego","Tucuman");
$Chubut = array ("Trelew","Rawson","Puerto Madryn","Comodoro Rivadavia");
$Meses= array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$Ejemplares = array ('A','B','C','D','E');

//$datos= [];

//$datos['documento'] = filter_var($_POST['documento'], FILTER_VALIDATE_INT);
//$datos['apellido'] = filter_var($_POST['apellido'], FILTER_VALIDATE_INT);
$usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : null;
//Guarda valores en variables despues que se complete el formulario


$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$sexo = isset($_POST['sex']) ? $_POST['sex'] : null;
$ejemplar = isset($_POST['Ejemplares']) ? $_POST['Ejemplares'] : null;
$domicilio = isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
$documento = isset($_POST['documento']) ? $_POST['documento'] : null;
$provinciaNacimiento=isset($_POST['provinciaNacimiento']) ? $_POST['provinciaNacimiento'] : null;
$diaNacimiento=isset($_POST['diaNacimiento']) ? $_POST['diaNacimiento'] : null;
$mesNacimiento=isset($_POST['mesNacimiento']) ? $_POST['mesNacimiento'] : null;
$anioNacimiento=isset($_POST['anioNacimiento']) ? $_POST['anioNacimiento'] : null;
$provincia=isset($_POST['provinciaReal']) ? $_POST['provinciaReal'] : null;
$ciudad=isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
//Este array guardará los errores de validación que surjan.

$errores = array();


//require ("formulario.php");}
//require "/vigilador.php";
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'validacion.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Valida que el campo nombre no esté vacío.
   if (!validarCampo($nombre)) {
      $errores[] = 'El campo nombre es incorrecto.';
   }
    if (!validarCampo($apellido)) {
      $errores[] = 'El campo apellido es incorrecto.';
   }
     if (!validarCampo($sexo)) {
      $errores[] = 'El campo sexo no esta seleccionado.';
   }
  
     if (!validarCampo($domicilio)) {
      $errores[] = 'El campo domicilio es incorrecto.';
   }
    if (!checkdate($mesNacimiento,$diaNacimiento,$anioNacimiento)) {
      $errores[] = 'La fecha de Nacimiento es incorrecto.';
   }
    
    
   //Valida el documento con un rango de 1.000.000 a 99.999.999.
$opciones_Documento = array(
   'opciones' => array(
      //Definimos el rango de documento entre 1.000.000 a 99.999.999.
      'min_range' => 1000000,
      'max_range' => 99999999
   )
);
	 if (!validarEntero($documento, $opciones_Documento)) {
      $errores[] = 'El documento debe ser correcto.';
   }



if(!empty($errores))  {
	require("formulario.php");
} else {
	$todo_ok = true;
	require("confirmacion.php");
}

}}
//require ("formulario.php");

