<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:41
 */
require_once "ITransporte.php";
require_once "IMercaderia.php";
require_once "AEstrategia.php";
require_once "EstrategiaNormal.php";

class Carreta implements ITransporte
{
    public $capacidad,$ocupado,$almacen;
    protected $estrategia;

    /**
     * Carreta constructor.
     * @param $capacidad
     */
    public function __construct($capacidad, AEstrategia $estrategia = null)
    {
        if($estrategia == null){
            $estrategia =  EstrategiaNormal::class;
        }
        $this->capacidad = $capacidad;
        $this->ocupado = 0;
        $this->estrategia = new $estrategia($this);
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
       return ($this->capacidad >= $this->ocupado+$mercaderia->getPeso());
    }

    /**
     * @param AEstrategia $estrategia
     */
    public function setEstrategia(AEstrategia $estrategia): void
    {
        $this->estrategia = $estrategia;
    }

}