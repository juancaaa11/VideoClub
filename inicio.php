<?php
// Incluir las clases necesarias
include_once("Videoclub.php");

// Crear una instancia del videoclub
$videoclub = new Videoclub("Mi Videoclub");

// Añadir productos
$videoclub->incluirCintaVideo("El Padrino", 5.99, 180, "VHS");  //incluye el formato
$videoclub->incluirDvd("Star Wars", 7.99, "PS4", ["Español", "Inglés"], "HD");
$videoclub->incluirJuego("FIFA 23", 49.99, "PS5", 1, 4);

// Añadir socios
$videoclub->incluirSocio("Juan Pérez");
$videoclub->incluirSocio("María Gómez");

// Listar productos y socios
$videoclub->listarProductos();
$videoclub->listarSocios();

// Alquilar un producto
$videoclub->alquilarSocioProducto(0, 0); // alquila el primer producto
?>
