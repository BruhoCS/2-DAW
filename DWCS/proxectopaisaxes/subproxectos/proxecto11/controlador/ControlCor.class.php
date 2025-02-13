<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 29/1/2024

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//incluimos a clase Dao
include_once("./modelo/Dao.class.php");

//Declaramos a clase de control 

class ControlCor{

    //Varible que almacenará os erros
    public $erros = [];

    //Funcion para mostrar os erros
    function mostrarerros(): array
    {
        return $this->erros;
      
    }
    
    //Funcions que mostrarán toda a informacion das taboas
    public function indexCor(){
        //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try{
            //Si a BD atópase conectada
            if($dao->conectar()){
                //chamamos a funcion que mostra todos os cores
            return $dao->lerCor();
            }else{
                return "Fallo de conexion ao mostrar os cores";
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
        
    }

    public function indexCorDoEdificio($id_edificio){
        //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try{
            //Si a BD atópase conectada
            if($dao->conectar()){
                //chamamos a funcion que mostra todos os cores
            return $dao->lerCorDoEdificio($id_edificio);
            }else{
                return "Fallo de conexion ao mostrar os cores";
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
        
    }
    //Funcions de control para mostrar unha fila especifica da taboa
    function showCor(int $idCor): Cor

    {
        try{
             //Si atopase vacio
        if (empty($idCor)) {
            $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>";//Mostramos o erro
        }
        //Si non é un numero
        if (!is_numeric($idCor)) {
            $this->erros[] =  "<span style='color: red;'> el id tien que ser numerico</span>";//Mostramos o erro
        }
        //Si non hai erros
        if (empty($this->erros)) {
            $dao = new DAO();
            //Conectamos coa base de datos
            if ($dao->conectar()) {

                return $dao->corID($idCor);//Devolvemos o id
            }
        }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
       
    }
    
    //Funcions de control para eliminar unha fila

    //Creamos a funcion para borrar
    function destroyCor(int $idCor)
    {
        try{
            //Si non se atopa o id
        if (empty($idCor)) {
            $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>";//Salta o erro
        }
        //Si non é un numero 
        if (!is_numeric($idCor)) {
            $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>";//Salta o erro
        }
        //Si non atopanse erros
        if (empty($this->erros)) {
            $dao = new DAO();
            //Conectamos a base de datos
            if ($dao->conectar()) {
                $dao->borrarCor($idCor);//Borramos
            }
        }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
        
    }

    //Funcions de control para insertar

    function createCor(Cor $cor)
    {
        try{
        //Si non hai erros
        if (empty($this->erros)) {
            $dao = new DAO();
            //Conectase a base de datos
            if ($dao->conectar()) {
                $cores =  $dao->gardarCor($cor);//Gardamos a informacion na base de datos
            }
            return $cores;
        }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
        
    }

    //Funcions para modificar as filas das tablas

    function updateCor(Cor $cor)
    {
        try{
            $dao = new DAO();
            if ($dao->conectar()) {
                $dao->modificarCor($cor);      
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }   
    }
}
?>