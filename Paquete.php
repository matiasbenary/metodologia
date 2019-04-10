<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:27
 */
require_once "IMercaderia.php";

class Paquete implements IMercaderia
{
    private $peso;

    /**
     * Paquete constructor.
     * @param $peso
     */
    public function __construct($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return int
     */
    public function getPeso(): int
    {
        return $this->peso;
    }
}