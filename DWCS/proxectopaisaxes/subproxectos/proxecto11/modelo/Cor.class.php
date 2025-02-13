<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 5/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

class Cor{
    public $id;
    public $nome;
    public $gama_cromatica;
    public $tipo;

    public function crearCor(?int $id,$nome,$gama_cromatica,$tipo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->gama_cromatica = $gama_cromatica;
        $this->tipo = $tipo;
    }

    //Getters
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getGama_cromatica(){
        return $this->gama_cromatica;
    }
    public function getTipo(){
        return $this->tipo;
    }

    //Setters
    public function setId($id){
        return $this->id = $id;
    }
    public function setNome($nome){
        return $this->nome=$nome;
    }
    public function setGama_cromatica($gama_cromatica){
        return $this->gama_cromatica=$gama_cromatica;
    }
    public function setTipo($tipo){
        return $this->tipo = $tipo;
    }
}
?>