<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:39
 */

interface ITransporte
{
    /**
     * @param IMercaderia $mercaderia
     */
    public function subir(IMercaderia $mercaderia):void ;

    /**
     * @param IMercaderia $mercaderia
     */
    public function bajar(IMercaderia $mercaderia):void ;

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function tenes(IMercaderia $mercaderia):bool ;

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    public function hayLugar(IMercaderia $mercaderia):bool ;

    /**
     * @return int
     */
    public function getOcupado(): int;


    /**
     * @return int
     */
    public function getCapacidad(): int;

}