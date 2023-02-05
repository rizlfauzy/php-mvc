<?php

class App
{
    protected $controller = "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // controller
        if ($url && file_exists("../app/controllers/{$url[0]}.php")) {
            $this->controller = $url[0];
            if (array_key_exists("1",$url) && $url[1] == "detail" && !array_key_exists("2",$url)){
                $this->controller = "NotFound";
                $this->method = "index";
            }
            unset($url[0]);
        }
        require_once "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        // method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // params
        if (!empty($url)) {
            $this->params = $url;
        }


        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
