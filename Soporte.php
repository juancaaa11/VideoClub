<?php

include_once("Resumible.php");
include_once("Videoclub.php");

abstract class Soporte {

    // Atributos
    private $titulo;
    public $numero;
    public $precio;

    // Definimos IVA 
    private static $IVA = 21; // El 21% de IVA

    // Constructor
    public function __construct($titulo, $numero, $precio){
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPrecio(){
        // Formatear el precio a 2 decimales
        return number_format($this->precio, 2, '.', ''); // Dos decimales
    }

    // calcular el precio con IVA
    public function getPrecioconIva() {
        $precioConIva = ($this->precio * self::$IVA / 100) + $this->precio;
        return number_format($precioConIva, 2, '.', ''); // Dos decimales
    }

    // Mostrar resumen
    public function muestraResumen(){
        echo "<br><br>";
        echo "<strong>Título: </strong>" . $this->titulo . "<br>";
        echo "<strong>Número: </strong>" . $this->numero . "<br>";
        echo "<strong>Precio: </strong>" . $this->getPrecio() . "$<br>"; // Precio con dos decimales
        echo "<strong>Precio con IVA: </strong>" . $this->getPrecioconIva() . "$<br>"; // Precio con IVA con dos decimales
    }
}

?>
