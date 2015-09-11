<?php session_start();?>
<?php $_SESSION['mensaje'] = 'Usuario: '.$datos['usuario'];?>
<?php echo $_SESSION['mensaje'];
$cont=$cont+1;?>
<!DOCTYPE>
<html>
<head>
  <title>Formulario</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body >
	
		<H3> Datos Del Documento Nacional de Identidad</H3>
<div class="container">
  
  <form method="post" action= "index.php">
    <div class="form-group"  >

		<!-- <H4> Adjunte su foto</H4>
		  <input type="file" name="foto" id="foto" multiple >
	    </div>
		-->
		 <div class="form-group">
      <label for="nombre">Nombres:</label>
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" value="<?php echo $datos[nombre] ?>" onkeypress="return soloLetras(event)">
    </div>
     <div class="form-group"  >
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese apellido" value="<?php echo $datos[apellido] ?>"onkeypress="return soloLetras(event)">
    </div>
   

    <div class="checkbox">

		<label>Sexo:</label>  
      <input type="radio" name="sex" id="sex" value="masculino">Masculino
	  <input type="radio" name="sex" id="sex" value="femenino">Femenino
    </div>
    
    <div class="form-group">
      <label for="">Numero de Documento:</label>
      <input type="number" class="form-control" name="documento" placeholder="Ingrese documento" value="<?php echo $datos[documento] ?>">
    </div>	
            <div>
			
			 <label for="">Fecha y lugar de Nacimiento:</label><br>
				<select id="dia" name="diaNacimiento" class="dia">
					<option selected="selected" value="">Día</option>
					<?php for ($i=1;$i<=31;$i++)://Muestra los 31 dias del mes-  fecha de nacimiento?>
					
					<?php echo "<option value=".$i.">".$i."</option>"?>
					<?php endfor; ?>
				</select>
				
				
				<select id="mes" name="mesNacimiento" class="mes">
					<option selected="selected" value="">Mes </option>
					<?php foreach ($Meses as $clave => $mes)://muestra los meses- fecha de nacimiento?>
					<?php echo "<option value=".$clave.">".$mes."</option>"?>
				<?php endforeach; ?>
				</select>
				
				<select id="anio" name="anioNacimiento" class="anio">
				 <option selected="selected" value="">Año </option>
				 <?php for($j=2015;$j>=1930;$j--)://Muestra los años- fecha nacimiento?>
					<?php echo "<option value=".$j.">".$j."</option>"?>
					<?php endfor; ?>
				 </select>
					
		
					<select name="provinciaNacimiento" onchange="sumit()">
					<?php foreach ($Argentina as $provincia)://Lugar de nacimiento?>
					<?php echo "<option value=".$provincia.">".$provincia."</option>"?>
					<?php endforeach; ?>
					</select>
			
			<br>
					<div class="form-group">
					<br><label>Nacionalidad:</label><br>
					<select name="nacionalidad" onchange="sumit()">				
						<?php foreach ($Nacionalidad as $pais):?>
							<?php echo "<option value=".$pais.">".$pais."</option>"?>
						<?php endforeach; ?>
					</select>
					  </div>
					  
					  <div class="form-group">	
					<br><label>Provincia:</label><br>
					<select name="provinciaReal" onchange="sumit()">
					<?php foreach ($Argentina as $provinciaR)://provincia real?>
					<?php echo "<option value=".$provinciaR.">".$provinciaR."</option>"?>
					<?php endforeach; ?>
					</select>
					</div>
					
					<div class="form-group">	
					<br><label>Ciudad:</label><br>
					<select name="ciudadReal" onchange="sumit()">
					<?php foreach ($Chubut as $ciudadR)://ciudad real?>
					<?php echo "<option value=".$ciudadR.">".$ciudadR."</option>"?>
					<?php endforeach; ?>
					</select>
					</div>
				
					<div class="form-group">
					  <label for="domicilio">Domicilio:</label>
					  <input type="domicilio" class="form-control" name="domicilio" id="domicilio" placeholder="Ingrese domicilio" value="<?php echo $datos[domicilio] ?>" onkeypress="return soloLetras(event)">
					</div>
					
					
    <input type="submit" value= "Enviar" class="btn btn-default"/>
  </form>
</div>

</body>
</html>
