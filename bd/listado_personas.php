<?php

	require_once 'conexion.php';

	$pdo= conectar();
	$resultado= datos_bd($pdo);
	
	$total_resultados= count($resultado);
	$url= 'listado_personas.php';
	if ( $total_resultados > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 5;
        $pagina = false;
	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	} 
	$total_paginas = ceil($total_resultados / $TAMANO_PAGINA);
				
				//pongo el numero de registros total, el tamaño de pagina y la pagina que se muestra
				
	$consulta = datos_limitados($pdo,$inicio, $TAMANO_PAGINA);?>
	
	<h3>Informacion de Agentes Cargados:</h3>
	<style>
	table, th, td {
		border: 1px solid black;
		background-color: #B1D9DD;
	}
	th, td {
		padding: 15px;
	}
	</style>
	<table style="width:100%" cellpadding="1" cellspacing="4" border="2" class="display" id="tabla">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Apellido y Nombre</th>
                       <th>Sexo</th>
                         <th>Nacionalidad</th>
                         <th>Fecha Nacimiento</th>
                         <th>Fecha de Emicion</th>
                         <th>Fecha de Vencimiento</th>
                         <th>Domicilio</th>
                    </tr>
                </thead>
                
                  <tbody>
                    <?php
					foreach ($consulta as $fila) {
					 echo  '<tr><td>'.$fila['dni'].'</td>';
					 echo '<td>'.$fila['apellido'].','.$fila['nombre'].'</td>';
					 echo  '<td>'.$fila['sexo'].'</td>';
					 echo  '<td>'.$fila['nacionalidad'].'</td>';
					 echo  '<td>'.$fila['fecha_nacimiento'].'</td>';
					 echo  '<td>'.$fila['fecha_expedicion'].'</td>';
					 echo  '<td>'.$fila['fecha_vencimiento'].'</td>';
					 echo  '<td>'.$fila['domicilio'].'</td></tr>';
				 }
           ?>

       
                <tbody>
            </table>
          <?php      
	
	if ($total_paginas > 1) {
		if ($pagina != 1)
          {echo '<a href="'.$url.'?pagina='.($pagina-1).'"></a>';}
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i){
				echo $pagina;
					}
			else{
                 echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
                 }
		}
		if ($pagina != $total_paginas){
            echo '<a href="'.$url.'?pagina='.($pagina+1).'"></a>';
            }
	}
	}else{
		echo 'No hay registros para mostrar';
	}?>
	<br> <br>
	<a href="../index.php">Volver al menu Principal</a>
	<?php	
	echo "<h1>Buscar empleados por apellido</h1>";
		//	echo web_service_json($results); ?>
			<label>Ingrese parte del apellido: </label>
			<input type="text" name="apellido" id="apellido"/>

			<h3 id="seleccionado">Seleccionado: </h3>
			<script src="jquery-ui/external/jquery/jquery.js"></script>
			<script src="jquery-ui/jquery-ui.js"></script>

             <script>
           $(function () {
                $("#apellido").autocomplete({
                    source: "busqueda.php",
                    minLength: 3,
                    select: function (event, ui) {
                        $("#seleccionado").text("Seleccionado: "+ui.item.label);
                    }
                });
            });
        </script>
       
