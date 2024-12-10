<?php
require_once 'Videoclub.php';

$videoclub = new Videoclub("Mi Videoclub");

$videoclub->incluirCintaVideo("Pulp Fiction", 1.99, 154, "16:9")
          ->incluirDvd("El Rey Leon", 2, 19.99, ["Español", "Ingles"], "16:9")
          ->incluirJuego("FIFA 25", 49.99, "PS5", 1, 4);

// Agregar socios
$videoclub->incluirSocio("Juan Pérez")
          ->incluirSocio("Ana López");

// Alquilar productos
$videoclub->alquilarSocioProducto(1, 1)
          ->alquilarSocioProducto(1, 2)
          ->alquilarSocioProducto(2, 3);

// Listar productos y socios
$videoclub->listarProductos()
          ->listarSocios();
?>