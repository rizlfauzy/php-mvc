<?php 

class ModelJurusan{
  private $table = "jurusan";
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getListJurusan(){
    try{
      $this->db->query("SELECT id, jurusan FROM $this->table");
      return $this->db->list();
    }catch(\Exception $e){
      die($e->getMessage());
    }
  }

  public function getJurusanByName($name = ""){
    try {
      $this->db->query("SELECT id, jurusan FROM ".$this->table." WHERE jurusan ILIKE '%$name%'");
      // $this->db->bind("jurusan","%$name%");
      return $this->db->list();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}

?>