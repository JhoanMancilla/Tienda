<?php
class Test extends Controller
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
        $this->view->render("test/test");
     }
     public  function __construct1($url){
        parent::__construct();
        $sub=$url[0]."/".$url[1]."/".$url[1];
       if($this->view->subValid($sub)==1){
            $this->view->render($sub);      
       }else{
            $this->loadModel($url[0]."Model");
            $this->{$url[1]}();
       }
     }


}

 ?>