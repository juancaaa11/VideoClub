<?php
namespace Dwes\ProyectoVideoclub;
class Cliente {
    public $nombre;
    public $numero;
    public $soportesAlquileres = [];
    public $maxAlquilerConcurrente = 3;
    public $numSoportesAlquilados = 0;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente=3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    public function tieneAlquilado(Soporte $s): bool {
        foreach ($this->soportesAlquileres as $soporteAlquilado) {
            if ($soporteAlquilado === $s) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $s) {
        // Verificar si el soporte ya está alquilado
        if ($this->tieneAlquilado($s)) {
            throw new \Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException("El soporte ya está alquilado.");
        }

        // Verificar si se ha alcanzado el límite de alquileres concurrentes
        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            throw new \Dwes\ProyectoVideoclub\Util\CupoSuperadoException("Se ha alcanzado el límite de alquileres concurrentes.");
        }

        // Si pasa las verificaciones, alquilar el soporte
        $this->soportesAlquileres[] = $s;
        $this->numSoportesAlquilados++;
        echo "El soporte '{$s->titulo}' ha sido alquilado con éxito.\n";

        return $this;  // Devuelve $this para encadenar métodos
    }

    // Método para devolver un soporte
    public function devolver(int $numSoporte) {
        // Buscar el soporte en los alquileres
        foreach ($this->soportesAlquileres as $index => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                unset($this->soportesAlquileres[$index]);
                $this->soportesAlquileres = array_values($this->soportesAlquileres);  // Reindexar array
                $this->numSoportesAlquilados--;
                echo "El soporte con número {$numSoporte} ha sido devuelto con éxito.\n";
                return $this;  // Devuelve $this para encadenar métodos
            }
        }
        throw new \Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException("El soporte con número {$numSoporte} no está alquilado.");
    }

    // Método para listar los soportes alquilados
    public function listarAlquileres() {
        $soportesAlquilados = $this->soportesAlquileres;
        if (empty($soportesAlquilados)) {
            echo "No hay soportes alquilados.\n";
        } else {
            echo "Soportes alquilados:\n";
            foreach ($soportesAlquilados as $soporte) {
                echo $soporte->muestraResumen() . "\n";
            }
        }   
    }
    public function muestraResumen() {
        return "Nombre: " . $this->nombre . "\n" .
               "Número: " . $this->numero . "\n";
    }
}

?>
