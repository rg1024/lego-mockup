<?php

namespace app\cacheable;

class Lego extends Cacheable
{
    protected function content()
    {
        // load the app
        $kits = include \files\Structure::get("data.php");
        $app = new \app\WebApp($kits, $this->request);

        // render the app using a template
        $templateFile = \files\Structure::get("templates", "index.tpl");
        $maquetador = new \html\Maquetador($templateFile);

        return $maquetador->render($app->content());
    }
}
