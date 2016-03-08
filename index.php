<?php


include_once "bootstrap.php";

\utils\timer\Timer::initOnce();

use \files\Structure as getPath;

getPath::init_once(__DIR__);

// GENERAR LA APP
$request = new \app\Parameters(array("accion", "buscar", "seccion"));
$kits = include "data.php";
$app = new \app\WebApp($kits, $request);

// GENERAR LA SALIDA
$templateFile = getPath::get("templates", "index.tpl");
$maquetador = new \html\Maquetador($templateFile);
echo $maquetador->render($app->content());

echo \utils\timer\Html::signature();
