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

class ControlEdificio
{

    //Varible que almacenará os erros
    public $erros = [];

    //Funcion para mostrar os erros
    function mostrarerros(): array
    {
        return $this->erros;
    }
    //Funcions que mostrarán toda a informacion das taboas
    public function indexEdificio()
    {
         //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try {
            //Si a BD atópase conectada
            if ($dao->conectar()) {
                //chamamos a funcion que mostra todos os cores
                return $dao->lerEdificio();
            } else {
                return "Fallo de conexion ao mostrar os cores";
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
    }

    //Funcion de control para mostrar unha fila especifica da taboa
    //mostramos o Edificio co id do edificio pasado a funcion da base de datos chamando a funcion dao 
    function showEdificio(int $idEdificio): Edificio

    {
        $dao = new DAO();
        try {
            //Si atopase vacio 
            if (empty($idEdificio)) {
                $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>"; //Mostramos o erro
            }
            //Si non é un numero
            if (!is_numeric($idEdificio)) {
                $this->erros[] =  "<span style='color: red;'> el id tien que ser numerico</span>"; //Mostramos o erro
            }
            //Si non hai erros
            if (empty($this->erros)) {
                
                //Conectamos coa base de datos
                if ($dao->conectar()) {

                    return $dao->edificioID($idEdificio); //Devolvemos o id
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
    }

    //Funcions de control para eliminar unha fila

    //Creamos a funcion para borrar
    function destroyEdificio(int $idEdificio)
    {
        $dao = new DAO();
        try{
            //Si non se atopa o id
            if (empty($idEdificio)) {
                $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>"; //Salta o erro
            }
            //Si non é un numero 
            if (!is_numeric($idEdificio)) {
                $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>"; //Salta o erro
            }
            //Si non atopanse erros
            if (empty($this->erros)) {
                
                //Conectamos a base de datos
                if ($dao->conectar()) {
                    $dao->borrarEdificio($idEdificio); //Borramos
                }
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
       
    }

    //Funcions de control para insertar
    function createEdificio(Edificio $edificio ,$id_cor)
    {
        $dao = new DAO();
        try{
             //Validacions dos seus campos necesarios
            if (empty($edificio->getNome())) {
                $this->erros[0] =  "<span style='color: red;'> O nome é obrigatorio</span>";
            }
            //Si non hai erros
            if (empty($this->erros)) {
                //Conectase a base de datos
                if ($dao->conectar()) {
                    $edificios = $dao->gardarEdificio($edificio,$id_cor); //Gardamos a informacion na base de datos
                }
                return $edificios;
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
       
    }

    //Funcion para modificar as filas das tablas
    function updateEdifico(Edificio $edificio,$id_cor): void
    {
        $dao = new DAO();
        try{
            if (empty($edificio->getNome())) {
                $this->erros[0] =  "<span style='color: red;'> O nome é obrigatorio</span>";
            }
    
            if (empty($this->erros)) {
                
                if ($dao->conectar()) {
                    $dao->modificarEdificio($edificio,$id_cor);
                }
            }
        }catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw($e);
        }
        
    }
}