<?php
class Controller{
    public function model($model){
        require_once "./client/models/".$model.".php";
        return new $model;
    }
    public function view($view, $data=[]){
        require_once "./client/views/".$view.".php";
    }
    public function redirect($url){
        header('Location: '.HOST.$url);
    }
}

?>