<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 07/12/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

class Localizacion
{

    public $id;
    public $comarca_paisaxistica;
    public $localidade;
    public $concello;
    public $numero;
    public $rua;
    public $parroquia;
    public $provincia;
    public $area_paisaxistica;
    public $cod_postal;

    //Funcion para crear a localización
    public function crearLocalizacion(?int $id,$comarca_paisaxistica, $localidade, $concello, $numero, $rua, $parroquia, $provincia, $area_paisaxistica, $cod_postal) {
        $this->id = $id;
        $this->comarca_paisaxistica=$comarca_paisaxistica;
        $this->localidade=$localidade;
        $this->concello=$concello;
        $this->numero=$numero;
        $this->rua=$rua;
        $this->parroquia=$parroquia;
        $this->provincia=$provincia;
        $this->area_paisaxistica=$area_paisaxistica;
        $this->cod_postal=$cod_postal;
    }

    //getters
    public function getId()
    {
        return $this->id;
    }
    public function getComarca_paisaxistica()
    {
        return $this->comarca_paisaxistica;
    }
    public function getLocalidade()
    {
        return $this->localidade;
    }
    public function getConcello()
    {
        return $this->concello;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function getParroquia()
    {
        return $this->parroquia;
    }
    public function getProvincia()
    {
        return $this->provincia;
    }
    public function getArea_paisaxistica()
    {
        return $this->area_paisaxistica;
    }
    public function getCod_postal()
    {
        return $this->cod_postal;
    }
    //Setters
    public function setId($id)
    {
        return $this->id = $id;
    }
    public function setComarca_paisaxistica($comarca_paisaxistica)
    {
        return $this->comarca_paisaxistica = $comarca_paisaxistica;
    }
    public function setLocalidade($localidade)
    {
        return $this->localidade = $localidade;
    }
    public function setConcello($concello)
    {
        return $this->concello = $concello;
    }
    public function setNumero($numero)
    {
        return $this->numero = $numero;
    }
    public function setRua($rua)
    {
        return $this->rua = $rua;
    }
    public function setParroquia($parroquia)
    {
        return $this->parroquia = $parroquia;
    }
    public function setProvincia($provincia)
    {
        return $this->provincia = $provincia;
    }
    public function setArea_paisaxistica($area_paisaxistica)
    {
        return $this->area_paisaxistica = $area_paisaxistica;
    }
    public function setCod_postal($cod_postal)
    {
        return $this->cod_postal = $cod_postal;
    }
}
