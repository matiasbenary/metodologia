<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 17/04/19
 * Time: 18:54
 */

namespace Patrones\ClassMaster;


use Patrones\AbstractClass\AEstadoDelMercado;
use Patrones\Interfaces\ITransporte;

class EstadoSoloCompra extends AEstadoDelMercado
{

    public function comerciar(ITransporte $transporte)
    {
        print_r("compra");
        foreach ($this->mercado->demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $transporte->bajar($demanda);
                unset($this->mercado->demandas[$key]);
            }
        }
    }
}