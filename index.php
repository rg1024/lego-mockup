<?php

include_once "bootstrap.php";

$request = new \app\Parameters(array("accion", "buscar", "seccion"));
$uri = $request->uri();

// try to restore the page from cache
$uri = $request->uri();
if (\html\Cache::check($uri)) {
    echo \html\Cache::out($uri);
    echo "<!-- served by cache -->";
    exit();
}

// load the app
$kits = include "data.php";
$app = new \app\WebApp($kits, $request);

// render the app using a template
$templateFile = \files\Structure::get("templates", "index.tpl");
$maquetador = new \html\Maquetador($templateFile);

// output
$content = $maquetador->render($app->content());
\html\Cache::in($uri, $content);
echo $content;
echo \utils\timer\Html::signature();
