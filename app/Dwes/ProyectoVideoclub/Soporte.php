<?php
namespace Dwes\ProyectoVideoclub;

class Soporte implements Resumible {
    public $titulo;
    public $numero;
    public $precio;
    public $alquilado = false;

    public function __construct(string $titulo, int $numero, float $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecioConIVA(): float {
        return $this->precio * 1.21;
    }

    public function getPrecio() {

        return $this->precio;

    }

    public function getNumero() {
        return $this->numero;
    }

    public function muestraResumen(){
        return "Título: " . $this->titulo . "\n" .
               "Número: " . $this->numero . "\n" .
               "Precio: " . number_format($this->precio, 2) . "€\n" .
               "Precio con IVA: " . number_format($this->getPrecioConIVA(), 2) . "€\n" .
               "Estado: " . ($this->alquilado ? "Alquilado" : "Disponible");
    }
    
    public function alquilar() {
        $this->alquilado = true;  // Alquilamos el producto
    }

    public function devolver() {
        $this->alquilado = false; // Devolvemos el producto
    }
}
?>
