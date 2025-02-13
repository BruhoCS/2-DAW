<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 5/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases dos obxetos
include_once(__DIR__ . "/../modelo/Cor.class.php");
include_once(__DIR__ . "/../modelo/Edificio.class.php");
include_once(__DIR__ . "/../modelo/Elemento.class.php");
include_once(__DIR__ . "/../modelo/Localizacion.class.php");

use Termwind\Components\Element;

//Creamos a clase Dao
class Dao
{
    //Creamos a variable PDO

    private static $dbHost = 'localhost';
    private static $dbName = 'proxectopaisaxes';
    private static $dbUser = 'phpmyadmin';
    private static $dbPassword = 'xubu';
    private static $pdo;

    //Funcions da clase

    // Método para establecer a conexión coa base de datos
    public static function conectar()
    {
        if (!isset(self::$pdo)) {
            try {
                // Crea unha nova instancia de PDO
                self::$pdo = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPassword);
                // Configura o modo de erro e as excepcións
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$pdo->exec("SET NAMES 'utf8'");
            } catch (PDOException $e) {
                echo "Error de conexión á base de datos: " . $e->getMessage();
            }
        }
        // Devolve a instancia de PDO
        return self::$pdo;
    }

    //Funcion para poder usar o pdo en outras clases
    public function pdoRollback()
    {
        return self::$pdo->rollBack();
    }
    //Obter o ultimo id insertado
    //Funcions para ler as tablas
    public function lerEdificio()
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_edificio");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_edificio = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Edificio');
            return $lista_edificio;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function lerCor()
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_cor");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_cores = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Cor');
            return $lista_cores;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function lerCorDoEdificio($id_edificio)
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_cor INNER JOIN proxecto11_cor_edificio ON proxecto11_cor.id = proxecto11_cor_edificio.id_cor WHERE proxecto11_cor_edificio.id_edificio = $id_edificio");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_cores = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Cor');
            return $lista_cores;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function lerElemento()
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_elemento");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_elementos = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Elemento');
            return $lista_elementos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function lerElementoDoEdificio($id_edificio)
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_elemento WHERE proxecto11_elemento.id_edificio = $id_edificio");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_elementos = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Elemento');
            return $lista_elementos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function lerLocalizacion()
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_localizacion");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_localizacions = $mostrar->fetchAll(PDO::FETCH_CLASS, 'Localizacion');
            return $lista_localizacions;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function lerEdificioCor()
    {
        try {
            //executamos a consulta con query()
            $mostrar = self::$pdo->query("SELECT * FROM proxecto11_cor_edificio");
            //Usar fetchAll para obter todos os cores dun array de obxectos
            $lista_CorEdificio = $mostrar->fetchAll(PDO::FETCH_CLASS, 'CorEdificio');
            return $lista_CorEdificio;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //Funcions para borrar nas tablas


    public function borrarEdificio($id)
    {
        try {
            //Iniciamos a transaccion
            self::$pdo->beginTransaction();

            //Borramos primeiro os elementos relacionados
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_elemento WHERE proxecto11_elemento.id_edificio = :id");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id", $id);
            $borrar->execute();

            //Despois borramos o edificio
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_edificio WHERE id = :id");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id", $id);
            $borrar->execute();

            //Borramos as relacions coas cores
            $borrarAsociacions = self::$pdo->prepare("DELETE FROM proxecto11_cor_edificio WHERE id_edificio = :id");
            $borrarAsociacions->bindValue(":id", $id);
            $borrarAsociacions->execute();

            //Confirmamos a transacción
            self::$pdo->commit();
        } catch (PDOException $e) {
            //Se hai algun erro,desfacer a transacción
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function borrarCor($id)
    {
        try {
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_cor WHERE id = :id");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id", $id);
            $borrar->execute();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function borrarElemento($id)
    {
        try {
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_elemento WHERE id = :id");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id", $id);
            $borrar->execute();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function borrarLocalizacion($id)
    {
        try {
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_localizacion WHERE id = :id");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id", $id);
            $borrar->execute();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    public function borrarCorEdificio($id_edificio)
    {
        try {
            //Creamos a sentencia
            $borrar = self::$pdo->prepare("DELETE FROM proxecto11_cor_edificio WHERE id_edificio = :id_edificio");
            //Usamos bindValue para vincular ao parametro
            $borrar->bindValue(":id_edificio", $id_edificio);
            $borrar->execute();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    //Funcions para gardar nas tablas


    public function gardarEdificio(Edificio $edificio, $cores)
    {
        try {
            //Comenzar a transacción
            self::$pdo->beginTransaction();

            //Creamos a sentencia sql
            $gardar = self::$pdo->prepare("INSERT INTO proxecto11_edificio (nome,localizacion_id) VALUE (:nome,:localizacion_id)");
            //Usamos bindValue para vincular os parámetros
            $gardar->bindValue(":nome", $edificio->nome);
            $gardar->bindValue(":localizacion_id", $edificio->localizacion_id);
            $gardar->execute();

            //Obtemos o ultimo id insertado
            $id_edificio = self::$pdo->lastInsertId();

            //Asociamos o edificio cos cores
            $stmtCores = self::$pdo->prepare("INSERT INTO proxecto11_cor_edificio (id_edificio,id_cor) VALUE (:id_edificio,:id_cor)");
            foreach ($cores as $id_cor) {
                $stmtCores->bindValue(":id_edificio", $id_edificio);
                $stmtCores->bindValue(":id_cor", $id_cor);
                //Executamos a sentencia sql
                $stmtCores->execute();
            }
            self::$pdo->commit();
        } catch (PDOException $e) {
            //Se hai algun erro,desfacer a transacción
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function gardarCor(Cor $cor)
    {
        try {
            //Comenzar a transacción
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $gardar = self::$pdo->prepare("INSERT INTO proxecto11_cor (nome,gama_cromatica,tipo) VALUE (:nome,:gama_cromatica, :tipo)");
            //Usamos bindValue para vincular os parámetros
            $gardar->bindValue(":nome", $cor->nome);
            $gardar->bindValue(":gama_cromatica", $cor->gama_cromatica);
            $gardar->bindValue(":tipo", $cor->tipo);
            //Executamos a sentencia sql
            $gardar->execute();
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function gardarElemento(Elemento $elemento)
    {
        try {
            //Comenzar a transacción
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $gardar = self::$pdo->prepare("INSERT INTO proxecto11_elemento (id_edificio,nome,material,acabamento,ano_construcion,textura,tipo,colocacion,cor,comentario) VALUE (:id_edificio,:nome, :material,:acabamento,:ano_construcion,:textura,:tipo,:colocacion,:cor,:comentario)");
            //Usamos bindValue para vincular os parámetros
            $gardar->bindValue(":id_edificio", $elemento->id_edificio);
            $gardar->bindValue(":nome", $elemento->nome);
            $gardar->bindValue(":material", $elemento->material);
            $gardar->bindValue(":acabamento", $elemento->acabamento);
            $gardar->bindValue(":ano_construcion", $elemento->ano_construcion);
            $gardar->bindValue(":textura", $elemento->textura);
            $gardar->bindValue(":tipo", $elemento->tipo);
            $gardar->bindValue(":colocacion", $elemento->colocacion);
            $gardar->bindValue(":cor", $elemento->cor);
            $gardar->bindValue(":comentario", $elemento->comentario);
            //Executamos a sentencia sql
            $gardar->execute();
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function gardarLocalizacion(Localizacion $localizacion)
    {
        try {
            //Comenzar a transacción
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $gardar = self::$pdo->prepare("INSERT INTO proxecto11_localizacion (comarca_paisaxistica,localidade,concello,numero,rua,parroquia,provincia,area_paisaxistica,cod_postal) VALUE (:comarca_paisaxistica, :localidade, :concello, :numero, :rua, :parroquia, :provincia, :area_paisaxistica, :cod_postal)");
            //Usamos bindValue para vincular os parámetros
            $gardar->bindValue(":comarca_paisaxistica", $localizacion->comarca_paisaxistica);
            $gardar->bindValue(":localidade", $localizacion->localidade);
            $gardar->bindValue(":concello", $localizacion->concello);
            $gardar->bindValue(":numero", $localizacion->numero);
            $gardar->bindValue(":rua", $localizacion->rua);
            $gardar->bindValue(":parroquia", $localizacion->parroquia);
            $gardar->bindValue(":provincia", $localizacion->provincia);
            $gardar->bindValue(":area_paisaxistica", $localizacion->area_paisaxistica);
            $gardar->bindValue(":cod_postal", $localizacion->cod_postal);
            //Executamos a sentencia sql
            $gardar->execute();
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    public function gardarCorEdificio(CorEdificio $corEdificio)
    {
        try {
            //Comenzar a transacción
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $gardar = self::$pdo->prepare("INSERT INTO proxecto11_cor_edificio (id_edificio,id_cor) VALUE (:id_edificio,:id_cor)");
            //Usamos bindValue para vincular os parámetros
            $gardar->bindValue(":id_edificio", $corEdificio->id_edificio);
            $gardar->bindValue(":id_cor", $corEdificio->id_cor);
            //Executamos a sentencia sql
            $gardar->execute();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    //Funcions para modificar as tablas


    public function modificarEdificio(Edificio $edificio, $cores)
    {
        try {
            //Comezamos a transaccion
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $modificar = self::$pdo->prepare("UPDATE proxecto11_edificio SET nome=:nome,localizacion_id=:localizacion_id WHERE id=:id");
            //Usamos bindValue para vincular os parámetros
            $modificar->bindValue(":nome", $edificio->nome);
            $modificar->bindValue(":localizacion_id", $edificio->localizacion_id);
            $modificar->bindValue(":id",$edificio->id);
            //Executamos a sentencia sql
            $modificar->execute();

            //Borramos as asociacions coas cores
            $borrarAsociacions = self::$pdo->prepare("DELETE FROM proxecto11_cor_edificio WHERE id_edificio = :id");
            $borrarAsociacions->bindValue(":id", $edificio->id);
            $borrarAsociacions->execute();

            //As volvemos a asociar 
            foreach ($cores as $cor_id) {
                $asociarCor = self::$pdo->prepare("INSERT INTO proxecto11_cor_edificio (id_edificio,id_cor) VALUE (:id_edificio,:id_cor)");
                $asociarCor->bindValue(":id_edificio", $edificio->id);
                $asociarCor->bindValue(":id_cor", $cor_id);
                //Executamos a sentencia sql
                $asociarCor->execute();
            }

            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    public function modificarCor(Cor $cor)
    {
        try {
            self::$pdo->beginTransaction();
            //Creamos la sentencia sql
            $modificar = self::$pdo->prepare("UPDATE proxecto11_cor SET nome=:nome, gama_cromatica=:gama_cromatica, tipo=:tipo WHERE id = :id");
            //Usamos bindValue para vincular os parámetros
            $modificar->bindValue(":nome", $cor->nome);
            $modificar->bindValue(":gama_cromatica", $cor->gama_cromatica);
            $modificar->bindValue(":tipo", $cor->tipo);
            $modificar->bindValue(":id", $cor->id);
            //Executamos a sentencia
            $modificar->execute();
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function modificarElemento(Elemento $elemento)
    {
        try {
            self::$pdo->beginTransaction();
            //Creamos la sentencia sql
            $modificar = self::$pdo->prepare("UPDATE proxecto11_elemento SET id_edificio=:id_edificio,nome=:nome, material=:material,acabamento=:acabamento
        ,ano_construcion=:ano_construcion,textura=:textura,tipo=:tipo,colocacion=:colocacion,cor=:cor,comentario=:comentario WHERE id = :id");
            //Usamos bindValue para vincular os parámetros
            $modificar->bindValue(":id",$elemento->id);
            $modificar->bindValue(":id_edificio", $elemento->id_edificio);
            $modificar->bindValue(":nome", $elemento->nome);
            $modificar->bindValue(":material", $elemento->material);
            $modificar->bindValue(":acabamento", $elemento->acabamento);
            $modificar->bindValue(":ano_construcion", $elemento->ano_construcion);
            $modificar->bindValue(":textura", $elemento->textura);
            $modificar->bindValue(":tipo", $elemento->tipo);
            $modificar->bindValue(":colocacion", $elemento->colocacion);
            $modificar->bindValue(":cor", $elemento->cor);
            $modificar->bindValue(":comentario", $elemento->comentario);
            //Executamos a sentencia sql
            $modificar->execute();
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }
    public function modificarLocalizacion(Localizacion $localizacion)
    {
        try {
            //Iniciamos a transaccion
            self::$pdo->beginTransaction();
            $modificar = self::$pdo->prepare("UPDATE proxecto11_localizacion SET  comarca_paisaxistica=:comarca_paisaxistica,localidade=:localidade,concello=:concello,
        numero=:numero,rua=:rua,parroquia=:parroquia,provincia=:provincia,area_paisaxistica=:area_paisaxistica,cod_postal=:cod_postal WHERE id = :id");
            //Usamos bindValue para vincular os parámetros
            $modificar->bindValue(":id", $localizacion->id);
            $modificar->bindValue(":comarca_paisaxistica", $localizacion->comarca_paisaxistica);
            $modificar->bindValue(":localidade", $localizacion->localidade);
            $modificar->bindValue(":concello", $localizacion->concello);
            $modificar->bindValue(":numero", $localizacion->numero);
            $modificar->bindValue(":rua", $localizacion->rua);
            $modificar->bindValue(":parroquia", $localizacion->parroquia);
            $modificar->bindValue(":provincia", $localizacion->provincia);
            $modificar->bindValue(":area_paisaxistica", $localizacion->area_paisaxistica);
            $modificar->bindValue(":cod_postal", $localizacion->cod_postal);
            //executatamos a sentencia sql
            $modificar->execute();
            //Confirmamos a transacción
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    public function modificarCorEdificio(CorEdificio $corEdificio)
    {
        try {
            self::$pdo->beginTransaction();
            //Creamos a sentencia sql
            $modificar = self::$pdo->prepare("UPDATE proxecto11_cor_edificio SET id_edificio=:id_edificio,id_cor=:id_cor");
            //Usamos bindValue para vincular os parámetros
            $modificar->bindValue(":id_edificio", $corEdificio->id_edificio);
            $modificar->bindValue(":id_cor", $corEdificio->id_cor);

            //Executamos a sentencia sql
            $modificar->execute();
            //Confirmamos a transacción
            self::$pdo->commit();
        } catch (PDOException $e) {
            self::$pdo->rollBack();
            die("Erro: " . $e->getMessage());
        }
    }

    //Funcions para atopar o id
    function edificioID(int $id): Edificio
    {
        try {
            $resultado = self::$pdo->prepare("SELECT * from proxecto11_edificio where id=:id;");
            $resultado->bindValue(":id", $id);
            $resultado->execute();
            $edificio = $resultado->fetchObject("Edificio");
            return $edificio;
        } catch (PDOException $e) {
            die("error:" . $e->getMessage());
        }
    }

    function corID(int $id): Cor
    {
        try {
            $resultado = self::$pdo->prepare("SELECT * from proxecto11_cor where id=:id;");
            $resultado->bindValue(":id", $id);
            $resultado->execute();
            $cor = $resultado->fetchObject("Cor");
            return $cor;
        } catch (PDOException $e) {
            die("error:" . $e->getMessage());
        }
    }

    function elementoID(int $id): Elemento
    {
        try {
            $resultado = self::$pdo->prepare("SELECT * from proxecto11_elemento where id=:id;");
            $resultado->bindValue(":id", $id);
            $resultado->execute();
            $elemento = $resultado->fetchObject("Elemento");
            return $elemento;
        } catch (PDOException $e) {
            die("error:" . $e->getMessage());
        }
    }

    function localizacionID(int $id): Localizacion
    {
        try {
            $resultado = self::$pdo->prepare("SELECT * from proxecto11_localizacion where id=:id;");
            $resultado->bindValue(":id", $id);
            $resultado->execute();
            $localizacion = $resultado->fetchObject("Localizacion");
            return $localizacion;
        } catch (PDOException $e) {
            die("error:" . $e->getMessage());
        }
    }

    function CorEdificioID(int $id_edificio): CorEdificio
    {
        try {
            $resultado = self::$pdo->prepare("SELECT * FROM proxecto11_cor_edificio WHERE id_edificio=:id_edificio;");
            $resultado->bindValue(":id_edificio", $id_edificio);
            $resultado->execute();
            $edificioCor = $resultado->fetchObject("CorEdificio");
            return $edificioCor;
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
