<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 10/04/19
 * Time: 10:07
 */

class EstrategiaNormal extends AEstrategia
{

    function tenes(IMercaderia $mercaderia): bool
    {
        foreach ($this->carreta->almacen as $key => $item){
            if($item == $mercaderia->getPeso()){
                return true;
            }
        }
        return false;
    }

    function hayLugar(IMercaderia $mercaderia): bool
    {
        return ($this->carreta->capacidad >= $this->carreta->ocupado+$mercaderia->getPeso());
    }
}