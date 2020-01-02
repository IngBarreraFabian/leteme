<?php

require_once 'controllers/errores.php';

class App{

    function __construct(){
        $url = isset($_GET['url'])? $_GET['url']: null;
        $url = rtrim($url, '/');
        if(!isset($_POST['auth'])){
            $_SESSION['url'] = explode('/', $url);
        }
        

        if(isset($_SESSION['auth']) && $_SESSION['auth']==true){
            if(empty($_SESSION['url'][0])){
                $archivoController = 'controllers/index.php';
                require $archivoController;
                $controller = new Index();
                $controller->render();
                $controller->loadModel('index');
                return false;
            }else{
                $archivoController = 'controllers/' . $_SESSION['url'][0] . '.php';
            }
    
            if(file_exists($archivoController)){
                require $archivoController;

                $controller = new $_SESSION['url'][0];
                $controller->loadModel($_SESSION['url'][0]);

                // Se obtienen el número de param
                $nparam = sizeof($_SESSION['url']);
                // si se llama a un método
                if($nparam > 1){
                    // hay parámetros
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i < $nparam; $i++){
                            array_push($param, $_SESSION['url'][$i]);
                        }
                        $controller->{$_SESSION['url'][1]}($param);
                    }else{
                        // solo se llama al método
                        $controller->{$_SESSION['url'][1]}();
                    }
                }else{
                    // si se llama a un controlador
                    $controller->render();  
                }
            }else{
                $controller = new Errores();
            }
        }else{
            $archivoController = 'controllers/index.php';
            require $archivoController;
            $controller = new Index();
            if(isset($_POST['auth'])){
                $controller->loadModel('index');
                $controller->ValidarUsuario();
            }else{
                $controller->Autenticar();
            }
            //$controller->loadModel('index');
            return false;   
                
                
        }
    }
    
}
?>