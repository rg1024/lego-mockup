<?php

namespace app;

class WebApp
{
    private $data;
    private $requestParameters;


    public function __construct($kits, $requestParameters)
    {
        $this->kits    = $kits;
        $this->request = $requestParameters;
    }


    public function content()
    {
        return array(
            "secciones" => $this->secciones(),
            "buscar"    => $this->buscar(),
            "contenido" => $this->contenido(),
        );
    }


    /* ////////////////// IMPLEMENTATION ///////////////////// */
    
    private function contenido()
    {
        $accion = strtolower($this->request->get("accion"));
        switch ($accion) {
            case "buscar":
                $buscar =$this->request->get("buscar");
                $encontrados = $this->kits->search($buscar);
                return \lego\kits\Html::toHtml($encontrados, "No hemos encontrado un kit");
            case "seccion":
                $seccion  = $this->request->get("seccion");
                if ($seccion=="Sin sección") {
                    $seccion = null;
                }
                $encontrados = $this->kits->fromSection($seccion);
                return \lego\kits\Html::toHtml($encontrados, "No hay kits en la sección");
            default:
                return \lego\kits\Html::toHtml($this->kits, "No hay kits");
        }
        return $contenido;
    }
    

    private function buscar()
    {
        if ($this->request->get("accion")=="Buscar") {
            $buscar = $this->request->get("buscar");
            return \html\Encode::asAttribute($buscar);
        }
    }
            

    private function secciones()
    {
        // Se genera una closure, que solo será ejectuda si la plantilla lo require.
        $kits = $this->kits->secciones();
        return
            function () use ($kits) {
                $html ="";
                foreach ($this->kits->secciones() as $seccion => $cuantos) {
                    $literal = $seccion ? $seccion : "Sin sección";
                    $html .= sprintf(
                        "<a href='?accion=seccion&seccion=%s'>%s (%d)</a>",
                        urlencode($literal),
                        $literal,
                        $cuantos
                    );
                }
                return $html;
            };
    }
}
