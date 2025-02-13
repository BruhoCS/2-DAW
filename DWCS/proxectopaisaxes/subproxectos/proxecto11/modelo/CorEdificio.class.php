<?php 
    Class CorEdificio{
        public $id_edificio="";
        public $id_cor = "";

        //Function crearCorEdificio
        public function crearCorEdificio($id_edificio,$id_cor){
            $this->id_edificio=$id_edificio;
            $this->id_cor=$id_cor;
        }
        
       //GETTERS
        public function getId_edificio(){
            return $this->id_edificio;
        }
        public function getId_cor(){
            return $this->id_cor;
        }

       //SETTERS
        public function setId_edificio($id_edificio){
            return $this->id_edificio=$id_edificio;
        }
        public function setId_cor($id_cor){
            return $this->id_cor=$id_cor;
        }
    }
?>