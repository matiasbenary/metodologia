<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 10/04/19
 * Time: 16:50
 */

namespace Patrones\AbstractClass;

use Patrones\ClassMaster\Carreta;
use Patrones\Interfaces\IMercaderia;

abstract class AEstrategiaCarreta
{
    /**
     * @var Carreta $carreta
     */
    protected $carreta;

    /**
     * AEstrategiaCarreta constructor.
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
    abstract public function tenes(IMercaderia $mercaderia):bool ;

    /**
     * @param IMercaderia $mercaderia
     * @return bool
     */
    abstract public function hayLugar(IMercaderia $mercaderia):bool ;
}