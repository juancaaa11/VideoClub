<?php

include_once("Soporte.php");

class Juego extends Soporte {

    public $consola;
    public $minNumJugadores;
    public $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores){
        
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles(){
        // Acceso correcto a las propiedades con $this->
        echo "Jugadores posibles: " . $this->minNumJugadores . " / " . $this->maxNumJugadores . "<br>";
    }

    public function muestraResumen(){
        // Llamar al método muestraResumen() de la clase padre
        parent::muestraResumen();
        // Mostrar las propiedades específicas de la clase hija
        echo "<strong>Consola: </strong>" . $this->consola . "<br>";
        echo "<strong>Jugadores: </strong>" . $this->minNumJugadores . " - " . $this->maxNumJugadores . "<br>";
    }
}

?>
