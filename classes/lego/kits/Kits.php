<?php

namespace lego\kits;

class Kits implements \IteratorAggregate
{
    private $collection;
  

    public function __construct()
    {
        $this->collection = array();
    }

    public function add(\Lego\kit\Kit $kit)
    {
         $this->collection[] = $kit;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }


    public function count()
    {
        return count($this->collection);
    }


    public function search($literal)
    {
        $resultados = new Kits;
        $nSet = (int) $literal;
        foreach ($this->collection as $kit) {
            if (($nSet && $kit->matchSet($nSet)) || ($kit->matchName($literal))) {
                $resultados->add($kit);
            }
        }
        return $resultados;
    }


    public function fromSection($section)
    {
        $resultados = new Kits;
        foreach ($this->collection as $kit) {
            if ($kit->matchSection($section)) {
                $resultados->add($kit);
            }
        }
        return $resultados;
    }


    public function secciones()
    {
        $secciones = array();
        foreach ($this->collection as $kit) {
            $seccion = $kit->getSection();
            if (isset($secciones[$seccion])) {
                 $secciones[$seccion]++;
            } else {
                $secciones[$seccion] = 1;
            }
        }
        return $secciones;
    }
}
