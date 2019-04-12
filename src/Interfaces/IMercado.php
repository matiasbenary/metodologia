<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 22:59
 */

namespace Patrones\Interfaces;


interface IMercado
{
    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte):void ;

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia):void ;

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia):void ;
}