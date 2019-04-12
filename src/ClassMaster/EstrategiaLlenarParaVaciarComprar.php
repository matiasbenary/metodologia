<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 20:40
 */

namespace Patrones\ClassMaster;


use function Composer\Autoload\includeFile;
use Patrones\AbstractClass\AEstrategiaCarreta;
use Patrones\Interfaces\IMercaderia;

class EstrategiaLlenarParaVaciarComprar extends AEstrategiaCarreta
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
        return false;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia): bool
    {
        $hayLugar = $this->carreta->capacidad >= $this->carreta->ocupado+$mercaderia->getPeso();
        if($hayLugar ){
            $this->setPorcentajeTransporte();
            if($this->porcentajeTransporte >= 95) {
                print_r("no");
                $this->carreta->setEstrategia(new EstrategiaLlenarParaVaciarVender($this->carreta));
                return false;
            }
        }

        return $hayLugar;
    }

    /**
     *
     */
    private function setConstantePorcentajePeso()
    {
        $this->constantePorcentajePeso = 100/$this->carreta->capacidad;
    }

    /**
     *
     */
    private function setPorcentajeTransporte()
    {
        $this->porcentajeTransporte = floor($this->carreta->ocupado*$this->constantePorcentajePeso);
    }
}