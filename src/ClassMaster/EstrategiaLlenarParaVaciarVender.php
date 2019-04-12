<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 20:51
 */

namespace Patrones\ClassMaster;


use Patrones\AbstractClass\AEstrategiaCarreta;
use Patrones\Interfaces\IMercaderia;

class EstrategiaLlenarParaVaciarVender extends AEstrategiaCarreta
{


    /**
     * @var
     */
    private $porcentajeTransporte;

    /**
     * @var
     */
    private $constantePorcentajePeso;

    /**
     * MercaderLlenarParaVaciar constructor.
     * @param string $modo
     */
    public function __construct(Carreta $carreta)
    {
        parent::__construct($carreta);
        $this->setConstantePorcentajePeso();
        $this->setPorcentajeTransporte();
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function tenes(IMercaderia $mercaderia): bool
    {
        $hay = false;

        foreach ($this->carreta->almacen as $key => $item){
            if($item == $mercaderia->getPeso()){
                $hay = true;
            }
        }

        if($hay && $this->porcentajeTransporte < 5)
        {
            $this->carreta->setEstrategia(new EstrategiaLlenarParaVaciarComprar($this->carreta));
            return false;
        }

        return $hay;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia): bool
    {
        return false;
    }

    /**
     *
     */
    private function setConstantePorcentajePeso()
    {
        $this->constantePorcentajePeso = floor(100/$this->carreta->capacidad);
    }

    /**
     *
     */
    private function setPorcentajeTransporte()
    {
        $this->porcentajeTransporte = floor($this->carreta->ocupado*$this->constantePorcentajePeso);
    }
}