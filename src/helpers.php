<?php
/**
 * Created by PhpStorm.
 * User: matias
 * Date: 12/04/19
 * Time: 15:19
 */

function txtToJson(string $path = null)
{
//    $fp    = "src/DB/Ciudades.json";
//    $fp    = "src/DB/Ciudades.json";
    $json_data = file_get_contents($path);

    $json_contents = json_decode($json_data, true);
    var_dump($json_contents);
}

/**
 * @param string $path
 * @param array $array
 */
function saveData(string $path,array $array)
{
    $serializedData = serialize($array);
    file_put_contents($path, $serializedData);
}

/**
 * @param string $path
 * @return mixed
 */
function loadData(string $path)
{
    $recoveredData = file_get_contents($path);
    return unserialize($recoveredData);
}