<?php

class About extends Controller{
    public function index($name = "Rizal Fauzi",$role = "Programmer"){
        $data["title"] = "About | Index";
        $data['name'] = $name;
        $data['role'] =$role;
        $data["about"] = true;
        $this->view("templates/header",$data);
        $this->view("about/index",$data);
        $this->view("templates/footer",$data);
    }
}