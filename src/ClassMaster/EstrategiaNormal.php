<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 10/04/19
 * Time: 16:57
 */

namespace Patrones\ClassMaster;

use Patrones\AbstractClass\AEstrategiaCarreta;
use Patrones\Interfaces\IMercaderia;

class EstrategiaNormal extends AEstrategiaCarreta
{

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
        return ($this->carreta->capacidad >= $this->carreta->ocupado+$mercaderia->getPeso());
    }
}