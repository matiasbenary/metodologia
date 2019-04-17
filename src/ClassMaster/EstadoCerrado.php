<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 17/04/19
 * Time: 18:52
 */

namespace Patrones\ClassMaster;


use Patrones\AbstractClass\AEstadoDelMercado;
use Patrones\Interfaces\ITransporte;

class EstadoCerrado extends AEstadoDelMercado
{

    public function comerciar(ITransporte $transporte)
    {
        print_r("cerrado");
    }
}