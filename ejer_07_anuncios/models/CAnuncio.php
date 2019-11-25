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


    // funciones
    public function createCommercial($an_titulo, $an_descripcion, $an_precio, $an_foto, $us_id ) {
        // generar la consulta
        $sql = "INSERT INTO anuncios (an_titulo, an_descripcion, an_precio, an_foto, an_us_id) VALUES ('$an_titulo', '$an_descripcion', '$an_precio', '$an_foto', '$us_id')";
        $this -> conectarBD();
        $this -> mConex -> query($sql);
        $result = $this -> mConex -> insert_id; 
        $this -> desconectarBD();
        return ($result > 0);
    }
}
?>
 	 