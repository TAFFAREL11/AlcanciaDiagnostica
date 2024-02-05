<?php

class Alcancia {
    private $monedasPorDenominacion;

    public function __construct() {
        $this->monedasPorDenominacion = array(
            '1' => 0,
            '2' => 0,
            '5' => 0,
            '10' => 0,
            '20' => 0,
            '50' => 0,
            '100' => 0,
            '200' => 0,
            '500' => 0,
            '1000' => 0,
        );
    }

    public function agregarMoneda($denominacion) {
        if (array_key_exists($denominacion, $this->monedasPorDenominacion)) {
            $this->monedasPorDenominacion[$denominacion]++;
        }
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->monedasPorDenominacion as $denominacion => $cantidad) {
            $total += $denominacion * $cantidad;
        }
        return $total;
    }

    public function romperAlcancia() {
        $this->monedasPorDenominacion = array(
            '1' => 0,
            '2' => 0,
            '5' => 0,
            '10' => 0,
            '20' => 0,
            '50' => 0,
            '100' => 0,
            '200' => 0,
            '500' => 0,
            '1000' => 0,
        );
    }

    public function getMonedasPorDenominacion() {
        return $this->monedasPorDenominacion;
    }
}

?>
