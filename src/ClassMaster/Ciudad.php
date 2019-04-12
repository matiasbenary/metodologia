<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 11:32
 */

namespace Patrones\ClassMaster;

use Patrones\Interfaces\ITransporte;
use Patrones\Interfaces\IMercaderia;
use Patrones\Interfaces\ILugar;

class Ciudad implements ILugar
{
    /**
     * @var String
     */
    protected $nombre;

    /**
     * @var array
     */
    protected $ofertas;

    /**
     * @var array
     */
    protected $demandas;

    /**
     * Ciudad constructor.
     * @param String $nombre
     */
    public function __construct(String $nombre)
    {
        $this->nombre = $nombre;
        $this->ofertas = [];
        $this->demandas = [];
    }

    /**
     * @param ITransporte $transporte
     */
    public function comerciar(ITransporte $transporte): void
    {
        foreach ($this->demandas as $key => $demanda){
            if($transporte->tenes($demanda)){
                $transporte->bajar($demanda);
                unset($this->demandas[$key]);
            }
        }
        foreach ($this->ofertas as $key => $oferta){
            if($transporte->hayLugar($oferta)){
                $transporte->subir($oferta);
                unset($this->ofertas[$key]);
            }
        }
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function ofertar(IMercaderia $mercaderia): void
    {
        $this->ofertas [] = $mercaderia;
    }

    /**
     * @param IMercaderia $mercaderia
     */
    public function demandar(IMercaderia $mercaderia): void
    {
        $this->demandas [] = $mercaderia;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        $this->nombre;
    }

    /**
     * @return array
     */
    public function getOfertas(): array
    {
        return $this->ofertas;
    }

    /**
     * @return array
     */
    public function getDemandas(): array
    {
        return $this->demandas;
    }

}