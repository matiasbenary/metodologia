<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 23:32
 */

namespace Patrones\ClassMaster;


use Patrones\Interfaces\IMercado;
use Patrones\Interfaces\IMercaderia;
use Patrones\Interfaces\ITransporte;

class Mercado implements IMercado
{
    /**
     * @var array
     */
    protected $ofertas;

    /**
     * @var array
     */
    protected $demandas;

    /**
     * Mercado constructor.
     * @param array $ofertas
     * @param array $demandas
     */
    public function __construct(array $ofertas = [], array $demandas = [])
    {
        $this->ofertas = $ofertas;
        $this->demandas = $demandas;
    }


    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
        foreach ($this->demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $transporte->bajar($demanda);
                unset($this->demandas[$key]);
            }
        }
        foreach ($this->ofertas as $key => $oferta){
            if($transporte->hayLugar($oferta)){
                $transporte->subir($oferta);
                unset($this->ofertas[$key]);
            }
        }
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
}