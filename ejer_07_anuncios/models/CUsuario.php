<?php
require 'CBBDD.php';
class CUsuario extends CBBDD{
    private $mus_id;
    private $mus_name;
    private $mus_email;
    private $mus_password;

    // getters and setters
    public function getName() {
        return $this -> mus_name;
    }
    public function getID() {
        return $this -> mus_id;
    }

    // funciones
    public function checkUser($us_email, $us_password) {
    //generar la consulta
    $sql = "SELECT * FROM usuarios WHERE us_email = '$us_email' AND us_password = '$us_password' ";
    //echo $sql;exit;
    //recogemos la consulta
    $this -> conectarBD();
    $datos = $this -> mConex ->  query($sql);
    //mostramos la consulta
    $this -> mus_id = 0;
    // USar la versión de PO de acceso a base de datos *****************************************************
    if ($fila = $datos->fetch_assoc()) {
        //OK, guardo en los atributos:
        $this->mus_email = $fila["us_email"];
        $this->mus_name = $fila["us_name"];
        $this->mus_id  = $fila["us_id"];
    }
    // cerramos conexión
    $this->desconectarBD();
    return $this -> mus_id;
    }

    public function toRegister ($us_email, $us_password, $us_name) {
        $sql = "INSERT INTO usuarios (us_email, us_name,us_password) VALUES ('$us_email','$us_name','$us_password')";
        $this -> conectarBD();
        $this -> mConex -> query($sql);
        $result = $this -> mConex -> insert_id; 
        $this -> desconectarBD();
        return ($result > 0);
    }

}
?>