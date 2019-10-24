<?php 
// Controlador para los enlaces de interes
$msg = "Operacion desconocida";
$operation = $_GET["op"];
switch ($operation) {
    case 1: // Insert link **************************************************************
    $message_fracaso ="Error al insertar los datos, compruebe los campos.";
    $message_exito = "Registro con éxito";

    
    ;
    break;
    case 2: // update link **************************************************************
    
    ;
        break;
    case 3: //Delete link *********************************************************************
  
    ;
    break;
    case 4: //Show links *********************************************************************
  
    ;
    break;
}

// Funciones ***********************************************************

// Insertar el link
function insertLink() {
// 

// cerramos conexión
mysqli_close($conx);
}

// Modificar el link
function login() {
//

// cerramos conexión
mysqli_close($conx);

}
?>
