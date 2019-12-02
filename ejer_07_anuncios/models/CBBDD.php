<?php
class CBBDD {
    //Para acceder a bbdd:
    protected $mConex;

    protected function conectarBD() {
        $this->mConex = new mysqli("localhost","root","","bd_anuncios");
        //$this->mConex = new mysqli("localhost","root","26Ab3sT0","bd_anuncios");
    }

    protected function desconectarBD() {
        $this->mConex->close();
    }
}