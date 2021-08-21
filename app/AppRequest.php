<?php
namespace App;


class AppRequest{

    public function input($name){
        $allInputs = array_merge($_POST, $_GET);
        return (isset($allInputs[$name])) ? $allInputs[$name] : '';
    }

    public function formData(){
        return file_get_contents("php://input");
//        return $_POST;
    }


}

