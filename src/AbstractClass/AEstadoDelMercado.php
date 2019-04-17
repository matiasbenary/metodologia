<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 12/04/19
 * Time: 17:26
 */

namespace Patrones\AbstractClass;


use Patrones\Interfaces\IMercado;
use Patrones\Interfaces\ITransporte;

abstract class AEstadoDelMercado
{
    protected $mercado;

    /**
     * AEstadoDelMercado constructor.
     */
    public function __construct(IMercado $mercado)
    {
        $this->mercado = $mercado;
    }

    abstract public function comerciar(ITransporte $transporte);

}