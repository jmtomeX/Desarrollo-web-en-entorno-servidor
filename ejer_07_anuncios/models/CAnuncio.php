<?php 
require 'CBBDD.php';
class CAnuncio extends CBBDD{
    // Atributos de la clase
    private $man_id;
    private $man_titulo;
    private $man_descripcion;
    private $man_precio;
    private $man_foto;
    private $man_us_id;

    // getters and setters
    public function getImage() {
        return $this -> man_foto;
    }
    public function tieneImage() {
        return isset($this -> man_foto);
    }

    // funciones
    public function registroAnuncio($an_titulo, $an_descripcion, $an_precio, $an_foto, $us_id ) {
        // generar la consulta
        $sql = "INSERT INTO anuncios (an_titulo, an_descripcion, an_precio, an_foto, an_us_id) VALUES ('$an_titulo', '$an_descripcion', '$an_precio', '$an_foto', '$us_id')";
        $this -> conectarBD();
        $this -> mConex -> query($sql);
        $result = $this -> mConex -> insert_id; 
        $this -> desconectarBD();
        return ($result > 0);
    }

    // función para listar los anuncios de los usuarios
    public function listarAnuncios($us_id = null) {
        if($us_id == null){
            $sql = "SELECT an_id, an_titulo, an_descripcion, an_foto, an_precio, usuarios.us_name FROM anuncios INNER JOIN usuarios ON usuarios.us_id = anuncios.an_us_id ORDER BY an_id DESC";
        }else {
            $sql = "SELECT * FROM anuncios WHERE an_us_id = '$us_id' ORDER BY an_id DESC";
        }
        // conectamos// 
        $anuncios = array();
        $this -> conectarBD();
        // hacemos la consulta
        $datos = $this -> mConex -> query($sql);

        //Total registros.
        //$total_num_rows = $sql->num_rows;
       
        while($fila = $datos ->fetch_assoc()) {
            $anuncios[] = $fila;
            /*			
            $id = $fila['an_id'];
            $anuncios[$id][0] =  $fila['an_titulo'];
            $anuncios[$id][1] =  $fila['an_descripcion'];
            $anuncios[$id][2] =  $fila['an_precio'];
            $anuncios[$id][3] =  $fila['an_foto'];
            $anuncios[$id][4] =  $fila['an_us_id'];
            */
            
            /*			
            $id = $fila['an_id'];
            $anuncios[$id]['titulo'] =  $fila['an_titulo'];
            $anuncios[$id]['descripcion'] =  $fila['an_descripcion'];
            $anuncios[$id]['precio'] =  $fila['an_precio'];
            $anuncios[$id]['foto'] =  $fila['an_foto'];
            $anuncios[$id]['id_usuario'] =  $fila['an_us_id'];
            */
        }
        $this->desconectarBD();
        //echo var_dump($anuncios);exit;
        return $anuncios;
    }
    
    public function cargarAnuncio($an_id) {
        $this -> man_id = 0;
        $this -> conectarBD();
        $sql = "SELECT * FROM anuncios  WHERE an_id = '$an_id'";
        $datos = $this -> mConex -> query($sql);
        if ($fila = $datos->fetch_assoc()) {
            //OK, guardo en los atributos:
            $this -> man_id = $fila["an_id"];
            $this -> man_titulo = $fila["an_titulo"];
            $this -> man_descripcion = $fila["an_descripcion"];
            $this -> man_precio = $fila["an_pecio"];
            $this -> man_foto = $fila["an_foto"];
        }
        $this->desconectarBD();
        return $this -> man_id>0;
    }

    public function EliminarAnuncio($an_id) {
        $sql = "DELETE FROM anuncios WHERE an_id = '$an_id'";
        $this -> conectarBD();
        $this -> mConex -> query($sql);
        $result = $this -> mConex -> affected_rows;
        $this->desconectarBD();
        return $result>0;
    }
}
?>
 	 