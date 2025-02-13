<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 5/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/
class Edificio{
    public $id;
    public $nome;
    public $localizacion_id;

    public function crearEdificio(?int $id, $nome,$localizacion_id){
        $this->id = $id;
        $this->nome=$nome;
        $this->localizacion_id=$localizacion_id;
    }

    //getters
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getId_localizacion(){
        return $this->localizacion_id;
    }

    //Setters
    public function setId($id){
        return $this->id=$id;
    }
    public function setNome($nome){
        return $this->nome=$nome;
    }
    public function setid_Localizacion($localizacion_id){
        return $this->localizacion_id=$localizacion_id;
    }
}
?>