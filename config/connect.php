<?php

class Connection{

  private $server = "localhost";
  private $user = "root";
  private $password = "";
  private $database = "training_crud";

  public function Connection(){
    $pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->database.";charset=utf8",$this->user,$this->password);

    try {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo '<script>console.log("Banco de dados conectado com sucesso!")</script>';

    } catch (PDOException $error) {
      echo "Falha aos se conectar com o banco".$error->getMessage();
    }
    return $pdo;
  }
}

?>