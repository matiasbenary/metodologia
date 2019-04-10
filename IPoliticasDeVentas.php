<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 04/04/19
 * Time: 12:50
 */

interface IPoliticasDeVentas
{
    public function comerciar(ITransporte $transporte,&$demandas,&$ofertas);
}