<?php

include_once("Soporte.php");
class CintaVideo extends Soporte {
    public $duracion;
    public $formato; 

    public function __construct($titulo, $numero, $precio, $duracion, $formato) {
        parent::__construct($titulo, $numero, $precio); // Llamamos al constructor de la clase padre
        $this->duracion = $duracion;
        $this->formato = $formato; 
    }
    
    public function muestraResumen() {
        parent::muestraResumen();
        echo "<strong>Duración: </strong>" . $this->duracion . " minutos<br>";
        echo "<strong>Formato: </strong>" . $this->formato . "<br>";
    }


}

?>

