<?php
class App{
    protected $controller = "Home";
    protected $action = "SayHi";
    protected $params = [];

    function __construct(){
        $arr = $this->UrlProcess();
        //Xu ly controller
        if(isset($arr[0])){
            if(file_exists("./client/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once ("./client/controllers/".$this->controller.".php");
        $this->controller = new $this->controller;
        //Xu ly Action
        if(isset($arr[1])){
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
            //Xu ly params
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action],$this->params);
    
    }
    function Middleware($url){
        $arr = explode("/",filter_var(trim($url,"/")));
        $routeUser = [  
        ];
    
        if(isset($_SESSION['isLogin']) && $_SESSION['auth'] == 'admin'){
            session_destroy();
            header('Location: '.HOST.'/'.$url);
        }
        if(isset($arr[1])){
            $temp[0] = $arr[0];
            $temp[1] = $arr[1];
            $url = implode("/",$temp);
        }else{
            if(isset($arr[0])){
                $url = $arr[0];
            }else{
                $url = '/';
            }
        }
        foreach($routeUser as $item){
            if($url == $item){
                if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true && $_SESSION['auth']=='user'){
                    return true;
                }else{
                    return false;
                }
            }
        }
        return true;
    
    }
    function UrlProcess(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $checkRoute = $this->Middleware($url);
            $temp = explode("/",filter_var(trim($url,"/")));
            if(!$checkRoute){
                if($temp[0] == 'admin'){
                    $url = 'admin/redirect';
                }else{
                    $url = '/redirect';
                }
            }
            return explode("/",filter_var(trim($url,"/")));
        }
    }
    
}

?>