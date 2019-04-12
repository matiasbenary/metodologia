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

class EstrategiaPocoDeMuchoConItem extends AEstrategiaCarreta
{
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
        $hay = false;

        foreach ($this->carreta->almacen as $key => $item){
            if($item == $mercaderia->getPeso()){
                if($item > $this->pesoBase)
                {
                    $this->carreta->setEstrategia(new EstrategiaPocoDeMuchoSinItem($this->carreta,$this->pesoBase));
                }
                $hay = true;
            }
        }

        return $hay;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia): bool
    {
        return ($this->carreta->capacidad >= $this->carreta->ocupado+$mercaderia->getPeso());
    }
}