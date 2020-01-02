<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        
        //echo "<p>Controlador Index</p>";
    }

    function render(){
        $this->view->render('index/index');
    }

    function saludo(){
        echo "<p>Hola a todos<p>";
    }
    function Autenticar(){
        $this->view->render('index/login');
    }
    function ValidarUsuario(){
            
            $username = $this->model->consultarUsuario($_POST['email'],$_POST['password']);
            if(isset($username) && $username!=""){
                $_SESSION['auth']=true;
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
                $this->view->mensaje = "Usuario o clave invalidos...";
                $this->view->render('index/login');
            }
            //$this->view->render('instructor/edit');
        //
        //var_dump($_POST);
        //$this->view->render('index/login');
    }
    function Logout(){
        $_SESSION['auth']=false;
        $this->view->mensaje = "Sesión terminada.";
        $this->view->render('index/login');
    }
}

?>