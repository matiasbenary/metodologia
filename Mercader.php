<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 04/04/19
 * Time: 12:55
 */

require_once "IPoliticasDeVentas.php";

class Mercader implements IPoliticasDeVentas
{
    /**
     * @param ITransporte $transporte
     * @param $demandas
     * @param $ofertas
     */
    public function comerciar(ITransporte $transporte,&$demandas,&$ofertas)
    {
        foreach ($demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $transporte->bajar($demanda);
                unset($demandas[$key]);
            }
        }
        foreach ($ofertas as $key => $oferta){
            if($transporte->hayLugar($oferta)){
                $transporte->subir($oferta);
                unset($ofertas[$key]);
            }
        }
    }
}