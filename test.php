<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 03/04/19
 * Time: 10:30
 */

require_once "Paquete.php";
require_once "Carreta.php";
require_once "Ciudad.php";

$paquetesLivianos = [];
$paquetesPesados = [];

$test = 0;
$carreta = new Carreta(400);
$ciudad = new Ciudad("Test");

for ($i = 0; $i <= 30; $i+=2){
    if($i <= 15){
        $ciudad->demandar(new Paquete($i));
    }else{
        $ciudad->ofertar(new Paquete($i));
    }
}

for ($i = 0; $i <= 30; $i+=2){
    $carreta->subir(new Paquete($i));
}
$ciudad->ofertar(new Paquete(1));
$ciudad->demandar(new Paquete(31));

//
//imprimir($carreta->getOcupado());
//imprimir($ciudad->getDemandas());
//imprimir($ciudad->getOfertas());
$ciudad->comerciar($carreta);
//imprimir($carreta->getOcupado());
imprimir($ciudad->getDemandas());
imprimir($ciudad->getOfertas());




//foreach ($paquetesLivianos as $paquetesLiviano){
//
//}

////echo $paquete->getPeso();
//
//$carreta = new Carreta(29);
////echo $carreta->getOcupado();
////echo "\n";
//$carreta->subir($paquete);
//$carreta->subir($paquete);
//$carreta->bajar($paquete);
//imprimir($carreta->getOcupado());
//echo "\n";
//echo $carreta->tenes($paquete);
//echo "\n";
//echo $carreta->hayLugar($paquete);
//echo "\n";
//echo $carreta->tenes($paquete2);
//echo "\n";
//echo $carreta->hayLugar($paquete2);
//echo "\n";
//echo $carreta->getOcupado();
//echo "\n";
//print_r( $carreta->getAlmacen());

function imprimir($variable){
    if(is_array($variable)){
        print_r($variable);
    }else{
        echo $variable;
    }
    echo "\n+++++++++++++++++++++++++++++++++++++++++++++++\n";
}