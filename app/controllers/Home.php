<?php

class Home extends Controller
{
    public function index()
    {   
        $data["title"] = "Home | Index";
        $data["home"] = true;
        $this->view("templates/header",$data);
        $this->view("home/index");
        $this->view("templates/footer");
    }
}
