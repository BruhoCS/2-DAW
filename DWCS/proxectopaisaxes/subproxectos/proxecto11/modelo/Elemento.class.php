<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 04/12/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/
class Elemento{
    public $id = "";
    public $id_edificio = "";
    public $nome = "";
    public $material = "";
    public $acabamento = "";
    public $ano_construcion = "";
    public $textura = "";
    public $tipo = "";
    public $colocacion ="";
    public $cor = "";
    public $comentario = "";

    public function crearElemento(?int $id,$id_edificio,$nome,$material,$acabamento,$ano_construcion,$textura,$tipo,$colocacion,$cor,$comentario) {
        $this->id=$id;
        $this->id_edificio = $id_edificio;
        $this->nome = $nome;
        $this->material=$material;
        $this->acabamento=$acabamento;
        $this->ano_construcion = $ano_construcion;
        $this->textura = $textura;
        $this->tipo=$tipo;
        $this->colocacion=$colocacion;
        $this->cor=$cor; 
        $this->comentario=$comentario;
    }

    //getters
    public function getId(){
        return $this->id;
    }
    public function getId_edificio(){
        return $this->id_edificio;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getMaterial(){
        return $this->material;
    }
    public function getAcabamento(){
        return $this->acabamento;
    }
    public function getAno_construcion(){
        return $this->ano_construcion;
    }
    public function getTextura(){
        return $this->textura;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getColocacion(){
        return $this->colocacion;
    }
    public function getCor(){
        return $this->cor;
    }
    public function getComentario(){
        return $this->comentario;
    }

    //Setters
    public function setId($id){
        return $this->id=$id;
    }
    public function setId_edificio($id_edificio){
        return $this->id_edificio=$id_edificio;
    }
    public function setNome($nome){
        return $this->nome=$nome;
    }
    public function setMaterial($material){
        return $this->material=$material;
    }
    public function setAcabamento($acabamento){
        return $this->acabamento = $acabamento;
    }
    public function setAno_construcion($ano_construcion){
        return $this->ano_construcion = $ano_construcion;
    }
    public function setTextura($textura){
        return $this->textura = $textura;
    }
    public function setTipo($tipo){
        return $this->tipo=$tipo;
    }
    public function setColocacion($colocacion){
        return $this->colocacion=$colocacion;
    }
    public function setCor($cor){
        return $this->cor=$cor;
    }
    public function setComentario($comentario){
        return $this->comentario=$comentario;
    }
}
?>