<?php

namespace App;

class AppResponse{

    public $templateUrl = __DIR__.'/../template/';

    public function send($message){
        echo $message;
    }

    public function render($file, $data, $view = true){

        $path = $this->templateUrl.$file;
        if (file_exists( $path ) ) {

            if($view) {
                ob_clean();
                include_once($path);
                return;
            }else{
                return file_get_contents($path);
            }
        }

        echo 'View file not found';

    }

    public function sendJson($data)
    {
        header('Content-Type:application/json');
        echo json_encode($data);

    }

    public function redirect($route){
        header('Location: '.$route);
    }
}