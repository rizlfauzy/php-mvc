<?php

class ModelMahasiswa
{
  private $table = "mahasiswa";
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getListMahasiswa(){
    try {
      $this->db->query('SELECT  "id", "name", "email", "nrp", "jurusan" FROM '.$this->table.' LIMIT 1000;');
      return $this->db->list();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function getMahasiswaById($id = ""){
    try {
      if (empty($id)) throw new Exception("id tidak ada");
      $this->db->query('SELECT  "id", "name", "email", "nrp", "jurusan" FROM '.$this->table.' WHERE id=:id;');
      $this->db->bind("id",$id);
      return $this->db->single();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}
