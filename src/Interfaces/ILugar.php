<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 11:28
 */

namespace Patrones\Interfaces;

interface ILugar
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

    /**
     * @return string
     */
    public function getNombre():string ;

}