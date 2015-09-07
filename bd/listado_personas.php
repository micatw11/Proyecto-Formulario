<?php
function tabla($results){?>
<table cellpadding="1" cellspacing="4" border="2" class="display" id="tabla">
                <thead>
                    <tr>
                        <th>Documento</th><!--Estado-->
                        <th>Apellido y Nombre</th>
                    </tr>
                </thead>
                
                  <tbody>
                    <?php
					foreach ($results as $fila) {
					 echo  '<tr><td>'.$fila['dni'].'</td>';
					 echo '<td>'.$fila['apellido'].','.$fila['nombre'].'</td></tr>';
					}
                    ?>
                   
                <tbody>
            </table>
 <?php } ?>

		
