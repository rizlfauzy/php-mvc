<?php

class Mahasiswa extends Controller {
    public function index(){
        $data["title"] = "Mahasiswa | Index";
        $data["mahasiswa"] = true;
        $data["list_mahasiswa"] = $this->model("ModelMahasiswa")->getListMahasiswa();
        $this->view("templates/header",$data);
        $this->view("mahasiswa/index",$data);
        $this->view("templates/footer");
    }

    public function detail($id){
        $data["title"] = "Mahasiswa | Detail";
        $data["mahasiswa"] = true;
        $data["mhs"] = $this->model("ModelMahasiswa")->getMahasiswaById($id);
        $this->view("templates/header",$data);
        $this->view("mahasiswa/detail",$data);
        $this->view("templates/footer");
    }
}