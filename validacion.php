
   <?php 
   
 function validarCampo($variable){
    if(trim($variable) == ''){
       return false;
    }else{
       return true;
    }
 }


 function validarEntero($valor, $opciones_doc){
    if(filter_var($valor, FILTER_VALIDATE_INT, $opciones_doc) === FALSE){
       return false;
    }else{
       return true;
    }
 }
 
 ?>
 



