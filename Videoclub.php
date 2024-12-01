<?php

// Incluir las clases necesarias
include_once("Soporte.php");
include_once("CintaVideo.php");
include_once("Dvd.php");
include_once("Juego.php");
include_once("Cliente.php");

class Videoclub {

    public $nombre;
    public $productos = []; // Array para almacenar los productos
    public $socios = []; // Array para almacenar los socios

    // Constructor
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // privado para incluir un producto 
    private function incluirProducto(Soporte $producto) {
        $this->productos[] = $producto;
    }

    // Incluir una Cinta de Video
    public function incluirCintaVideo($titulo, $precio, $duracion, $formato) {
        $cinta = new CintaVideo($titulo, 0, $precio, $duracion, $formato);
        $this->incluirProducto($cinta);
    }

    // Incluir un DVD
    public function incluirDvd($titulo, $precio, $consola, $idiomas, $pantalla) {
        $dvd = new Dvd($titulo, 0, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    // Incluir un Juego
    public function incluirJuego($titulo, $precio, $consola, $minJugadores, $maxJugadores) {
        $juego = new Juego($titulo, 0, $precio, $consola, $minJugadores, $maxJugadores);
        $this->incluirProducto($juego);
    }

    // Incluir un Socio
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {
        $socio = new Cliente($nombre, count($this->socios), $maxAlquileresConcurrentes);
        $this->socios[] = $socio;
    }

    // Listar todos los productos
    public function listarProductos() {
        echo "<h3>Productos disponibles:</h3>";
        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
        }
    }

    // Listar todos los socios
    public function listarSocios() {
        echo "<h3>Socios:</h3>";
        foreach ($this->socios as $socio) {
            echo "- " . $socio->getNombre() . "<br>";

        }
        echo "<br>";
    }

    // Alquilar un producto a un socio
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {
        $cliente = $this->socios[$numeroCliente];  
        $soporte = $this->productos[$numeroSoporte]; 
    
        if ($cliente->tieneAlquilado($soporte)) {
            echo "El cliente " . $cliente->getNombre() . " ya tiene este soporte alquilado.<br>";
            return false; // El cliente ya tiene el soporte alquilado
        }
    
        if (count($cliente->soportesAlquilados) < $cliente->maxAlquilerConcurrente) {
            $cliente->alquilar($soporte);  // Alquilar el producto
            echo " <strong>El cliente " . $cliente->getNombre() . " ha alquilado el soporte:  </strong>" . $soporte->getTitulo() . "<br>";
            return true; // Alquiler exitoso
        } else {
            echo "El cliente " . $cliente->getNombre() . " ha alcanzado el límite de alquileres.<br>";
            return false; 
        }
    }
    
}
?>
