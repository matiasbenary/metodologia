<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 20:41
 */

namespace Patrones\ClassMaster;


use Patrones\AbstractClass\AEstrategiaCarreta;
use Patrones\Interfaces\IMercaderia;

class EstrategiaPocoDeMuchoSinItem extends AEstrategiaCarreta
{
    /**
     * @var int
     */
    protected $pesoBase;

    /**
     * EstrategiaPocoDeMuchoConItem constructor.
     */
    public function __construct(Carreta $carreta,$pesoBase = 20)
    {
        parent::__construct($carreta);

        $this->pesoBase = $pesoBase;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function tenes(IMercaderia $mercaderia): bool
    {
        foreach ($this->carreta->almacen as $key => $item){
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
        if($this->carreta->capacidad >= $this->carreta->ocupado+$mercaderia->getPeso()){
            if($mercaderia->getPeso() > $this->pesoBase)
            {
                $this->carreta->setEstrategia(new EstrategiaPocoDeMuchoConItem($this->carreta,$this->pesoBase));
            }
            return true;
        }
        return false;
    }
}