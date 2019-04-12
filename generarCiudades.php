<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 12/04/19
 * Time: 15:55
 */

require __DIR__.'/vendor/autoload.php';


$nombresCiudad= ["Troya", "Roma", "Babilonia", "Alexandría", "Nazaret", "Menfis", "Atenas", "Cartago", "Damasco", "Jericó", "Constantinopla", "Esparta"];
$ciudades = [];

foreach ($nombresCiudad as $nombreCiudad){
    $ciudades[] = crearCiudades($nombreCiudad,crearMercados());
}
print_r($ciudades);
saveData("src/DB/ciudades.txt",$ciudades);



//$aux = 0;
//count(agregarOferta());
//for($t =0 ; $t <=1000 ; $t++){
//   $aux += count(agregarOferta());
//}
////print_r($t);
//print_r($aux/($t-1));
function crearCiudades($nombre,$mercados)
{
    return new \Patrones\ClassMaster\Ciudad($nombre,$mercados);
}

function crearMercados()
{
  $mercado = new \Patrones\ClassMaster\Mercado(generarPaquetes(),generarPaquetes());
  $mercados = new \Patrones\ClassMaster\MercadoCompuesto([$mercado]);

  return $mercados;
}


function generarPaquetes()
{
    $paquetes = [];
    $i = 0;
    while($i < 98){
        $i = (random_int(0,99));
        $paquetes[] = new \Patrones\ClassMaster\Paquete(random_int(1,5));
    }

    return $paquetes;
}