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

  public function isEmailReady($email = ""){
    try {
      if (empty($email)) throw new Exception("Email tidak ada");
      $this->db->query('SELECT "email" FROM '.$this->table.' WHERE email=:email;');
      $this->db->bind("email",$email);
      return $this->db->single();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function isNrpReady($nrp = ""){
    try {
      if (empty($nrp)) throw new Exception("NRP tidak ada");
      $this->db->query('SELECT "nrp" FROM '.$this->table.' WHERE nrp=:nrp;');
      $this->db->bind("nrp",$nrp);
      return $this->db->single();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function insertMahasiswa($data){
    try {
      if (empty($data)) throw new Exception("Data tidak ada");
      $this->db->query('INSERT INTO '.$this->table.' (name, email,nrp,jurusan) VALUES (:nama,:email,:nrp,:jurusan)');
      $this->db->bind("nama",$data['nama']);
      $this->db->bind("email",$data['email']);
      $this->db->bind("nrp",$data['nrp']);
      $this->db->bind("jurusan",$data['jurusan']);
      $this->db->execute();
      return $this->db->rowCount();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function deleteMahasiswa($id = ""){
    try {
      if (empty($id)) throw new Exception("id tidak ada");
      $this->db->query('DELETE FROM '.$this->table.' WHERE id=:id;');
      $this->db->bind("id",$id);
      $this->db->execute();
      return $this->db->rowCount();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
}
