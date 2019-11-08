<?php 
$passw1=$_POST['password1'];
$passw2=$_POST['password2'];
$res = true;
$msg ="";
if($passw1 == $passw2){
    $msg = "Usuario creado con exito.";
   }else{
       $res = false;
       $msg = "Las contraseñas no coinciden";
   }
   header('Content-Type: application/json');

   $data = array(
   'res' => $res, 
   'msg' => $msg
   );
   
   echo json_encode($data);

?>