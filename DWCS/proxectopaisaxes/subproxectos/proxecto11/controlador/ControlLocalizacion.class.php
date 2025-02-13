<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 6/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//incluimos a clase Dao
include_once("./modelo/Dao.class.php");

//Declaramos a clase de control 

class ControlLocalizacion
{

    //Varible que almacenará os erros
    public $erros = [];

    //Funcion para mostrar os erros
    function mostrarerros(): array
    {
        return $this->erros;
    }
    //Funcions que mostrarán toda a informacion das taboas
    public function indexLocalizacion()
    {
        //Almacenamos a clase Dao nunha variable para ter dispoñibles seus metodos
        $dao = new DAO();
        try {
            //Si a BD atópase conectada
            if ($dao->conectar()) {
                //chamamos a funcion que mostra todas as localizacions
                return $dao->lerLocalizacion();
            } else {
                return "Fallo de conexion ao mostrar a localizacion";
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }

    //Funcions de control para mostrar unha fila especifica da taboa

    function showLocalizacion(int $idLocalizacion): Localizacion
    {
        try {
            //Si atopase vacio
            if (empty($idLocalizacion)) {
                $this->erros[] =  "<span style='color: red;'> el id es obligatorio</span>";
            }
            //Si non é un numero
            if (!is_numeric($idLocalizacion)) {
                $this->erros[] =  "<span style='color: red;'> el id tien que ser numerico</span>";
            }
            //Si non hai erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectamos coa base de datos
                if ($dao->conectar()) {

                    return $dao->localizacionID($idLocalizacion); //Devolvemos o id
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
    function destroyLocalizacion(int $idLocalizacion)
    {
        try {
            //Si non se atopa o id
            if (empty($idLocalizacion)) {
                $this->erros[] =  "<span style='color: red;'> O id é obligatorio</span>"; //Salta o erro
            }
            //Si non é un numero 
            if (!is_numeric($idLocalizacion)) {
                $this->erros[] =  "<span style='color: red;'> O id é obligatorio</span>"; //Salta o erro
            }
            //Si non atopanse erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectamos a base de datos
                if ($dao->conectar()) {
                    $dao->borrarLocalizacion($idLocalizacion); //Borramos
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }


    //Funcions de control para insertar

    function createLocalizacion(Localizacion $localizacion)
    {
        try {
            //Si non hai erros
            if (empty($this->erros)) {
                $dao = new DAO();
                //Conectase a base de datos
                if ($dao->conectar()) {
                    $localizaciones =  $dao->gardarLocalizacion($localizacion); //Gardamos a informacion na base de datos
                }

                return $localizaciones;
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }


    //Funcions para modificar as filas das tablas

    function updateLocalizacion(Localizacion $localizacion)
    {
        try {
            if (empty($this->erros)) {
                $dao = new DAO();
                if ($dao->conectar()) {
                    $dao->modificarLocalizacion($localizacion);
                }
            }
        } catch (\Throwable $e) {
            //Se en calquera sentenza salta a excepcion fai o rollback
            $dao->pdoRollback();
            throw ($e);
        }
    }
}
