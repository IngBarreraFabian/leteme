<?php
    class Instructor extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }
        function render(){
            $instructores = $this->view->datos['instructores'] = $this->model->Leer();
            $this->view->instructores = $instructores;
            $this->view->render('instructor/index');
        }
        function eliminar($id = null){
            $documento = $id[0];
    
            if($this->model->eliminar($documento)){
                $mensaje ="Instructor eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el instructor";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;        
        }
        function crear(){
            if(isset($_POST["documento"])){
                if($this->model->Guardar($_POST)){
                    $this->view->mensaje = "Instructor creado correctamente";
                    $instructores = $this->view->datos['instructores'] = $this->model->Leer();
                    $this->view->instructores = $instructores;
                    $this->view->render('instructor/index');
                }else{
                    
                    $this->view->mensaje = "El instructor ya existe 1";
                    $this->view->render('instructor/form');
                }
            }else{
                $this->view->render('instructor/form');
            }
        }function leer($param = null){
            $documento = $param[0];
            $instructores = $this->model->readById($documento);
    
            session_start();
            $_SESSION["documento_instructores"] = $instructores->documento;
    
            $this->view->instructores = $instructores;
            $this->view->render('instructor/edit');
        }
        function editar($param = null){
            session_start();
            $documento = $_SESSION["documento_instructores"];
            $_POST["documento"]=$documento;
            unset($_SESSION['documento_instructores']);
    
            if($this->model->update($_POST)){
                $this->view->mensaje = "El instructor se actualizo correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al Instructor";
            }
            $instructores = $this->view->datos['instructores'] = $this->model->Leer();
            $this->view->instructores = $instructores;
            $this->view->render('instructor/index');
    }
}
?>