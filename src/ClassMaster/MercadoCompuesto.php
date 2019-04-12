<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 23:23
 */

namespace Patrones\ClassMaster;


use Patrones\Interfaces\IMercado;
use Patrones\Interfaces\IMercaderia;
use Patrones\Interfaces\ITransporte;

class MercadoCompuesto implements IMercado
{
    protected $mercados;

    /**
     * MercadoCompuesto constructor.
     * @param $mercados
     */
    public function __construct(array $mercados = [])
    {
        $this->mercados = $mercados;
    }


    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
        foreach ($this->mercados as $mercado){
            $mercado->comerciar($transporte);
        }
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia): void
    {
        foreach ($this->mercados as $mercado){
            $mercado->ofertar($mercaderia);
        }
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia): void
    {
        foreach ($this->mercados as $mercado){
            $mercado->demandar($mercaderia);
        }
    }

    public function addMercado(IMercado $mercado): void
    {
        $this->mercados [] = $mercado;
    }
}