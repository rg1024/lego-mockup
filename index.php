<?php

include_once "bootstrap.php";

$appCache = new \app\cacheable\Lego(
    new \app\Parameters(array("accion", "buscar", "seccion")),
    new \utils\cache\File(\files\Structure::get('cache'))
);

echo $appCache->render();
echo \utils\timer\Html::signature($timer);
