<?php

class Database
{
  private $dbh;
  private $stmnt;

  public function __construct() {
    try {
      $option = [
        PDO::ATTR_PERSISTENT=>true,
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
      ];
      $dsn = "pgsql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB_NAME;
      $this->dbh = new PDO($dsn,DB_USER,DB_PASS,$option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query){
    $this->stmnt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null){
    if (is_null($type)){
      if (is_int($value)) $type = PDO::PARAM_INT;
      else if (is_bool($value)) $type = PDO::PARAM_BOOL;
      else if (is_null($value)) $type = PDO::PARAM_NULL;
      else $type = PDO::PARAM_STR;
    }
    $this->stmnt->bindValue($param,$value,$type);
  }

  public function execute(){
    $this->stmnt->execute();
  }

  public function list(){
    $this->execute();
    return $this->stmnt->fetchAll(PDO::FETCH_OBJ);
  }

  public function single(){
    $this->execute();
    return $this->stmnt->fetch(PDO::FETCH_OBJ);
  }
}
