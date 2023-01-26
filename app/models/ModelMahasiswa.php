<?php

class ModelMahasiswa
{
  private $dbh;
  private $stmnt;

  public function __construct(){
    try {
      $dsn = "pgsql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB_NAME . ";user=" . DB_USER . ";password=" . DB_PASS;
      $this->dbh = new PDO($dsn);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function getListMahasiswa(){
    try {
      $this->stmnt = $this->dbh->prepare('SELECT  "id", "name", "email", "nrp", "jurusan" FROM "public"."mahasiswa" LIMIT 1000;');
      $this->stmnt->execute();
      return $this->stmnt->fetchAll(PDO::FETCH_OBJ);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}
