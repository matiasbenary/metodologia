<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 11:32
 */

require_once "ITransporte.php";
require_once "IMercaderia.php";
require_once "ILugar.php";
require_once "MercaderContext.php";
require_once "Mercader.php";
require_once "MercaderLlenarParaVaciar.php";
require_once "MercaderPocoDeMucho.php";

class Ciudad implements ILugar
{
    protected $nombre,$ofertas,$demandas,$mercaderContext;

    /**
     * Ciudad constructor.
     * @param $nombre
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->ofertas = [];
        $this->demandas = [];
        $this->demandas = [];
        $this->mercaderContext = new MercaderContext(new MercaderPocoDeMucho());
    }

    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
       $this->mercaderContext->aplicarPoliticas($transporte,$this->demandas,$this->ofertas);
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia): void
    {
        $this->ofertas [] = $mercaderia;
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia): void
    {
        $this->demandas [] = $mercaderia;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        $this->nombre;
    }

    /**
     * @return array
     */
    public function getOfertas(): array
    {
        return $this->ofertas;
    }

    /**
     * @return array
     */
    public function getDemandas(): array
    {
        return $this->demandas;
    }

    /**
     * @param IPoliticasDeVentas $mercaderContext
     */
    public function setMercaderContext(IPoliticasDeVentas $mercaderContext): void
    {
        $this->mercaderContext->setStategy($mercaderContext);
    }


}