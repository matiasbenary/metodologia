<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 04/04/19
 * Time: 13:15
 */

require_once "IPoliticasDeVentas.php";

class MercaderPocoDeMucho implements IPoliticasDeVentas
{
    private $limiteDePeso ;
    private $paquetePeseado;

    public function __construct($paquetePeseado = 0, $limiteDePeso = 20)
    {
        $this->paquetePeseado = $paquetePeseado;
        $this->limiteDePeso = $limiteDePeso;
    }

    /**
     * @param ITransporte $transporte
     * @param $demandas
     * @param $ofertas
     */
    public function comerciar(ITransporte $transporte, &$demandas, &$ofertas)
    {
        foreach ($demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $this->bajarDemanda($demanda,$transporte);
                unset($demandas[$key]);
            }
        }
        foreach ($ofertas as $key => $oferta){
            if($this->sePuedeSubir($oferta,$transporte)){
                $transporte->subir($oferta);
                unset($ofertas[$key]);
            }
        }
    }

    /**
     * @param $oferta
     * @param $transporte
     * @return bool
     */
    private function sePuedeSubir($oferta,$transporte)
    {
        if($transporte->hayLugar($oferta)){
            if($oferta->getPeso() <= $this->limiteDePeso){
                return true;
            }elseif($this->paquetePeseado === 0){
                $this->paquetePeseado = $oferta->getPeso();
                return true;
            }
        }

        return false;
    }

    /**
     * @param $demanda
     * @param $transporte
     */
    private function bajarDemanda($demanda,$transporte)
    {
        $transporte->bajar($demanda);
        if($this->paquetePeseado != 0 && $demanda->getPeso() == $this->paquetePeseado){
            $this->paquetePeseado = 0;
        }
    }
}