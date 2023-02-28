<?php

class Mahasiswa extends Controller
{
  private $model_mahasiswa,
    $model_jurusan;

  public function __construct()
  {
    $this->model_mahasiswa = $this->model("ModelMahasiswa");
    $this->model_jurusan = $this->model("ModelJurusan");
  }

  public function index()
  {
    $data["title"] = "Mahasiswa | Index";
    $data["mahasiswa"] = true;
    $data["list_mahasiswa"] = $this->model_mahasiswa->getListMahasiswa();
    $this->view("templates/header", $data);
    $this->view("modals/modal_insert");
    $this->view("mahasiswa/index", $data);
    $this->view("templates/footer");
  }

  public function detail($id = "")
  {
    $data["title"] = "Mahasiswa | Detail";
    $data["mahasiswa"] = true;
    $data["mhs"] = $this->model_mahasiswa->getMahasiswaById($id);
    $this->view("templates/header", $data);
    $this->view("mahasiswa/detail", $data);
    $this->view("templates/footer");
  }

  public function get_list_jurusan()
  {
    try {
      echo json_encode([
        "error" => false,
        "message" => "Data jurusan berhasil didapatkan",
        "data" => $this->model_jurusan->getListJurusan()
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function get_jurusan_by_name($name = "")
  {
    try {
      $url = rtrim($_GET["url"], "/");
      $url = explode("/", $url);
      $jurusan = $url[2] ?? "";
      echo json_encode([
        "error" => false,
        "message" => "Data jurusan berhasil didapatkan",
        "data" => $this->model_jurusan->getJurusanByName($jurusan)
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function insert(){
    try {
      $body = $_POST;
      if (!filter_var($body['email'], FILTER_VALIDATE_EMAIL)) throw new Exception("Email Tidak Valid !!!");
      $isNrpReady = $this->model_mahasiswa->isNrpReady($body['nrp']);
      if ($isNrpReady) throw new Exception("NRP sudah digunakan !!!");
      if (!is_numeric($body['nrp'])) throw new Exception("NRP harus berupa angka");
      if (strlen($body['nrp']) < 12) throw new Exception("NRP kurang dari 12 angka !!!");
      $isEmailReady = $this->model_mahasiswa->isEmailReady($body['email']);
      if ($isEmailReady) throw new Exception("Email sudah digunakan !!!");
      $insertMahasiswa = $this->model_mahasiswa->insertMahasiswa($body);
      if ($insertMahasiswa < 1) throw new Exception("Data gagal terinput");
      echo json_encode([
        "error" => false,
        "message" => "Mahasiswa berhasil ditambahkan",
        "data" => $this->model_mahasiswa->getListMahasiswa()
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function delete($id = ""){
    try {
      $deleteMahasiswa = $this->model_mahasiswa->deleteMahasiswa($id);
      if ($deleteMahasiswa < 1) throw new Exception("Mahasiswa gagal terhapus");
      echo json_encode([
        "error" => false,
        "message" => "Mahasiswa berhasil dihapus",
        "data" => $this->model_mahasiswa->getListMahasiswa()
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }

  public function get_mahasiswa_by_id($id){
    try {
      if (empty($id)) throw new Exception("Id tidak boleh kosong");
      $mhs = $this->model_mahasiswa->getMahasiswaById($id);
      if(!$mhs) throw new Exception(("Mahasiswa dengan id tersebut tidak tersedia !!!"));
      echo json_encode([
        "error" => false,
        "message" => "Mahasiswa berhasil dihapus",
        "data" => $mhs
      ]);
    } catch (\Exception $e) {
      echo json_encode(["error" => true, "message" => $e->getMessage()]);
    }
  }
}
