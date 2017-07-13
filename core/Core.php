<?php
class Core {
    
    public function run(){
        //$url = substr($_SERVER['PHP_SELF'], 10);
        //$url = explode("index.php", $_SERVER['PHP_SELF']);
        //$url = end($url);
        
        $url = '/'.((isset($_GET['q']))?$_GET['q']:''); //usado no modulo mvc
        
        //$url = explode("index.php", $_SERVER['PHP_SELF']); //resolveu o problema da categoria
        //$url = end($url);
        
        $params = array();
        if(!empty($url) && $url !='/'){
            $url = explode('/', $url);
            array_shift($url);
            $currentController = $url[0].'Controller';
            array_shift($url);
            
            if(isset($url[0])&& !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            if(count($url) > 0){
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        //require_once 'core/controller.php'; //na aula 8 do Bonieky não tem
        
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
}
