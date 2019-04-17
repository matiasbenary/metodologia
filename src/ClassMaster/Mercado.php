<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 23:32
 */

namespace Patrones\ClassMaster;


use Patrones\Interfaces\IMercado;
use Patrones\Interfaces\IMercaderia;
use Patrones\Interfaces\ITransporte;
use Patrones\ClassMaster\EstadoCerrado;

class Mercado implements IMercado
{
    protected $estado;
    /**
     * @var array
     */
    public $ofertas;

    /**
     * @var array
     */
    public $demandas;

    /**
     * Mercado constructor.
     * @param array $ofertas
     * @param array $demandas
     */
    public function __construct(array $ofertas = [], array $demandas = [])
    {
        $this->ofertas = $ofertas;
        $this->demandas = $demandas;
        $this->estado = new EstadoCerrado($this);
    }


    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
        $this->setEstado();
        $this->estado->comerciar($transporte);
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia): void
    {
        $this->ofertas [] = $mercaderia;
        $this->setEstado();
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia): void
    {
        $this->demandas [] = $mercaderia;
        $this->setEstado();
    }

    public function setEstado()
    {
        $umbralApertura = 10;
        $cantOfertas = count($this->ofertas);
        $cantDemandas = count($this->demandas);

        if($cantDemandas + $cantOfertas < $umbralApertura ){
            $this->estado = new EstadoCerrado($this);
        }elseif ($cantOfertas > 2*$cantDemandas){
            $this->estado = new EstadoSoloCompra($this);
        }elseif ($cantOfertas > 2*$cantDemandas){
            $this->estado = new EstadoSoloVenta($this);
        }else{
            $this->estado = new EstadoAmbasActividades($this);
        }
    }
}