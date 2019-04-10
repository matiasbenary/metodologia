<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:41
 */
require_once "ITransporte.php";
require_once "IMercaderia.php";

class Carreta implements ITransporte
{
    private $capacidad,$ocupado,$almacen;

    /**
     * Carreta constructor.
     * @param $capacidad
     */
    public function __construct($capacidad)
    {
        $this->capacidad = $capacidad;
        $this->ocupado = 0;
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function subir(IMercaderia $mercaderia): void
    {
        $this->ocupado += $mercaderia->getPeso();
        $this->almacen[] = $mercaderia->getPeso();
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function bajar(IMercaderia $mercaderia): void
    {
        $this->ocupado -= $mercaderia->getPeso();
        foreach ($this->almacen as $key => $item){
            if($item == $mercaderia->getPeso()){
                unset($this->almacen[$key]);
                return;
            }
        }
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function tenes(IMercaderia $mercaderia): bool
    {
        foreach ($this->almacen as $key => $item){
            if($item == $mercaderia->getPeso()){
                return true;
            }
        }
        return false;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia): bool
    {
       return ($this->capacidad >= $this->ocupado+$mercaderia->getPeso());
    }

    /**
     * @return int
     */
    public function getOcupado(): int
    {
        return $this->ocupado;
    }

    /**
     * @return int
     */
    public function getCapacidad(): int
    {
        return $this->capacidad;
    }

    /**
     * @return array
     */
    public function getAlmacen(): array
    {
        return $this->almacen;
    }
}