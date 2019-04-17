<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 17/04/19
 * Time: 18:55
 */

namespace Patrones\ClassMaster;


use Patrones\AbstractClass\AEstadoDelMercado;
use Patrones\Interfaces\ITransporte;

class EstadoAmbasActividades extends AEstadoDelMercado
{
    public function comerciar(ITransporte $transporte)
    {
        print_r("abierto");
        foreach ($this->mercado->demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $transporte->bajar($demanda);
                unset($this->mercado->demandas[$key]);
            }
        }
        foreach ($this->mercado->ofertas as $key => $oferta){
            if($transporte->hayLugar($oferta)){
                $transporte->subir($oferta);
                unset($this->mercado->ofertas[$key]);
            }
        }
    }
}