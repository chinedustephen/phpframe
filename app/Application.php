<?php

namespace App;


class Application{

    private static $instance = null;

    protected $request;

    protected $response;

    private $path = '/';

    public function __construct(){
        $this->request = new AppRequest();
        $this->response = new AppResponse();
    }

    public static function instance(){

        if (self::$instance == null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function checkRoute($route, $verb){
        if(isset($_SERVER['PATH_INFO'])){
            $this->path = $_SERVER['PATH_INFO'];
        }

        $serverVerb = strtolower($_SERVER['REQUEST_METHOD']);

        return $this->path === $route && $verb === $serverVerb;

    }


    public function get($route, $callback){
        if($this->checkRoute($route, 'get')) {
            $callback($this->request, $this->response);
        }
    }

    public function post($route, $callback){
        if($this->checkRoute($route,'post')) {
            $callback($this->request, $this->response);
        }
    }
}