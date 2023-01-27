<?php 

class NotFound extends Controller{
    public function index(){
        $data["title"] = "404 | Index";
        $this->view("templates/header",$data);
        $this->view("not_found/index",$data);
        $this->view("templates/footer"); 
    }
}

?>