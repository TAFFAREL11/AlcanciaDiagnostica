<?php

class Alcancia {
    private $monedas;

    public function __construct() {
        $this->monedas = array(
            '$1' => 0,
            '$2' => 0,
            '$5' => 0,
            '$10' => 0,
            '$20' => 0,
            '$50' => 0,
            '$100' => 0,
            '$200' => 0,
            '$500' => 0,
            '$1000' => 0
        );
    }

    public function agregarMoneda($denominacion) {
        if (array_key_exists($denominacion, $this->monedas)) {
            $this->monedas[$denominacion]++;
            echo "Se ha agregado una moneda de $denominacion.<br>";
        } else {
            echo "Denominación no válida.<br>";
        }
    }

    public function contarMonedas() {
        return $this->monedas;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->monedas as $denominacion => $cantidad) {
            $total += $cantidad * intval(substr($denominacion, 1));
        }
        return $total;
    }

    public function romperAlcancia() {
        $this->monedas = array(
            '$1' => 0,
            '$2' => 0,
            '$5' => 0,
            '$10' => 0,
            '$20' => 0,
            '$50' => 0,
            '$100' => 0,
            '$200' => 0,
            '$500' => 0,
            '$1000' => 0
        );
        echo "La alcancía ha sido rota. ¡Contenido vaciado!<br>";
    }
}

?>
