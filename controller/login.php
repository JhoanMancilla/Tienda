<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Login extends Controller
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
        parent::__construct();
        $this->view->render("login/login");
        
     }

     public  function __construct1($url){
        parent::__construct();
        $sub=$url[0]."/".$url[1]."/".$url[1];
       if($this->view->subValid($sub)==1){
        if (!isset($url[2])) {
            $this->view->render($sub);      
        }else{
            $this->loadModel($url[0]."Model");
            $this->{$url[1]}();
        }
       }else{
            $this->loadModel($url[0]."Model");
            $this->{$url[1]}();
       }
     }

    public function validar(){
      $arreglo=json_decode($this->data["data"]);
      if ($arreglo->correo=="" or $arreglo->clave=="") {
         echo json_encode(array("estado" => 0));
      }else{
        echo $this->model->valida($arreglo->correo,$arreglo->clave);
      }
    }

    public function cerrarSesion(){
        session_start();
        session_destroy();
    }
}

 ?>