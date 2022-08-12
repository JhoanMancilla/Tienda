<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("model/clase/Profesor.php");
class Profesores extends Controller
{
    /**
     * este es el controlador par los productos de inicio y el contenido plano
     * summary
     */
        public function __construct(){
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor ='__construct'.$num_params;
        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$params);
        }
    }
    public  function __construct0(){
        session_start();
        if (isset($_SESSION['profesor'])) {
            parent::__construct();
            $this->view->render("profesores/profesor");
        }else{
            header("Location: /");
        }
     }

     public  function __construct1($url){
        session_start();
        if (isset($_SESSION['profesor'])) {
            parent::__construct();
            $sub=$url[0]."/".$url[1]."/".$url[1];
           if($this->view->subValid($sub)==1){
            if (!isset($url[2])) {
                $this->view->render($sub);      
            }else{
                $this->loadModel($url[0]."Model");
                if (method_exists("Profesores","$url[1]")) {
                    $this->{$url[1]}();    
                }else{
                    $this->{$url[2]}();
                }
            }
           }else{
                $this->loadModel($url[0]."Model");
                $this->{$url[1]}();
           }    
        }else{
            header("Location: /");
        }
     }

    public function agregarAlumnos(){
       $data=$this->data["data"];
        echo $this->model->agregarAlumnos($data);
    }

    public function listarAlumnos(){
        $data=$this->data["data"];
        echo $this->model->listarAlumnos($data);
    }

    public function eliminarAlumno(){
        $data=$this->data["data"];
        echo $this->model->eliminarAlumno($data);
    }

    public function actualizarAlumnos(){
        $data=$this->data["data"];
        echo $this->model->actualizarAlumnos($data);
    }

    public function listarCursos(){
        echo $this->model->listarCursos();
    }

    public function agregarEjercicio(){
        $data=$this->data["data"];
        echo $this->model->agregarEjercicio($data);
    }

    public function listarEjercicios(){
        $data=$this->data["data"];
        echo $this->model->listarEjercicios($data);
    }


    public function editarEjercicios(){
        $data=$this->data["data"];
        echo $this->model->editarEjercicios($data);
    }

    public function eliminarEjercicio(){
        $data=$this->data["data"];
        echo $this->model->eliminarEjercicio($data);
    }

    public function alumno(){
        $data=json_decode($this->data["data"]);
        echo $this->model->agregarAlumno($data);
    }

    public function listarAlumno(){
        $data=json_decode($this->data["data"]);
        echo $this->model->listarAlumno($data);
    }

    public function actualizarAlumno(){
        $data=json_decode($this->data["data"]);
        echo $this->model->actualizarAlumno($data);
    }
    public function quiz(){
        $data=json_decode($this->data["data"]);
        echo $this->model->agregarQuiz($data);
    }


}

 ?>