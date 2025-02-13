<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 1/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//incluimos a clase Dao
include_once("./modelo/Dao.class.php");

//Declaramos a clase de control 

class ControlElemento
{

    //Varible que almacenará os erros
    public $erros = [];

    //Funcion para mostrar os erros
    function mostrarerros(): array
    {
        return $this->erros;
    }
    //Funcions que mostrarán toda a informacion das taboas

    public function indexElemento()
    {
        //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try {
            //Si a BD atópase conectada
            if ($dao->conectar()) {
                //chamamos a funcion que mostra todos os elementos
                return $dao->lerElemento();
            } else {
                return "Fallo de conexion ao mostrar os elementos";
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }

    public function indexElementoDoEdificio($id_edificio)
    {
        //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try {
            //Si a BD atópase conectada
            if ($dao->conectar()) {
                //chamamos a funcion que mostra todos os elementos
                return $dao->lerElementoDoEdificio($id_edificio);
            } else {
                return "Fallo de conexion ao mostrar os elementos";
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }

    //Funcions de control para mostrar unha fila especifica da taboa

    function showElemento(int $idElemento): Elemento

    {
        try {
            //Si atopase vacio
            if (empty($idElemento)) {
                $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>"; //Mostramos o erro
            }
            //Si non é un numero
            if (!is_numeric($idElemento)) {
                $this->erros[] =  "<span style='color: red;'> el id tien que ser numerico</span>"; //Mostramos o erro
            }
            //Si non hai erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectamos coa base de datos
                if ($dao->conectar()) {

                    return $dao->elementoID($idElemento); //Devolvemos o id
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }

    //Funcions de control para eliminar unha fila

    //Creamos a funcion para borrar
    function destroyElemento(int $idElemento)
    {
        try {
            //Si non se atopa o id
            if (empty($idElemento)) {
                $this->erros[] =  "<span style='color: red;'> O id é obligatorio</span>"; //Salta o erro
            }
            //Si non é un numero 
            if (!is_numeric($idElemento)) {
                $this->erros[] =  "<span style='color: red;'> O id é obligatorio</span>"; //Salta o erro
            }
            //Si non atopanse erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectamos a base de datos
                if ($dao->conectar()) {
                    $dao->borrarElemento($idElemento); //Borramos
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }

    //Funcions de control para insertar

    function createElemento(Elemento $elemento)
    {
        try {
            //Validacions dos seus campos necesarios
            if (empty($elemento->getNome())) {
                $this->erros[0] =  "<span style='color: red;'> O nome é obrigatorio</span>";
            }
            //Si non hai erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectase a base de datos
                if ($dao->conectar()) {
                    $elementos =  $dao->gardarElemento($elemento); //Gardamos a informacion na base de datos
                }

                return $elementos;
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }


    //Funcions para modificar as filas das tablas

    function updateElemento(Elemento $elemento)
    {
        try {
            //Validacions dos seus campos necesarios
            if (empty($elemento->getNome())) {
                $this->erros[0] =  "<span style='color: red;'> O nome é obrigatorio</span>";
            }
            if (empty($this->erros)) {
                $dao = new DAO();
                if ($dao->conectar()) {
                    $dao->modificarElemento($elemento);
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }
}
