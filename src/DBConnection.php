<?php

namespace Daw2\ProyectoSoap;
use PDO;
use PDOException;
class DBConnection {

  public $dsn;
  public $user;
  public $password;
  protected static $connection;
  public $db;

  public $db_name;
  private static $instance;
    
  public function __construct() {
    $config = json_decode(file_get_contents('../config.json'), TRUE);  //Ahora cogerá la config de ese directorio, por lo que podemos usar esta clase en cualquier directorio y usará el fichero con ese nombre;
    $this->dsn = "{$config['DBType']}:dbname={$config['DBName']};host={$config['Host']}";;
    $this->user = "{$config['User']}";
    $this->db = "{$config['DBType']}:host={$config['Host']}";
    $this->password = "{$config['Password']}";
    $this->db_name = "{$config['DBName']}";
    DBConnection::$connection = DBConnection::dbConnect();
  }
  function dbClose() {
    DBConnection::$connection = null;
}

    function dbConnect() {
      try {
        $connection = new PDO($this->dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
      } catch (PDOException $error) {
        if($error->getCode() === 1049 ) { // Database no existe 
          echo "<h2>No existe la base de datos, creándola</h2>";
          $connection = new PDO($this->db, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          $query = $connection->prepare("CREATE DATABASE IF NOT EXISTS $this->db_name COLLATE utf8_spanish_ci");
          $query->execute();

          if($query){
              $use_db = $connection->prepare("USE $this->db_name");
              $use_db->execute();
          }

          if($use_db){
              $DBFile = file_get_contents("../tarea6.sql"); //Ahora cogerá la base de datos de ese directorio, por lo que podemos usar esta clase en cualquier directorio y usará el fichero con ese nombre;
              $connection->exec($DBFile);
          }
      }

      echo "Base de datos creada con éxito.";
      return $connection;
      }
    }


  
    public static function getConnection() {
      if(!isset(self::$instance)){
          $object = __CLASS__;
          self::$instance = new $object;
      }
      return self::$instance;
  }

  
}

?>