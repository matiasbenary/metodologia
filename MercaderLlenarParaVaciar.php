<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 04/04/19
 * Time: 14:14
 */
require_once "IPoliticasDeVentas.php";

class MercaderLlenarParaVaciar implements IPoliticasDeVentas
{
    private $modo,$porcentajeTransporte,$constantePorcentajePeso;

    /**
     * MercaderLlenarParaVaciar constructor.
     * @param string $modo
     */
    public function __construct($modo= "Venta")
    {
        $this->modo = $modo;
    }

    /**
     * @param ITransporte $transporte
     * @param $demandas
     * @param $ofertas
     */
    public function comerciar(ITransporte $transporte, &$demandas, &$ofertas)
    {
        $this->setConstantePorcentajePeso($transporte);
        $this->setPorcentajeTransporte($transporte);

        if($this->modo == "Compra"){
            $this->comprar($transporte, $ofertas);
        }elseif ($this->modo = "Venta"){
            $this->vender($transporte, $demandas);
        }
    }

    /**
     * @param ITransporte $transporte
     * @param $ofertas
     */
    private function comprar(ITransporte $transporte, &$ofertas)
    {
        foreach ($ofertas as $key => $oferta){
            if($this->sePuedeSubir($transporte,$oferta)){
                $this->subirOferta($transporte,$oferta);
                unset($ofertas[$key]);
            }
        }
    }

    /**
     * @param ITransporte $transporte
     * @param $demandas
     */
    private function vender(ITransporte $transporte, &$demandas)
    {
        foreach ($demandas as $key => $demanda){
            if($this->sePuedeBajar($transporte,$demanda)){
                $this->bajarDemanda($transporte,$demanda);
                unset($demandas[$key]);
            }
        }
    }

    /**
     * @param $transporte
     * @param $demanda
     * @return bool
     */
    private function sePuedeBajar($transporte,$demanda)
    {
        if($transporte->tenes($demanda)){
            if($this->porcentajeTransporte < 5){
                $this->modo = "Compra";
                return false;
            }
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $transporte
     * @param $oferta
     * @return bool
     */
    private function sePuedeSubir($transporte,$oferta)
    {
        if($transporte->hayLugar($oferta)){
            if($this->porcentajeTransporte >= 95){
                $this->modo = "Venta";
                return false;
            }
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $transporte
     * @param $demanda
     */
    private function bajarDemanda($transporte,$demanda)
    {
        $transporte->bajar($demanda);
        $this->setPorcentajeTransporte($transporte);
    }

    /**
     * @param $transporte
     * @param $oferta
     */
    private function subirOferta($transporte,$oferta)
    {
        $transporte->bajar($oferta);
        $this->setPorcentajeTransporte($transporte);
    }

    /**
     * @param ITransporte $transporte
     */
    private function setConstantePorcentajePeso(ITransporte $transporte)
    {
        $this->constantePorcentajePeso = floor(100/$transporte->getCapacidad());
    }

    /**
     * @param ITransporte $transporte
     */
    private function setPorcentajeTransporte(ITransporte $transporte)
    {
        $this->porcentajeTransporte = floor($transporte->getOcupado()*$this->constantePorcentajePeso);
    }
}