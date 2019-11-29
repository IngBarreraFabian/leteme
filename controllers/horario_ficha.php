<?php
class Horario_ficha extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
    }
    function render(){
    $horarios = $this->view->datos['horarios'] = $this->model->Leer();
    $this->view->horarios = $horarios;
    $this->view->render('horario_ficha/index');
    }
    function eliminar($param=null){
        $ficha_nroficha = $param[0];
        $instructor_documento = $param[1];
        $sesion_jornada = $param[2];
        $dia = $param[3];
    
            if($this->model->eliminar($ficha_nroficha, $instructor_documento, $sesion_jornada, $dia)){
                $mensaje ="Horario eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el Horario";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            echo $mensaje;
    }
  
    function crear(){
        if(isset($_POST["dia"])){
             if($this->model->Guardar($_POST)){
                  $this->view->mensaje = "Horario creado correctamente";
                  $horarios = $this->view->datos['horarios'] = $this->model->Leer();
                  $this->view->horarios = $horarios;
                  $this->view->render('horario_ficha/index');
             }else{
 
                 $this->view->mensaje = "Se registro correctamente el Horario.";
                 $this->view->render('horario_ficha/form');
             }
            
            
         }else{
             $fichas = $this->view->datos['ddl_fichas'] = $this->model->Cargarfichas();
             $this->view->ddl_fichas = $fichas;
             $instructores = $this->view->datos['ddl_instructor'] = $this->model->CargarInstructor();
             $this->view->ddl_instructores    = $instructores;
             $jornadas = $this->view->datos['ddl_jornadas'] = $this->model->CargarJornada();
             $this->view->ddl_jornadas = $jornadas;
             $this->view->render('horario_ficha/form');
         }
     }
    function leer($param = null){
        $nroficha = $param[0];
        $documento = $param[1];
        $jornada = $param[2];
        $dia = $param[3];
        $nficha = $this->model->readById($nroficha,$documento,$jornada,$dia);

        session_start();
        $_SESSION["ficha_nroficha"] = $nficha->ficha_nroficha;
        $_SESSION["instructor_documento"] = $nficha->instructor_documento;
        $_SESSION["sesion_jornada"] = $nficha->sesion_jornada;
        $_SESSION["dia"] = $nficha->dia;

        $this->view->nficha = $nficha;
        $this->view->render('horario_ficha/edit');
    }
    function editar($param = null){
                session_start();
                $_POST["ficha_nroficha"]=$_SESSION["ficha_nroficha"];
                $_POST["instructor_documento"]=$_SESSION["instructor_documento"];
                $_POST["sesion_jornada"]=$_SESSION["sesion_jornada"];
                $_POST["dia"]=$_SESSION["dia"];
                        unset($_SESSION['ficha_nroficha']);
                        unset($_SESSION['instructor_documento']);
                        unset($_SESSION['sesion_jornada']);
                        unset($_SESSION['dia']);

        if($this->model->update($_POST)){
            $this->view->mensaje = "Horario actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar el Horario";
        }
                $horarios = $this->view->datos['horarios'] = $this->model->Leer();
                $this->view->horarios = $horarios;
                $this->view->render('horario_ficha/index');
    }
}

?>
