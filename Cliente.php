<?php

// Incluir las clases necesarias
include_once("Soporte.php");

class Cliente {
    public $nombre;
    public $numero;
    public $maxAlquilerConcurrente;
    public $numSoportesAlquilados = 0;
    public $soportesAlquilados = [];

    // Constructor
    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    // Getter y setter
    public function getNumero() {
        return $this->numero;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    // Getter para soportes alquilados
    public function getSoportesAlquilados() {
        return $this->soportesAlquilados;
    }

    // Comprobar si el cliente tiene alquilado el soporte
    public function tieneAlquilado(Soporte $s): bool {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte === $s) {
                return true; // El soporte está alquilado
            }
        }
        return false; // El soporte no está alquilado
    }

    // Alquilar un soporte
    public function alquilar(Soporte $s): bool {
        if ($this->tieneAlquilado($s)) {
            echo "El soporte ya está alquilado.<br>";
            return false; // El soporte ya está alquilado
        }

        if (count($this->soportesAlquilados) < $this->maxAlquilerConcurrente) {
            $this->soportesAlquilados[] = $s;
            $this->numSoportesAlquilados++;
            echo " <strong>Se ha alquilado el soporte:  </strong>" . $s->getTitulo() . "<br>"; 
            return true; // Soporte alquilado correctamente
        } else {
            echo "No se pueden alquilar más soportes. Límite alcanzado.<br>";
            return false; // Se ha alcanzado el límite de alquileres
        }
    }

 
    public function devolver(int $numSoporte): bool {
        if (isset($this->soportesAlquilados[$numSoporte])) {
            $soporte = $this->soportesAlquilados[$numSoporte];
            unset($this->soportesAlquilados[$numSoporte]);
            $this->soportesAlquilados = array_values($this->soportesAlquilados); // Reindexar el array
            $this->numSoportesAlquilados--;
            echo "Se ha devuelto el soporte: " . $soporte->getTitulo() . "<br>"; 
            return true;
        } else {
            echo "El soporte con el índice $numSoporte no está alquilado.<br>";
            return false;
        }
    }

    // Listar los alquileres del cliente
    public function listarAlquileres(): void {
        echo "El cliente " . $this->nombre . " tiene " . $this->numSoportesAlquilados . " alquileres.<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            echo "- " . $soporte->getTitulo() . "<br>"; 
        }
    }

    // Mostrar resumen del cliente
    public function muestraResumen() {
        echo "Cliente: " . $this->nombre . "<br>";
        echo "Número de alquileres: " . $this->numSoportesAlquilados . "<br>";
    }
}

?>
