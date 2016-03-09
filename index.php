<?php

include_once "bootstrap.php";

$request = new \app\Parameters(array("accion", "buscar", "seccion"));
$cache = new \app\cacheable\Lego($request);

echo $cache->render();
echo \utils\timer\Html::signature();
