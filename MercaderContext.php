<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 04/04/19
 * Time: 12:44
 */

require_once "IPoliticasDeVentas.php";
require_once "ITransporte.php";

class MercaderContext
{
    private  $estategiaDePoliticasDeVentas;

    /**
     * MercaderContext constructor.
     * @param IPoliticasDeVentas $estategiaDePoliticasDeVentas
     */
    public function __construct(IPoliticasDeVentas $estategiaDePoliticasDeVentas)
    {
        $this->setStategy($estategiaDePoliticasDeVentas);
    }

    /**
     * @param IPoliticasDeVentas $estategiaDePoliticasDeVentas
     */
    public function setStategy(IPoliticasDeVentas $estategiaDePoliticasDeVentas)
    {
        $this->estategiaDePoliticasDeVentas = $estategiaDePoliticasDeVentas;
    }

    /**
     * @param $transporte
     * @param $demandas
     * @param $ofertas
     */
    public function aplicarPoliticas($transporte,&$demandas,&$ofertas){
        $this->estategiaDePoliticasDeVentas->comerciar($transporte,$demandas,$ofertas);
    }
}