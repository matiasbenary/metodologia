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

class EstadoSoloVenta extends AEstadoDelMercado
{

    public function comerciar(ITransporte $transporte)
    {
        print_r("venta");
        foreach ($this->mercado->ofertas as $key => $oferta){
            if($transporte->hayLugar($oferta)){
                $transporte->subir($oferta);
                unset($this->mercado->ofertas[$key]);
            }
        }
    }
}