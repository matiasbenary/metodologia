<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 11:32
 */

namespace Patrones\ClassMaster;

use Patrones\Interfaces\IMercado;
use Patrones\Interfaces\ITransporte;
use Patrones\Interfaces\IMercaderia;
use Patrones\Interfaces\ILugar;

class Ciudad implements ILugar
{
    /**
     * @var String
     */
    protected $nombre;

    protected $mercados;

    /**
     * Ciudad constructor.
     * @param String $nombre
     */
    public function __construct(String $nombre, IMercado $mercados = null)
    {
        if($mercados == null){
            $mercados = new MercadoCompuesto();
        }

        $this->nombre = $nombre;
        $this->mercados = $mercados;
    }

    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
        $this->mercados->comerciar($transporte);
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia): void
    {
        $this->mercados->ofertar($mercaderia);
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia): void
    {
        $this->mercados->demandar($mercaderia);
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        $this->nombre;
    }

    public function addMercado(IMercado $meracado): void
    {
        $this->mercados [] = $meracado;
    }

}