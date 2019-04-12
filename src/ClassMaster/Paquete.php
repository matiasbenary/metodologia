<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:27
 */

namespace Patrones\ClassMaster;

use Patrones\Interfaces\IMercaderia;

class Paquete implements IMercaderia
{
    /**
     * @var int
     */
    private $peso;

    /**
     * Paquete constructor.
     * @param int $peso
     */
    public function __construct(int $peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return int
     */
    public function getPeso(): int
    {
        return $this->peso;
    }
}