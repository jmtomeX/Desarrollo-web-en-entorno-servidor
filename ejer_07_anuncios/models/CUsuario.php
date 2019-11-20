<?php
class CUsuario {
    private $mus_id;
    private $mus_name;
    private $mus_email;
    private $mus_password;

    // getters and setters
    public function getName() {
        return $this -> $mus_name;
    }
    public function getID() {
        return $this -> $mus_id;
    }

    // funciones
    public function checkUser($us_email, $us_password) {
         //generar la consulta
    $sql = "SELECT * FROM usuarios WHERE us_email = '$us_email' AND us_password = '$us_password' ";
    //echo $sql; exit;
    require "../conection.php";
    //recogemos la consulta
    $datos = mysqli_query($conx, $sql);
    //mostramos la consulta
    $this -> $mus_id = 0;
    // USar la versión de po de acceso a base de datos *****************************************************
    if ($fila = mysqli_fetch_assoc($datos)) {
        $id = $fila["us_id"];
        //OK, guardo en los atributos:
        $this -> $mus_email = $fila["us_email"];
        $this -> $mus_name = $fila["us_name"];
        $this -> $mus_id  = $fila["us_id"];
    }
    // cerramos conexión
    mysqli_close($conx);
    return $this -> $mus_id;
    }

    public function toRegister ($us_email, $us_password, $us_name) {
        $sql_insert = "INSERT INTO usuarios (us_email, us_name,us_password) VALUES ('$us_email','$us_name','$us_password')";
        require "../conection.php";
        mysqli_query($conx, $sql_insert);
        $result = mysqli_insert_id($conx); 
        mysqli_close($conx);
        return ($result > 0);
    }
  
}
?>