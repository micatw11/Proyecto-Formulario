<?php  
 if (empty($_POST)){
	require_once "login.php";
}else{
session_start();	
header('Content-Type: text/html; charset=utf-8');
//arreglos para mostrar pais, provincia, ciudad, meses
$Nacionalidad = array ('Argentina','Brazil','Bolivia','Chile','Colombia','Paraguay','Uruguay');
$Argentina = array ("Chubut","Buenos Aires","Catamarca","Chaco","Chubut","Cordoba","Corrientes","Entre Rios","Formosa","Jujuy","La Pampa","La Rioja","Mendoza","Misiones","Neuquen","Rio Negro","Salta","San Juan","San Luis","Santa Cruz","Santa Fe","Santiago del Estero","Tierra del Fuego","Tucuman");
$Chubut = array ("Trelew","Rawson","Puerto Madryn","Comodoro Rivadavia");
$Meses= array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

//Guarda valores en variables despues que se complete el formulario
$datos['documento'] = filter_var($_POST['documento'], FILTER_VALIDATE_INT);
$datos['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$datos['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$datos['domicilio'] = filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING);
$datos['sexo'] = filter_var($_POST['sex'], FILTER_SANITIZE_SPECIAL_CHARS);
$datos['usuario'] = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$datos['provinciaNacimiento'] =isset($_POST['provinciaNacimiento']) ? $_POST['provinciaNacimiento'] : null;
$datos['fechaNacimiento']=date($_POST['anioNacimiento']."/".$_POST['mesNacimiento']."/".$_POST['diaNacimiento']);
$datos['fechaExpedicion']=date("Y/m/d");
$ano= (15+date("Y"));

$datos['fechaVencimiento']=date("$ano/m/d");
$datos['nacionalidad'] =isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
$datos['provincia']=isset($_POST['provinciaReal']) ? $_POST['provinciaReal'] : null;
$datos['ciudad'] =isset($_POST['ciudad']) ? $_POST['ciudad'] : null;


//Este array guardará los errores de validación que surjan.

$errores = array();

//Importamos el archivo con las validaciones.
require_once 'validacion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	
   //Valida que el campo nombre no esté vacío.
   if (!validarCampo($datos['nombre'])) {
      $errores[] = 'El campo nombre es incorrecto.';
   }
    if (!validarCampo($datos['apellido'])) {
      $errores[] = 'El campo apellido es incorrecto.';
   }
      if (!validarCampo($datos['provinciaNacimiento'])) {
      $errores[] = 'El campo apellido es incorrecto.';
   }
     if (!validarCampo($datos['sexo'])) {
      $errores[] = 'El campo sexo no esta seleccionado.';
   }

     if (!validarCampo($datos['domicilio'])) {
      $errores[] = 'El campo domicilio es incorrecto.';
   }
   
    if (!checkdate($_POST['mesNacimiento'],$_POST['diaNacimiento'],$_POST['anioNacimiento'])) {
      $errores[] = 'La fecha de Nacimiento es incorrecto.';
   }else 
   $fechaNacimiento= date($_POST['mesNacimiento']."/".$_POST['diaNacimiento']."/".$_POST['anioNacimiento']);
    
    
   //Valida el documento con un rango de 1.000.000 a 99.999.999.
$opciones_Documento = array(
   'opciones' => array(
      //Definimos el rango de documento entre 1.000.000 a 99.999.999.
      'min_range' => 1000000,
      'max_range' => 99999999
   )
);
	 if (!validarEntero($datos['documento'], $opciones_Documento)) {
      $errores[] = 'El documento debe ser correcto.';
   }

if(!empty($errores))  {

			if ($errores): ?>
		   <ul style="color: #f00;">
          <?php foreach ($errores as $error): ?>
             <li> <?php echo $error ?> </li>
          <?php endforeach; ?>
       </ul>
       <?php endif;

	require("formulario.php");
} else {
	require("confirmacion.php");
}
}
}


