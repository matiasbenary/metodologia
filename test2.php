<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 23:48
 */

use Patrones\ClassMaster\Carreta;

require __DIR__.'/vendor/autoload.php';

$carreta = new Carreta(900);

$ciudades = loadData("src/DB/ciudades.txt");

$file = './test2Ciudades.txt';
$file2 = './test2Carreta.txt';
$printCarrata = '';
$current = print_r($ciudades,true);
$current .= "\n++++++++++++++++++++++++++\n";

foreach ($ciudades as $ciudad){
    $printCarrata .=print_r($carreta,true);
    $ciudad->comerciar($carreta);
    $current .=print_r($ciudad,true);
}


file_put_contents($file,$current);
file_put_contents($file2,$printCarrata);