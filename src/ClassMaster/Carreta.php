<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:41
 */

namespace Patrones\ClassMaster;

use Patrones\Interfaces\IMercaderia;
use Patrones\ClassMaster\EstrategiaNormal;
use Patrones\AbstractClass\AEstrategiaCarreta;
use Patrones\Interfaces\ITransporte;

class Carreta implements ITransporte
{
    public $capacidad,$ocupado,$almacen;
    protected $estrategia;

    /**
     * Carreta constructor.
     * @param $capacidad
     */
    public function __construct($capacidad, AEstrategiaCarreta $estrategia = null)
    {
        if($estrategia == null){
            $estrategia = EstrategiaLlenarParaVaciarComprar::class;
        }

        $this->capacidad = $capacidad;
        $this->ocupado = 0;
        $this->estrategia = new $estrategia($this);
        $this->almacen = [];
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
        return $this->estrategia->tenes($mercaderia);
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia): bool
    {
       return  $this->estrategia->hayLugar($mercaderia);
    }

    /**
     * @param AEstrategiaCarreta $estrategia
     */
    public function setEstrategia(AEstrategiaCarreta $estrategia){
        $this->estrategia = $estrategia;
    }
}