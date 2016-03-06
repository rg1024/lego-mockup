<?php

namespace lego\kit;

class Kit
{
    // Propiedades del objeto
    private $set;
    private $nombre;
    private $instrucciones;
    private $imagen;
    private $seccion;

    public function __construct($set, $nombre, $instrucciones, $imagen, $seccion = null)
    {
        $this->set           = $set;
        $this->nombre        = $nombre;
        $this->instrucciones = $instrucciones;
        $this->imagen        = $imagen;
        $this->seccion       = $seccion;
    }


    // GETTERS ---------------------//
    public function legoSet()
    {
        return $this->set;
    }

    public function nombre()
    {
        return $this->nombre;
    }

 
    public function instrucciones()
    {
        return $this->instrucciones;
    }


    public function imagen()
    {
        return $this->imagen;
    }




    public static function createFromArray($data)
    {
        $seccion = isset($data[3]) ? $data[3] : null;
        list($set,$nombre) = explode(" ", $data[0], 2);
        $nombre = trim($nombre);
        $set = (int)$set;
        $newKit = new Kit($set, $nombre, $data[1], $data[2], $seccion);
        return $newKit;
    }


    public function matchSet($set)
    {
        return $this->set === $set;
    }


    public function matchName($literal)
    {
        return stripos($this->nombre, $literal) !== false;
    }


    public function matchSection($literal)
    {
        return !strcasecmp($this->seccion, $literal);
    }


    public function getSection()
    {
        return $this->seccion;
    }
}
