<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/

require_once('Usuario.class.php');

class DAO {

  private static $dbHost = 'localhost';
  private static $dbName = 'proxectopaisaxes';
  private static $dbUser = 'phpmyadmin';
  private static $dbPassword = 'xubu';
  private static $pdo;  

  // Método para establecer a conexión coa base de datos
  public static function conectar() {

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

public static function obterUsuarioPorLogin(string $uid): ?Usuario {
    
    $pdo = self::conectar();
    
    // Consulta SQL para recuperar os datos dun usuario polo nome
    $sql = "SELECT * FROM usuarios WHERE login = :uid";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uid', $uid);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Usuario::class);
        $stmt->execute();

        // Obter os resultados coma un obxecto Usuario        
        $usuario = $stmt->fetch();

        // Devolve un obxecto usuario se o atopa ou null se non 
        return $usuario ? $usuario : null;

    } catch (PDOException $e) {
        echo "Erro ao obter o usuario: " . $e->getMessage();
        return null;
    }

}

}
?>