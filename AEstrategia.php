<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 10/04/19
 * Time: 09:55
 */

abstract class AEstrategia
{
    /**
     * @var Carreta $carreta
     */
    protected $carreta;

    /**
     * AEstrategia constructor.
     * @param Carreta $carreta
     */
    public function __construct(Carreta $carreta)
    {
        $this->carreta = $carreta;
    }

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    abstract function tenes(IMercaderia $mercaderia): bool;

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    abstract function hayLugar(IMercaderia $mercaderia): bool;
}