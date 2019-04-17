<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 11/04/19
 * Time: 23:48
 */

use Patrones\ClassMaster\Carreta;

require __DIR__.'/vendor/autoload.php';

//$climate = new League\CLImate\CLImate;
//
//$climate->out('This prints to the terminal.');
//
//$climate->inline('Waiting');
//
//for ($i = 0; $i < 10; $i++) {
//    $climate->inline('.');
//}
//$climate->to('error')->red('Something went terribly wrong.');
//
//$climate->bold('Bold and beautiful.');
//$climate->underline('I have a line beneath me.');
//
//$climate->bold()->out('Bold and beautiful.');
//$climate->underline()->out('I have a line beneath me.');
//
//$climate->backgroundBlue()->green()->blink()->out('This may be a little hard to read.');
//$climate->blue('Please <light_red>remember</light_red> to restart the server.');
//$climate->out('Remember to use your <blink><yellow>blinker</yellow></blink> when turning.');
//
//$climate->error('Ruh roh.');
//$climate->comment('Just so you know.');
//$climate->whisper('Not so important, just a heads up.');
//$climate->shout('This. This is important.');
//$climate->info('Nothing fancy here. Just some info.');
//$climate->animation('hello')->enterFrom('right');
//$climate->animation('hello')->exitTo('right');
//$climate->animation('hello')->scroll('right');
//
$carreta = new Carreta(1000);

$ciudades = loadData("src/DB/ciudades.txt");

$file = './test2Ciudades.txt';
$file2 = './test2Carreta.txt';
$printCarrata = '';
$current = '';
//$current = print_r($ciudades,true);
//$current .= "\n++++++++++++++++++++++++++\n";

foreach ($ciudades as $ciudad){
    $printCarrata .=print_r($carreta,true);
    $current .=print_r($ciudad,true);
    $ciudad->comerciar($carreta);
    $current .=print_r($ciudad,true);
}


file_put_contents($file,$current);
file_put_contents($file2,$printCarrata);